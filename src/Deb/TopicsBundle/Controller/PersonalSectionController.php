<?php

namespace Deb\TopicsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PersonalSectionController extends Controller
{
    public function indexAction()
    {            
        
        $securityContext = $this->container->get('security.context');
        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->render('DebTopicsBundle:PersonalSection:personal_section.html.twig', array());
        }
        
        return $this->render('noneAuthorized.html.twig', array());
    }
}
