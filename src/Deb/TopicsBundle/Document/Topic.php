<?php
// src/Deb/TopicsBundle/Document/Topic.php
namespace Deb\TopicsBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

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
     */
    protected $name;
    
    /**
     * @MongoDB\String
     */
    protected $description;
    
    /**
     * @MongoDB\ObjectId
     */
    protected $author_id;
    
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
}
