<?php

namespace Deb\TopicsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Deb\TopicsBundle\Document\Topic;
use Deb\TopicsBundle\Form\Type\CreateTopicType;
use Symfony\Component\HttpFoundation\Response;

class TopicsListController extends Controller
{
    public function indexAction()
    {                            
        //Getting topics
        $topics = $this->get('doctrine_mongodb')
        ->getRepository('DebTopicsBundle:Topic')
        ->findBy(array(), array('date_created'=>'desc'));

        //For generation links (socket.io)
        $locale = $this->get('request')->getLocale();        
        $host = $this->get('router')->getContext()->getHost();
        
        //Create topic form
        $form = $this->createForm(new CreateTopicType(), new Topic());
        
        return $this->render('DebTopicsBundle:TopicsList:topics_list.html.twig', array('locale' => $locale, 'host' => $host, 'topics' => $topics, 'form' => $form->createView()));
    }    
    
    public function createAction()
    { 
        
        $request = $this->getRequest();
        
        if ($request->isXmlHttpRequest()) {
            
             $topic = new Topic();             
             $form = $this->createForm(new CreateTopicType(), $topic);             
             $form->handleRequest($request);

            if ($form->isValid()) {
                                      
                //Сохраняем в базу данных     
                $created_date = time();
                $topic->setDateCreated($created_date);
                $waiting_time_ms = ($topic->getWaitingTime()) ? $topic->getWaitingTime() * 60 : 5 * 60;
                //Время через какое должен поменяться статус у обсуждения (на processing, либо closed, если нет участников)
                $topic->setDateTempClosing($created_date + $waiting_time_ms);
                $topic->setStatusCode('waiting');                
                
                $dm = $this->get('doctrine_mongodb')->getManager();                
                $dm->persist($topic);
                $dm->flush();
                
                //Возвращаем ответ
                //$result = array('success' => false, 'message' => 'Topic created');                                                
                $referer_url = $request->headers->get('referer');
                $result = array('success' => true, 'url' => $referer_url);
            
            }else{
                $FormErrorIterator = $form->getErrors(true);                        
                $messages = preg_replace("/(\n)/", "<br/>", $FormErrorIterator->__toString());
                $messages = preg_replace("/(ERROR: )/", "", $messages);
                $result = array('success' => false, 'message' => $messages);                                  
            }
            
            $response = new Response(json_encode($result));
            $response->headers->set('Content-Type', 'application/json');     

            return $response;
        
        }
        
    }
}
