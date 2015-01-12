<?php

namespace Deb\TopicsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TopicDetailController extends Controller
{        
    public function indexAction($id)
    {                    
        //Getting topic
        $topic = $this->get('doctrine_mongodb')
        ->getRepository('DebTopicsBundle:Topic')
        ->find($id);
        
        $locale = $this->get('request')->getLocale();
        $host = $this->get('router')->getContext()->getHost();
        
        return $this->render('DebTopicsBundle:TopicDetail:topic_detail.html.twig', array('locale' => $locale, 'host' => $host, 'topic' => $topic));
    }
}
