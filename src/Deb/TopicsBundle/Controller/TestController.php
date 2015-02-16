<?php

namespace Deb\TopicsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TestController extends Controller
{
    public function indexAction()
    {            
        return $this->render('DebTopicsBundle:Test:test.html.twig', array());
    }
}
