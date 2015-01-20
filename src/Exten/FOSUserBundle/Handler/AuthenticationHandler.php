<?php

namespace Exten\FOSUserBundle\Handler;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Translation\Translator;
use Symfony\Component\HttpFoundation\Cookie;

class AuthenticationHandler
implements AuthenticationSuccessHandlerInterface,
           AuthenticationFailureHandlerInterface
{
    
    protected $router;
    protected $translator;

    public function __construct($router, $translator)
    {
        $this->translator = $translator;
        $this->router = $router;        
    }
   
    /**
     * This is called when an interactive authentication attempt succeeds. This
     * is called by authentication listeners inheriting from
     * AbstractAuthenticationListener.
     *
     * @see \Symfony\Component\Security\Http\Firewall\AbstractAuthenticationListener
     * @param Request        $request
     * @param TokenInterface $token
     * @return Response the response to return
     */
    
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        if ($request->isXmlHttpRequest()) {                                            
            $referer_url = $request->headers->get('referer');
            $result = array('success' => true, 'url' => $referer_url);
            $response = new Response(json_encode($result));
            $response->headers->set('Content-Type', 'application/json');
            
            //Записывам cookieID в пользователя           
            //$user = $this->container->get('security.context')->getToken()->getUser();
            $userID = $token->getUser()->getId();
            $cookiees3   = $request->cookies;
            $cookieID   = $request->cookies->get("DBSession");
            $cookies = $response->headers->getCookies();
            $cookies2 = $request->cookies->all();
            
            return $response;
        }
    }
                				    
    /**
     * This is called when an interactive authentication attempt fails. This is
     * called by authentication listeners inheriting from
     * AbstractAuthenticationListener.
     *
     * @param Request                 $request
     * @param AuthenticationException $exception    
     * @return Response the response to return
     */
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        if ($request->isXmlHttpRequest()) {
            $exception_message = $exception->getMessage();
            $translated_message = $this->translator->trans($exception_message, array(), 'FOSUserBundle');
            $result = array('success' => false, 'message' => $translated_message);
            $response = new Response(json_encode($result));
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }
    }
}