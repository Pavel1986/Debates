<?php
namespace Exten\FOSUserBundle\Handler;
 
use Symfony\Component\Security\Http\Logout\LogoutHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
 
class LogoutHandler implements LogoutHandlerInterface
{
    
    protected $doctrine_mongodb;  
    protected $container;  

    public function __construct($doctrine_mongodb, $container )  
    {  
        $this->doctrine_mongodb = $doctrine_mongodb;  
        $this->container = $container;  
    }  
    
    public function logout(Request $request, Response $response, TokenInterface $authToken)
    {
        $user = $authToken->getUser();
        $user->setLastCookieExpires(time());                    
        $dm = $this->doctrine_mongodb->getManager();                
        $dm->flush();      
    }
}