<?php

namespace Deb\TopicsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Deb\TopicsBundle\Document\Topic;
use Symfony\Component\HttpFoundation\Response;

class TopicsListController extends Controller
{
    public function indexAction()
    {            
        
        //Creating topic
        /*
        $topic = new Topic();
        $topic->setName('Title');
        $topic->setDescription('Description');

        $dm = $this->get('doctrine_mongodb')->getManager();
        $dm->persist($topic);
        $dm->flush();
        */
        
        //Getting topics
        $topics = $this->get('doctrine_mongodb')
        ->getRepository('DebTopicsBundle:Topic')
        ->findAll();              

        //For generation links (socket.io)
        $locale = $this->get('request')->getLocale();        
        $host = $this->get('router')->getContext()->getHost();
        
        //Create topic form
        $topic = new Topic();
        $topic->setName('NAME');
        $topic->setDescription('DESCRIPTION');
        $form = $this->createFormBuilder($topic)
            ->add('name', 'text')
            ->add('description', 'textarea')
            ->getForm();
        
        return $this->render('DebTopicsBundle:TopicsList:topics_list.html.twig', array('locale' => $locale, 'host' => $host, 'topics' => $topics, 'form' => $form->createView()));
    }    
    
    public function createAction()
    { 
        
        $request = $this->getRequest();
        
        if ($request->isXmlHttpRequest()) {
            
            $messages = 'All works';
            
            Надо из запроса получить форму
            Проверить её
            После чего получаем сущность для записи в базу данных
            Отдаём ответ
            
            /*
            $topic = $this->get('request');
            $dm = $this->get('doctrine_mongodb')->getManager();
            $dm->persist($topic);
            $dm->flush();
            */
            
            /*$formFactory = $this->get('fos_user.registration.form.factory');
            $form = $formFactory->createForm();
            $form->handleRequest($request);
            
            if ($form->isValid()) {
                // выполняем прочие действие, например, сохраняем задачу в базе данных
                return $this->redirect($this->generateUrl('task_success'));
            }*/
                
            $result = array('success' => false, 'message' => $messages);                                

            $response = new Response(json_encode($result));

            $response->headers->set('Content-Type', 'application/json');     

            return $response;
        
        }
        
    }
}
