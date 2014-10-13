<?php

namespace HVP\CoreModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 */
class Product
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
    private $type;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $ProductInstances;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $ProductEvents;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ProductInstances = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ProductEvents = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Product
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
     * Set type
     *
     * @param string $type
     * @return Product
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add ProductInstances
     *
     * @param \HVP\CoreModelBundle\Entity\ProductInstance $productInstances
     * @return Product
     */
    public function addProductInstance(\HVP\CoreModelBundle\Entity\ProductInstance $productInstances)
    {
        $this->ProductInstances[] = $productInstances;

        return $this;
    }

    /**
     * Remove ProductInstances
     *
     * @param \HVP\CoreModelBundle\Entity\ProductInstance $productInstances
     */
    public function removeProductInstance(\HVP\CoreModelBundle\Entity\ProductInstance $productInstances)
    {
        $this->ProductInstances->removeElement($productInstances);
    }

    /**
     * Get ProductInstances
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductInstances()
    {
        return $this->ProductInstances;
    }

    /**
     * Add ProductEvents
     *
     * @param \HVP\CoreModelBundle\Entity\ProductEvent $productEvents
     * @return Product
     */
    public function addProductEvent(\HVP\CoreModelBundle\Entity\ProductEvent $productEvents)
    {
        $this->ProductEvents[] = $productEvents;

        return $this;
    }

    /**
     * Remove ProductEvents
     *
     * @param \HVP\CoreModelBundle\Entity\ProductEvent $productEvents
     */
    public function removeProductEvent(\HVP\CoreModelBundle\Entity\ProductEvent $productEvents)
    {
        $this->ProductEvents->removeElement($productEvents);
    }

    /**
     * Get ProductEvents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductEvents()
    {
        return $this->ProductEvents;
    }
}
