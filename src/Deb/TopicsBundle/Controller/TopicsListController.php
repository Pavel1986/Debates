<?php

namespace Deb\TopicsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Deb\TopicsBundle\Document\Topic;

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

        $locale = $this->get('request')->getLocale();
        
        $host = $this->get('router')->getContext()->getHost();
        
        return $this->render('DebTopicsBundle:TopicsList:topics_list.html.twig', array('locale' => $locale, 'host' => $host, 'topics' => $topics));
    }        
}
