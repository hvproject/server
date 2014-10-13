<?php

namespace HVP\CoreModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HolderReference
 */
class HolderReference
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $ident;

    /**
     * @var string
     */
    private $type;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Holders;

    /**
     * Constructor
     */
    public function __construct()
    {
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
     * Set ident
     *
     * @param string $ident
     * @return HolderReference
     */
    public function setIdent($ident)
    {
        $this->ident = $ident;

        return $this;
    }

    /**
     * Get ident
     *
     * @return string 
     */
    public function getIdent()
    {
        return $this->ident;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return HolderReference
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
     * Set active
     *
     * @param boolean $active
     * @return HolderReference
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Add Holders
     *
     * @param \HVP\CoreModelBundle\Entity\Holder $holders
     * @return HolderReference
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
     * @return HolderReference
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
}
