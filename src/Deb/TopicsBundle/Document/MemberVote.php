<?php
// src/Deb/TopicsBundle/Document/MemberVote.php
namespace Deb\TopicsBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @MongoDB\Document(repositoryClass="Deb\TopicsBundle\Repository\TopicRepository")
 * 
 */
class MemberVote
{
    /**
     * @MongoDB\Id
     */
    protected $id;
    
    /**
     * Кто проголосовал
     * @MongoDB\String
     */
    protected $user_id;
    
    /**
     * За какого участника обсуждения было проголосовано
     * @MongoDB\String
     */
    protected $member_id;
    
    /**
     * В каком обсуждение произошло голосование
     * @MongoDB\String
     */
    protected $topic_id;
    

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userId
     *
     * @param string $userId
     * @return self
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;
        return $this;
    }

    /**
     * Get userId
     *
     * @return string $userId
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set memberId
     *
     * @param string $memberId
     * @return self
     */
    public function setMemberId($memberId)
    {
        $this->member_id = $memberId;
        return $this;
    }

    /**
     * Get memberId
     *
     * @return string $memberId
     */
    public function getMemberId()
    {
        return $this->member_id;
    }

    /**
     * Set topicId
     *
     * @param string $topicId
     * @return self
     */
    public function setTopicId($topicId)
    {
        $this->topic_id = $topicId;
        return $this;
    }

    /**
     * Get topicId
     *
     * @return string $topicId
     */
    public function getTopicId()
    {
        return $this->topic_id;
    }
}
