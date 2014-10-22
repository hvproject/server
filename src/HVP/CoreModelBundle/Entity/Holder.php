<?php

namespace HVP\CoreModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Holder
 */
class Holder
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $HolderReferences;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $ProductInstances;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->HolderReferences = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ProductInstances = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add HolderReferences
     *
     * @param \HVP\CoreModelBundle\Entity\HolderReference $holderReferences
     * @return Holder
     */
    public function addHolderReference(\HVP\CoreModelBundle\Entity\HolderReference $holderReferences)
    {
        $this->HolderReferences[] = $holderReferences;

        return $this;
    }

    /**
     * Remove HolderReferences
     *
     * @param \HVP\CoreModelBundle\Entity\HolderReference $holderReferences
     */
    public function removeHolderReference(\HVP\CoreModelBundle\Entity\HolderReference $holderReferences)
    {
        $this->HolderReferences->removeElement($holderReferences);
    }

    /**
     * Get HolderReferences
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHolderReferences()
    {
        return $this->HolderReferences;
    }

    /**
     * Add ProductInstances
     *
     * @param \HVP\CoreModelBundle\Entity\ProductInstance $productInstances
     * @return Holder
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
     * @var string
     */
    private $extId;

    /**
     * @var string
     */
    private $extType;


    /**
     * Set extId
     *
     * @param string $extId
     * @return Holder
     */
    public function setExtId($extId)
    {
        $this->extId = $extId;

        return $this;
    }

    /**
     * Get extId
     *
     * @return string 
     */
    public function getExtId()
    {
        return $this->extId;
    }

    /**
     * Set extType
     *
     * @param string $extType
     * @return Holder
     */
    public function setExtType($extType)
    {
        $this->extType = $extType;

        return $this;
    }

    /**
     * Get extType
     *
     * @return string 
     */
    public function getExtType()
    {
        return $this->extType;
    }
}
