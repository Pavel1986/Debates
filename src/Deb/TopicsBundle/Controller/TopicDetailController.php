<?php

namespace Deb\TopicsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TopicDetailController extends Controller
{        
    public function indexAction()
    {            
        return $this->render('DebTopicsBundle:TopicDetail:topic_detail.html.twig', array());
    }
}
