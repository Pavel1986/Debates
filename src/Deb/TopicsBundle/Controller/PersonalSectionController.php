<?php

namespace Deb\TopicsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PersonalSectionController extends Controller
{
    public function indexAction()
    {            
        return $this->render('DebTopicsBundle:PersonalSection:personal_section.html.twig', array());
    }
}
