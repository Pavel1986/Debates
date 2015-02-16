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
        $showVotes = false;
        $securityContext = $this->container->get('security.context');
        $user = $securityContext->getToken()->getUser();
        //Если пользователь авторизован
         if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            //Пользователь не участвует в других обсуждениях
             $isUserAnyTopicMember = $this->get('doctrine_mongodb')->getRepository('DebTopicsBundle:Topic')->isUserAnyTopicMember($user->getId());
             
             //Для отображении кнопки Join
             if(! $isUserAnyTopicMember && $topic->getStatusCode() === "waiting" && count($topic->getMembers()) < 2){
                $doNotShowJoin = false; 
             }                        
             //Для отображении кнопок голосования             
             if(! $isUserAnyTopicMember && $topic->getStatusCode() === "processing"){
                 $showVotesBtn = true;
                 //Получаем голос пользователя
                 $memberVoteQb = $this->get('doctrine_mongodb')->getRepository('DebTopicsBundle:MemberVote')->createQueryBuilder('MemberVote');
                 $memberVote = $memberVoteQb
                    ->field('user_id')->equals($user->getId())
                    ->field('topic_id')->equals($topic->getId())
                    ->getQuery()->getSingleResult();
             }
         }
        
        //return $this->render('DebTopicsBundle:TopicDetail:topic_detail.html.twig', array('locale' => $locale, 'topic' => $topic, 'user' => $user, 'doNotShowJoin' => $doNotShowJoin, 'showVotesBtn' => $showVotesBtn, 'memberIDVote' => $memberVote->getMemberId() ));
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
                        $dm_manager = $dm->getManager();
                        
                        $memberVote = $dm_manager->getRepository('DebTopicsBundle:MemberVote')->findOneBy(array('topic_id' => $params["topic_id"], 'user_id' => $user->getId()));
                        /* Какого хера он возвращает topic_id = null ?????? */
                        /* В accenture всё работает как надо, надо проверить ещё раз в vault */                        
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
    }
}
