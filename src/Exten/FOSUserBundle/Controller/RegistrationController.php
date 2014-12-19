<?php

namespace Exten\FOSUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class RegistrationController extends Controller
{
    public function registerAction()
    {   
        
        $request = $this->getRequest();
        
         /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->get('fos_user.registration.form.factory');
        /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
        $userManager = $this->get('fos_user.user_manager');
        /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');

        $user = $userManager->createUser();
        $user->setEnabled(true);
        
        $form = $formFactory->createForm();
        $form->setData($user);

        $form->handleRequest($request);
                
        $validation = $form->getErrors(true);   //Let's get errors
        
        return $this->render('ExtenFOSUserBundle:Registration:register.html.twig', array(
            'form' => $form->createView(),
        ));
        
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