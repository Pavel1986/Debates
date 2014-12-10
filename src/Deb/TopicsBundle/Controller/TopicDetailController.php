<?php

namespace Deb\TopicsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TopicDetailController extends Controller
{        
    public function indexAction()
    {            
        
        $locale = $this->get('request')->getLocale();
        
        return $this->render('DebTopicsBundle:TopicDetail:topic_detail.html.twig', array('locale' => $locale));
    }
}
