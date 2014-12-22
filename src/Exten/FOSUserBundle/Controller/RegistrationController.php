<?php

namespace Exten\FOSUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class RegistrationController extends Controller
{
    public function registerAction()
    {   
        
        $request = $this->getRequest();
        
        $formFactory = $this->get('fos_user.registration.form.factory');
        $form = $formFactory->createForm();
        $form->handleRequest($request);
             
        return $this->render('ExtenFOSUserBundle:Registration:register.html.twig', array(
            'form' => $form->createView(),
        ));
        
    }
    
    public function ajaxRegisterAction()
    {            
        
        $request = $this->getRequest();
        
        if ($request->isXmlHttpRequest()) {
        
            $formFactory = $this->get('fos_user.registration.form.factory');
            /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
            $userManager = $this->get('fos_user.user_manager');

            $user = $userManager->createUser();
            $user->setEnabled(true);

            $form = $formFactory->createForm();
            $form->setData($user);

            $form->handleRequest($request);

            $FormErrorIterator = $form->getErrors(true);            
            
            if($FormErrorIterator->count()){                                
                $result = array('success' => false, 'message' => $FormErrorIterator->__toString());
            }else{
                $result = array('success' => true, 'message' => array('Registred'));
            }                                                                               
        }else{
            $result = array('success' => false, 'message' => array('This is not XmlHttpRequest'));
        }                        
        
        $response = new Response(json_encode($result));
            
        $response->headers->set('Content-Type', 'application/json');     
        
        return $response;
    }
}