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
        ->findAll();              

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
            
                $messages = 'All works';
            
                /*Надо из запроса получить форму
                Проверить её - надо добавить валидацию и возрат сообщений об ошибках
                После чего получаем сущность для записи в базу данных - сделал
                Отдаём ответ - сделал
                */
               
                //Сохраняем в базу данных
                $dm = $this->get('doctrine_mongodb')->getManager();
                $dm->persist($topic);
                $dm->flush();
                
                //Возвращаем ответ
                $result = array('success' => false, 'message' => $messages);                                
                $response = new Response(json_encode($result));
                $response->headers->set('Content-Type', 'application/json');     

                return $response;
            
            }
        
        }
        
    }
}
