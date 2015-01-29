<?php
// src/Deb/TopicsBundle/Document/MemberVote.php
namespace Deb\TopicsBundle\MemberVote;

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
    
}

