<?php

namespace AmenazaCatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Cat_Amenaza
 *
 * @ORM\Table(name="cat__amenaza")
 * @ORM\Entity(repositoryClass="AmenazaCatBundle\Repository\Cat_AmenazaRepository")
 */
class Cat_Amenaza
{
   
   /**
     * @ORM\OneToMany(targetEntity="AmenazaBundle\Entity\Amenaza", mappedBy="cat__amenaza")
    */
    protected $amenaza;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=150)
     */
    private $nombre;

     public function __construct(){
        $this->amenaza = new ArrayCollection();

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
     * Set nombre
     *
     * @param string $nombre
     * @return Cat_Amenaza
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    public function __toString() {
    return $this->getNombre();
    }

    /**
     * Add amenaza
     *
     * @param \AmenazaBundle\Entity\Amenaza $amenaza
     * @return Cat_Amenaza
     */
    public function addAmenaza(\AmenazaBundle\Entity\Amenaza $amenaza)
    {
        $this->amenaza[] = $amenaza;
    
        return $this;
    }

    /**
     * Remove amenaza
     *
     * @param \AmenazaBundle\Entity\Amenaza $amenaza
     */
    public function removeAmenaza(\AmenazaBundle\Entity\Amenaza $amenaza)
    {
        $this->amenaza->removeElement($amenaza);
    }

    /**
     * Get amenaza
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAmenaza()
    {
        return $this->amenaza;
    }
}
