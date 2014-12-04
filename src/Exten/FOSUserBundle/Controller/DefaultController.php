<?php

namespace Exten\FOSUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ExtenFOSUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
