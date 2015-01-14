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
     * @MongoDB\String
     * Дата создания обсуждения, в этот момент у обсуждения статус waiting, следующий через $waiting_time минут будет processing
     */
    protected $date_created;
    
    /**
     * @MongoDB\String
     * Дата начала обсуждения, в этот момент у обсуждения статус processing, следующий через $processing_time минут (если участники не продлят время или не закончат раньше) будет closed
     */
    protected $date_started;
    
    /**
     * @MongoDB\String
     * Дата конечного закрытия обсуждения, в этот момент у обсуждения статус closed
     */
    protected $date_closed;
    
    /**
     * @MongoDB\String
     * Запланированная дата окончания обсуждения. Может меняться, если участники захотят продлить обсуждение или досрочно закончить
     */
    protected $date_temp_closing;
    
    /**
     * @MongoDB\String
     * Текущий статус обсуждения
     */
    protected $status_code;
    
    /**
     * Варианты значения $processing_time при создании обсуждения
     */
    protected $processing_time_options = array("10" => 10, "20" => 20, "30" => 30);
    
    /**
     * @MongoDB\Int
     * Время обсуждения (минуты) в статусе processing
     */
    protected $processing_time;
    
    /**
     * @MongoDB\Int
     * Время в ожидании (минуты), когда появятся остальные участники обсуждения
     */
    protected $waiting_time;
    
    /**
     * Варианты значения $waiting_time при создании обсуждения
     */
    protected $waiting_time_options = array("5" => 5, "10" => 10, "15" => 15);
            

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
     * @param string $dateCreated
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
     * @return string $dateCreated
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * Set dateStarted
     *
     * @param string $dateStarted
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
     * @return string $dateStarted
     */
    public function getDateStarted()
    {
        return $this->date_started;
    }

    /**
     * Set dateClosed
     *
     * @param string $dateClosed
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
     * @return string $dateClosed
     */
    public function getDateClosed()
    {
        return $this->date_closed;
    }

    /**
     * Set dateTempClosing
     *
     * @param string $dateTempClosing
     * @return self
     */
    public function setDateTempClosing($dateTempClosing)
    {
        $this->date_temp_closing = $dateTempClosing;
        return $this;
    }

    /**
     * Get dateTempClosing
     *
     * @return string $dateTempClosing
     */
    public function getDateTempClosing()
    {
        return $this->date_temp_closing;
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

    /**
     * Get processingTimeOptions
     *
     * @return hash $processingTimeOptions
     */
    public function getProcessingTimeOptions()
    {
        return $this->processing_time_options;
    }

    /**
     * Set processingTime
     *
     * @param int $processingTime
     * @return self
     */
    public function setProcessingTime($processingTime)
    {
        $this->processing_time = $processingTime;
        return $this;
    }

    /**
     * Get processingTime
     *
     * @return int $processingTime
     */
    public function getProcessingTime()
    {
        return $this->processing_time;
    }

    /**
     * Set waitingTime
     *
     * @param int $waitingTime
     * @return self
     */
    public function setWaitingTime($waitingTime)
    {
        $this->waiting_time = $waitingTime;
        return $this;
    }

    /**
     * Get waitingTime
     *
     * @return int $waitingTime
     */
    public function getWaitingTime()
    {
        return $this->waiting_time;
    }

    /**
     * Get waitingTimeOptions
     *
     * @return hash $waitingTimeOptions
     */
    public function getWaitingTimeOptions()
    {
        return $this->waiting_time_options;
    }
}
