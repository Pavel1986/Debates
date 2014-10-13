<?php

namespace Deb\TopicsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InfoPageController extends Controller
{
    public function indexAction()
    {            
        return $this->render('DebTopicsBundle:InfoPage:info_page.html.twig', array());
    }
}
