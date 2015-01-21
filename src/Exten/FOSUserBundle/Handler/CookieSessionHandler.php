<?php  
namespace Exten\FOSUserBundle\Handler;  
  
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;  
use Deb\TopicsBundle\Entity\User;  
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
            $cookie = new Cookie($session_options["name"], session_id(), time() + $session_options["cookie_lifetime"]);
            
            $response   = $event->getResponse();
            $response->headers->setCookie($cookie);
            
            $securityContext = $this->container->get('security.context');
            $UserToken = $securityContext->getToken();
            if($UserToken){
                $user = $UserToken->getUser();

                //Если пользователь определён и он авторизован
                if (is_object($user) && $securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
                    //2. Записываем в mongodb
                    $userID = $user->getId();
                }
            }
       
        }
    }
        
    public function onLogin($event)  
    {  
        /*
        $request   = $event->getRequest();
        $response  = $event->getResponse();
        //$kernel    = $event->getKernel();
        
        $user = $this->container->get('security.context')->getToken()->getUser();
        $userID = $user->getId();
        $cookieID   = $request->cookies->get("DBSession");*/
        
        /*
        $securityContext = $this->container->get('security.context');
        $UserToken = $securityContext->getToken();
        if($UserToken){
            $user = $UserToken->getUser();
            
            //Если пользователь определён и он авторизован
            //Кроме этого надо сделать, что 
            if (is_object($user) && $securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
                
                
                $all = 'works';
                
            }
        }
             
//        $test = $cookies;
        $cookies   = $request->cookies->get("[DBSession]");
        
         // получаем пользователя из сессии  
        
        if($user){
            
            $cookieID = '';
        }
        
        /*
        $entityManager = $this->doctrine->getManager();  
        

        $user->setLastLogin(new \DateTime()); //обновляем дату последнего логина в систему  
        //можно выполнять любые действия с залогиненным пользователем  

        $entityManager->flush(); //сохраняем данные  
*/
    }  
}  