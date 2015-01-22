<?php

namespace Deb\TopicsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TopicDetailController extends Controller
{        
    public function indexAction($id)
    {                    
        //Getting topic
        $topic = $this->get('doctrine_mongodb')
        ->getRepository('DebTopicsBundle:Topic')
        ->find($id);
        
        $locale = $this->get('request')->getLocale();
        
        $doNotShowJoin = true;
        $securityContext = $this->container->get('security.context');
        $user = $securityContext->getToken()->getUser();
         if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            //Пользователь не участвует в других обсуждениях
             $isUserAnyTopicMember = $this->get('doctrine_mongodb')->getRepository('DebTopicsBundle:Topic')->isUserAnyTopicMember($user->getId(), $topic->getId());
             
             if(! $isUserAnyTopicMember && $topic->getStatusCode() === "waiting" && count($topic->getMembers()) < 2){
                $doNotShowJoin = false; 
             }                        
         }
        
        return $this->render('DebTopicsBundle:TopicDetail:topic_detail.html.twig', array('locale' => $locale, 'topic' => $topic, 'user' => $user, 'doNotShowJoin' => $doNotShowJoin));
    }
}
