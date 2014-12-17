<?php

namespace Exten\FOSUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class RegistrationController extends Controller
{
    public function registerAction()
    {   
        return $this->render('ExtenFOSUserBundle:Registration:register.html.twig');
        
    }
    
    public function ajaxRegisterAction()
    {            
        $request = $this->getRequest();
        
        //if ($request->isXmlHttpRequest()) {
                                    
            $result = array('success' => false, 'message' => 'works');
            
            $response = new Response(json_encode($result));
            
            $response->headers->set('Content-Type', 'application/json');            
            
            return $response;
            
        //}                
    }
}