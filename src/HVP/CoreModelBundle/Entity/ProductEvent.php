<?php

namespace HVP\CoreModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductEvent
 */
class ProductEvent
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $summ;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $ProductEventActions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $ProductEventConditions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $ProductEventInstances;

    /**
     * @var \HVP\CoreModelBundle\Entity\Product
     */
    private $Product;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ProductEventActions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ProductEventConditions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ProductEventInstances = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set name
     *
     * @param string $name
     * @return ProductEvent
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set summ
     *
     * @param string $summ
     * @return ProductEvent
     */
    public function setSumm($summ)
    {
        $this->summ = $summ;

        return $this;
    }

    /**
     * Get summ
     *
     * @return string 
     */
    public function getSumm()
    {
        return $this->summ;
    }

    /**
     * Add ProductEventActions
     *
     * @param \HVP\CoreModelBundle\Entity\ProductEventAction $productEventActions
     * @return ProductEvent
     */
    public function addProductEventAction(\HVP\CoreModelBundle\Entity\ProductEventAction $productEventActions)
    {
        $this->ProductEventActions[] = $productEventActions;

        return $this;
    }

    /**
     * Remove ProductEventActions
     *
     * @param \HVP\CoreModelBundle\Entity\ProductEventAction $productEventActions
     */
    public function removeProductEventAction(\HVP\CoreModelBundle\Entity\ProductEventAction $productEventActions)
    {
        $this->ProductEventActions->removeElement($productEventActions);
    }

    /**
     * Get ProductEventActions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductEventActions()
    {
        return $this->ProductEventActions;
    }

    /**
     * Add ProductEventConditions
     *
     * @param \HVP\CoreModelBundle\Entity\ProductEventCondition $productEventConditions
     * @return ProductEvent
     */
    public function addProductEventCondition(\HVP\CoreModelBundle\Entity\ProductEventCondition $productEventConditions)
    {
        $this->ProductEventConditions[] = $productEventConditions;

        return $this;
    }

    /**
     * Remove ProductEventConditions
     *
     * @param \HVP\CoreModelBundle\Entity\ProductEventCondition $productEventConditions
     */
    public function removeProductEventCondition(\HVP\CoreModelBundle\Entity\ProductEventCondition $productEventConditions)
    {
        $this->ProductEventConditions->removeElement($productEventConditions);
    }

    /**
     * Get ProductEventConditions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductEventConditions()
    {
        return $this->ProductEventConditions;
    }

    /**
     * Add ProductEventInstances
     *
     * @param \HVP\CoreModelBundle\Entity\ProductEventInstance $productEventInstances
     * @return ProductEvent
     */
    public function addProductEventInstance(\HVP\CoreModelBundle\Entity\ProductEventInstance $productEventInstances)
    {
        $this->ProductEventInstances[] = $productEventInstances;

        return $this;
    }

    /**
     * Remove ProductEventInstances
     *
     * @param \HVP\CoreModelBundle\Entity\ProductEventInstance $productEventInstances
     */
    public function removeProductEventInstance(\HVP\CoreModelBundle\Entity\ProductEventInstance $productEventInstances)
    {
        $this->ProductEventInstances->removeElement($productEventInstances);
    }

    /**
     * Get ProductEventInstances
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductEventInstances()
    {
        return $this->ProductEventInstances;
    }

    /**
     * Set Product
     *
     * @param \HVP\CoreModelBundle\Entity\Product $product
     * @return ProductEvent
     */
    public function setProduct(\HVP\CoreModelBundle\Entity\Product $product = null)
    {
        $this->Product = $product;

        return $this;
    }

    /**
     * Get Product
     *
     * @return \HVP\CoreModelBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->Product;
    }
}
