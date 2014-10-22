<?php

namespace HVP\CoreModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductInstance
 */
class ProductInstance
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $value;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $ProductEventInstances;

    /**
     * @var \HVP\CoreModelBundle\Entity\Product
     */
    private $Product;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Holders;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ProductEventInstances = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Holders = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set value
     *
     * @param string $value
     * @return ProductInstance
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Add ProductEventInstances
     *
     * @param \HVP\CoreModelBundle\Entity\ProductEventInstance $productEventInstances
     * @return ProductInstance
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
     * @return ProductInstance
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

    /**
     * Add Holders
     *
     * @param \HVP\CoreModelBundle\Entity\Holder $holders
     * @return ProductInstance
     */
    public function addHolder(\HVP\CoreModelBundle\Entity\Holder $holders)
    {
        $this->Holders[] = $holders;

        return $this;
    }

    /**
     * Remove Holders
     *
     * @param \HVP\CoreModelBundle\Entity\Holder $holders
     */
    public function removeHolder(\HVP\CoreModelBundle\Entity\Holder $holders)
    {
        $this->Holders->removeElement($holders);
    }

    /**
     * Get Holders
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHolders()
    {
        return $this->Holders;
    }
    /**
     * @var \HVP\CoreModelBundle\Entity\Holder
     */
    private $Holder;


    /**
     * Set Holder
     *
     * @param \HVP\CoreModelBundle\Entity\Holder $holder
     * @return ProductInstance
     */
    public function setHolder(\HVP\CoreModelBundle\Entity\Holder $holder = null)
    {
        $this->Holder = $holder;

        return $this;
    }

    /**
     * Get Holder
     *
     * @return \HVP\CoreModelBundle\Entity\Holder 
     */
    public function getHolder()
    {
        return $this->Holder;
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
     * @return ProductInstance
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
     * @return ProductInstance
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
