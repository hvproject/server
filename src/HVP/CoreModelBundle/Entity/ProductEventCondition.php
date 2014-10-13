<?php

namespace HVP\CoreModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductEventCondition
 */
class ProductEventCondition
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $instanceValue;

    /**
     * @var string
     */
    private $comperator;

    /**
     * @var string
     */
    private $conditionValue;

    /**
     * @var string
     */
    private $combinator;

    /**
     * @var \HVP\CoreModelBundle\Entity\ProductEvent
     */
    private $ProductEvent;


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
     * Set instanceValue
     *
     * @param string $instanceValue
     * @return ProductEventCondition
     */
    public function setInstanceValue($instanceValue)
    {
        $this->instanceValue = $instanceValue;

        return $this;
    }

    /**
     * Get instanceValue
     *
     * @return string 
     */
    public function getInstanceValue()
    {
        return $this->instanceValue;
    }

    /**
     * Set comperator
     *
     * @param string $comperator
     * @return ProductEventCondition
     */
    public function setComperator($comperator)
    {
        $this->comperator = $comperator;

        return $this;
    }

    /**
     * Get comperator
     *
     * @return string 
     */
    public function getComperator()
    {
        return $this->comperator;
    }

    /**
     * Set conditionValue
     *
     * @param string $conditionValue
     * @return ProductEventCondition
     */
    public function setConditionValue($conditionValue)
    {
        $this->conditionValue = $conditionValue;

        return $this;
    }

    /**
     * Get conditionValue
     *
     * @return string 
     */
    public function getConditionValue()
    {
        return $this->conditionValue;
    }

    /**
     * Set combinator
     *
     * @param string $combinator
     * @return ProductEventCondition
     */
    public function setCombinator($combinator)
    {
        $this->combinator = $combinator;

        return $this;
    }

    /**
     * Get combinator
     *
     * @return string 
     */
    public function getCombinator()
    {
        return $this->combinator;
    }

    /**
     * Set ProductEvent
     *
     * @param \HVP\CoreModelBundle\Entity\ProductEvent $productEvent
     * @return ProductEventCondition
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
}
