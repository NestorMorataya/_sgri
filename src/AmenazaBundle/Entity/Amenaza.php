<?php

namespace AmenazaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Amenaza
 *
 * @ORM\Table(name="amenaza")
 * @ORM\Entity(repositoryClass="AmenazaBundle\Repository\AmenazaRepository")
 */
class Amenaza
{

     /**
     * @ORM\ManyToOne(targetEntity="AmenazaCatBundle\Entity\Cat_Amenaza", inversedBy="cat__amenaza")
      * @ORM\JoinColumn(name="categoria_id", referencedColumnName="id", onDelete="CASCADE")
      */
    protected $cat__amenaza;

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
     * @ORM\Column(name="nombre", type="string", length=180)
     */
    private $nombre;


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
     * @return Amenaza
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

    /**
     * Set cat__amenaza
     *
     * @param \AmenazaCatBundle\Entity\Cat_Amenaza $catAmenaza
     * @return Amenaza
     */
    public function setCatAmenaza(\AmenazaCatBundle\Entity\Cat_Amenaza $catAmenaza = null)
    {
        $this->cat__amenaza = $catAmenaza;
    
        return $this;
    }

    /**
     * Get cat__amenaza
     *
     * @return \AmenazaCatBundle\Entity\Cat_Amenaza 
     */
    public function getCatAmenaza()
    {
        return $this->cat__amenaza;
    }
}
