<?php

namespace HVP\CoreModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductEventAction
 */
class ProductEventAction
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
    private $operator;

    /**
     * @var string
     */
    private $changeValue;

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
     * @return ProductEventAction
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
     * Set operator
     *
     * @param string $operator
     * @return ProductEventAction
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;

        return $this;
    }

    /**
     * Get operator
     *
     * @return string 
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * Set changeValue
     *
     * @param string $changeValue
     * @return ProductEventAction
     */
    public function setChangeValue($changeValue)
    {
        $this->changeValue = $changeValue;

        return $this;
    }

    /**
     * Get changeValue
     *
     * @return string 
     */
    public function getChangeValue()
    {
        return $this->changeValue;
    }

    /**
     * Set ProductEvent
     *
     * @param \HVP\CoreModelBundle\Entity\ProductEvent $productEvent
     * @return ProductEventAction
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
