<?php

namespace Deb\TopicsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TopicsListController extends Controller
{
    public function indexAction()
    {            
        
        $locale = $this->get('request')->getLocale();
        
        return $this->render('DebTopicsBundle:TopicsList:topics_list.html.twig', array('locale' => $locale));
    }        
}
