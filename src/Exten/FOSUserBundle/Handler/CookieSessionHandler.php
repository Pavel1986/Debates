<?php  
namespace Exten\FOSUserBundle\Handler;  
  
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;  
use Exten\FOSUserBundle\Entity\User;  
use Symfony\Component\HttpFoundation\Cookie;
  
class CookieSessionHandler  
{  
    protected $doctrine_mongodb;  
    protected $container;  

    public function __construct($doctrine_mongodb, $container )  
    {  
        $this->doctrine_mongodb = $doctrine_mongodb;  
        $this->container = $container;  
    }  

    function onKernelResponse($event){
        
        $request   = $event->getRequest();
        
        if($event->getRequestType() === 1 && $request->get('_route') !== "_wdt"){
        
            //1. Устанавливаем новое значение времени куки                        
            $session_options = $this->container->getParameter('session.storage.options');
            $cookieID = session_id();
            $cookieExpires = time() + $session_options["cookie_lifetime"];
            $cookie = new Cookie($session_options["name"], $cookieID, $cookieExpires);            
            $event->getResponse()->headers->setCookie($cookie);
                       
            $securityContext = $this->container->get('security.context');
            $UserToken = $securityContext->getToken();
            if($UserToken){
                $user = $UserToken->getUser();

                //Если пользователь определён и он авторизован
                if (is_object($user) && $securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
                    //2. Записываем в mongodb
                    $userID = $user->getId();
                    $user->setLastCookieId($cookieID);
                    $user->setLastCookieExpires($cookieExpires);
                    
                    $dm = $this->doctrine_mongodb->getManager();                
                    $dm->persist($user);
                    $dm->flush();                                        
                }
            }
       
        }
    } 
}  