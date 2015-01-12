<?php
// src/Deb/TopicsBundle/Document/Topic.php
namespace Deb\TopicsBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @MongoDB\Document
 */
class Topic
{
    /**
     * @MongoDB\Id
     */
    protected $id;
    
    /**
     * @MongoDB\String
     * @Assert\NotBlank( message = "topic.form_create.name.blank")
     * @Assert\Length(
     *      min = 3,
     *      max = 50,
     *      minMessage = "topic.form_create.name.min",
     *      maxMessage = "topic.form_create.name.max"
     * )
     */
    protected $name;
    
    /**
     * @MongoDB\String
     * @Assert\NotBlank( message = "topic.form_create.description.blank" )
     * @Assert\Length(
     *      min = 3,
     *      max = 50,
     *      minMessage = "topic.form_create.description.min",
     *      maxMessage = "topic.form_create.description.max"
     * )
     */
    protected $description;
    
    /**
     * @MongoDB\ObjectId
     */
    protected $author_id;
    
    /**
     * @MongoDB\Date
     */
    protected $date_created;
    
    /**
     * @MongoDB\Date
     */
    protected $date_started;
    
    /**
     * @MongoDB\Date
     */
    protected $date_closed;
    
    /**
     * @MongoDB\String
     */
    protected $status_code;
    
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
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set authorId
     *
     * @param object_id $authorId
     * @return self
     */
    public function setAuthorId($authorId)
    {
        $this->author_id = $authorId;
        return $this;
    }

    /**
     * Get authorId
     *
     * @return object_id $authorId
     */
    public function getAuthorId()
    {
        return $this->author_id;
    }

    /**
     * Set dateCreated
     *
     * @param date $dateCreated
     * @return self
     */
    public function setDateCreated($dateCreated)
    {
        $this->date_created = $dateCreated;
        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return date $dateCreated
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * Set dateStarted
     *
     * @param date $dateStarted
     * @return self
     */
    public function setDateStarted($dateStarted)
    {
        $this->date_started = $dateStarted;
        return $this;
    }

    /**
     * Get dateStarted
     *
     * @return date $dateStarted
     */
    public function getDateStarted()
    {
        return $this->date_started;
    }

    /**
     * Set dateClosed
     *
     * @param date $dateClosed
     * @return self
     */
    public function setDateClosed($dateClosed)
    {
        $this->date_closed = $dateClosed;
        return $this;
    }

    /**
     * Get dateClosed
     *
     * @return date $dateClosed
     */
    public function getDateClosed()
    {
        return $this->date_closed;
    }

    /**
     * Set statusCode
     *
     * @param string $statusCode
     * @return self
     */
    public function setStatusCode($statusCode)
    {
        $this->status_code = $statusCode;
        return $this;
    }

    /**
     * Get statusCode
     *
     * @return string $statusCode
     */
    public function getStatusCode()
    {
        return $this->status_code;
    }
}
