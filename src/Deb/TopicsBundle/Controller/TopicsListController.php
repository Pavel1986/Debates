<?php

namespace Deb\TopicsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TopicsListController extends Controller
{
    public function indexAction()
    {            
        return $this->render('DebTopicsBundle:TopicsList:topics_list.html.twig', array());
    }        
}
