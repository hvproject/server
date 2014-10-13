<?php

namespace HVP\CoreModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductEventInstance
 */
class ProductEventInstance
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $change;

    /**
     * @var \DateTime
     */
    private $timestamp;

    /**
     * @var \HVP\CoreModelBundle\Entity\ProductEvent
     */
    private $ProductEvent;

    /**
     * @var \HVP\CoreModelBundle\Entity\ProductInstance
     */
    private $ProductInstance;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set change
     *
     * @param string $change
     * @return ProductEventInstance
     */
    public function setChange($change)
    {
        $this->change = $change;

        return $this;
    }

    /**
     * Get change
     *
     * @return string 
     */
    public function getChange()
    {
        return $this->change;
    }

    /**
     * Set timestamp
     *
     * @param \DateTime $timestamp
     * @return ProductEventInstance
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Get timestamp
     *
     * @return \DateTime 
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set ProductEvent
     *
     * @param \HVP\CoreModelBundle\Entity\ProductEvent $productEvent
     * @return ProductEventInstance
     */
    public function setProductEvent(\HVP\CoreModelBundle\Entity\ProductEvent $productEvent = null)
    {
        $this->ProductEvent = $productEvent;

        return $this;
    }

    /**
     * Get ProductEvent
     *
     * @return \HVP\CoreModelBundle\Entity\ProductEvent 
     */
    public function getProductEvent()
    {
        return $this->ProductEvent;
    }

    /**
     * Set ProductInstance
     *
     * @param \HVP\CoreModelBundle\Entity\ProductInstance $productInstance
     * @return ProductEventInstance
     */
    public function setProductInstance(\HVP\CoreModelBundle\Entity\ProductInstance $productInstance = null)
    {
        $this->ProductInstance = $productInstance;

        return $this;
    }

    /**
     * Get ProductInstance
     *
     * @return \HVP\CoreModelBundle\Entity\ProductInstance 
     */
    public function getProductInstance()
    {
        return $this->ProductInstance;
    }
    /**
     * @var \DateTime
     */
    private $processed;


    /**
     * Set processed
     *
     * @param \DateTime $processed
     * @return ProductEventInstance
     */
    public function setProcessed($processed)
    {
        $this->processed = $processed;

        return $this;
    }

    /**
     * Get processed
     *
     * @return \DateTime 
     */
    public function getProcessed()
    {
        return $this->processed;
    }
    /**
     * @var string
     */
    private $eventChange;

    /**
     * @var \DateTime
     */
    private $ts;


    /**
     * Set eventChange
     *
     * @param string $eventChange
     * @return ProductEventInstance
     */
    public function setEventChange($eventChange)
    {
        $this->eventChange = $eventChange;

        return $this;
    }

    /**
     * Get eventChange
     *
     * @return string 
     */
    public function getEventChange()
    {
        return $this->eventChange;
    }

    /**
     * Set ts
     *
     * @param \DateTime $ts
     * @return ProductEventInstance
     */
    public function setTs($ts)
    {
        $this->ts = $ts;

        return $this;
    }

    /**
     * Get ts
     *
     * @return \DateTime 
     */
    public function getTs()
    {
        return $this->ts;
    }
}
