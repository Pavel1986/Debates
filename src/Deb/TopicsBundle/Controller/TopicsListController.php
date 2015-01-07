<?php

namespace Deb\TopicsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TopicsListController extends Controller
{
    public function indexAction()
    {            
        
        $locale = $this->get('request')->getLocale();
        
        $host = $this->get('router')->getContext()->getHost();
        
        return $this->render('DebTopicsBundle:TopicsList:topics_list.html.twig', array('locale' => $locale, 'host' => $host));
    }        
}
