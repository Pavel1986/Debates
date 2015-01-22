<?php
// src/Exten/FOSUserBundle/Document/User.php

namespace Exten\FOSUserBundle\Document;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class User extends BaseUser
{
    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;
    
    /**
     * @MongoDB\String
     */
    protected $lastCookieId;
    
    /**
     * @MongoDB\Int
     * Время в unix формате через сколько закончится сессия куки
     */
    protected $lastCookieExpires;
    
    /**
     * @MongoDB\String
     */
    protected $system_language;

    public function __construct()
    {
        parent::__construct();
    }

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
     * Set lastCookieId
     *
     * @param string $lastCookieId
     * @return self
     */
    public function setLastCookieId($lastCookieId)
    {
        $this->lastCookieId = $lastCookieId;
        return $this;
    }

    /**
     * Get lastCookieId
     *
     * @return string $lastCookieId
     */
    public function getLastCookieId()
    {
        return $this->lastCookieId;
    }

    /**
     * Set lastCookieExpires
     *
     * @param int $lastCookieExpires
     * @return self
     */
    public function setLastCookieExpires($lastCookieExpires)
    {
        $this->lastCookieExpires = $lastCookieExpires;
        return $this;
    }

    /**
     * Get lastCookieExpires
     *
     * @return int $lastCookieExpires
     */
    public function getLastCookieExpires()
    {
        return $this->lastCookieExpires;
    }

    /**
     * Set systemLanguage
     *
     * @param string $systemLanguage
     * @return self
     */
    public function setSystemLanguage($systemLanguage)
    {
        $this->system_language = $systemLanguage;
        return $this;
    }

    /**
     * Get systemLanguage
     *
     * @return string $systemLanguage
     */
    public function getSystemLanguage()
    {
        return $this->system_language;
    }
}
