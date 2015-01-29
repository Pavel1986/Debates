<?php

namespace Deb\TopicsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Deb\TopicsBundle\Document\Topic;
use Deb\TopicsBundle\Document\MemberVote;

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
             $isUserAnyTopicMember = $this->get('doctrine_mongodb')->getRepository('DebTopicsBundle:Topic')->isUserAnyTopicMember($user->getId());
             
             if(! $isUserAnyTopicMember && $topic->getStatusCode() === "waiting" && count($topic->getMembers()) < 2){
                $doNotShowJoin = false; 
             }                        
         }
        
        return $this->render('DebTopicsBundle:TopicDetail:topic_detail.html.twig', array('locale' => $locale, 'topic' => $topic, 'user' => $user, 'doNotShowJoin' => $doNotShowJoin));
    }
    
    public function ajaxVoteMemberAction(){
        
        $request = $this->getRequest();
        
        if ($request->isXmlHttpRequest()) {                  
            //Проверяем что пользователь авторизован
            $securityContext = $this->container->get('security.context');
            $user = $securityContext->getToken()->getUser();
            if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
                //Проверяем, что он не участвует в активных обсуждениях
                $dm = $this->get('doctrine_mongodb');
                if(! $dm->getRepository('DebTopicsBundle:Topic')->isUserAnyTopicMember($user->getId())){
                    //Проверяем, что обсуждение существует (processing) и пользователь за которого он голосует участвует в нём                    
                    $params =  $request->request->all();
                    if($dm->getRepository('DebTopicsBundle:Topic')->UserIsTopicMember($params["member_id"], $params["topic_id"])){
                        //Сохраняем голос в базу данных
                        /*
                        $memberVote = new MemberVote();                        
                        $meberVote->setUserId($user->getId());
                        $meberVote->setMemberId($params["member_id"]);
                        $meberVote->setTopicId($params["topic_id"]);*/
                        
                        $dm_manager = $dm->getManager();
                        
                        $memberVote = $dm_manager->getRepository('DebTopicsBundle:MemberVote')->findOneBy(array('topic_id' => $params["topic_id"], 'user_id' => $user->getId()));
                        /* Какого хера он возвращает topic_id = null ?????? */
                        
                        
                        if($memberVote){
                            $memberVote->setMemberId($params["member_id"]);
                        }else{
                            $memberVote = new MemberVote();
                            $memberVote->setUserId($user->getId());
                            $memberVote->setMemberId($params["member_id"]);
                            $memberVote->setTopicId($params["topic_id"]);
                                                        
                            $dm_manager->persist($memberVote);
                        }
                        $dm_manager->flush();
                        
                        $result = array('success' => true);
                    }else{
                        $message= $this->get('translator')->trans('topic.detail.member_is_not_in_topic', array(), 'DebTopicsBundle');
                        $result = array('success' => false, 'message' => $message.'<br />'); 
                    }                                        
                }else{
                    $message= $this->get('translator')->trans('topic.create.author_is_member', array(), 'DebTopicsBundle');
                    $result = array('success' => false, 'message' => $message.'<br />'); 
                }                
            }else{
                $message= $this->get('translator')->trans('topic.create.auth', array(), 'DebTopicsBundle');
                $result = array('success' => false, 'message' => $message.'<br />'); 
            }
            
                        
            $response = new Response(json_encode($result));
            $response->headers->set('Content-Type', 'application/json');
            
            return $response;
        }
        
        
            
            /*
            $securityContext = $this->container->get('security.context');
            $user = $securityContext->getToken()->getUser();
            if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
                
                $dm = $this->get('doctrine_mongodb');
                //Проверяем состоит ли пользователь в активных обсуждения [ waiting | processing ]
                if(! $dm->getRepository('DebTopicsBundle:Topic')->isUserAnyTopicMember($user->getId())){
                 
                    $dm = $dm->getManager();                
                    $dm->persist($topic);
                    $dm->flush();

                    //Возвращаем ответ
                    //$result = array('success' => false, 'message' => 'Topic created');                                                
                    $referer_url = $request->headers->get('referer');
                    $result = array('success' => true, 'url' => $referer_url);

                }else{
                    $FormErrorIterator = $form->getErrors(true);                        
                    $messages = preg_replace("/(\n)/", "<br/>", $FormErrorIterator->__toString());
                    $messages = preg_replace("/(ERROR: )/", "", $messages);
                    $result = array('success' => false, 'message' => $messages);                                  
                }               

                }else{
                    $message= $this->get('translator')->trans('topic.create.author_is_member', array(), 'DebTopicsBundle');
                    $result = array('success' => false, 'message' => $message.'<br />'); 
                }
                
            }else{
                $message= $this->get('translator')->trans('topic.create.auth', array(), 'DebTopicsBundle');
                $result = array('success' => false, 'message' => $message.'<br />'); 
            }
            
            $response = new Response(json_encode($result));
            $response->headers->set('Content-Type', 'application/json');     

            return $response;
            */
    }
}
