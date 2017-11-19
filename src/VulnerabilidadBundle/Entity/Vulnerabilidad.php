<?php

namespace VulnerabilidadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vulnerabilidad
 *
 * @ORM\Table(name="vulnerabilidad")
 * @ORM\Entity(repositoryClass="VulnerabilidadBundle\Repository\VulnerabilidadRepository")
 */
class Vulnerabilidad
{


     /**
     * @ORM\ManyToOne(targetEntity="VulnerabilidadCatBundle\Entity\Cat_Vulnerabilidad", inversedBy="cat__vulnerabilidad")
      * @ORM\JoinColumn(name="categoria_id", referencedColumnName="id", onDelete="CASCADE")
      */
    protected $cat__vulnerabilidad;
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
     * @ORM\Column(name="nombre", type="string", length=255)
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
     *
     * @return Vulnerabilidad
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
     * Set cat__vulnerabilidad
     *
     * @param \VulnerabilidadCatBundle\Entity\Cat_Vulnerabilidad $catVulnerabilidad
     * @return Vulnerabilidad
     */
    public function setCatVulnerabilidad(\VulnerabilidadCatBundle\Entity\Cat_Vulnerabilidad $catVulnerabilidad = null)
    {
        $this->cat__vulnerabilidad = $catVulnerabilidad;
    
        return $this;
    }

    /**
     * Get cat__vulnerabilidad
     *
     * @return \VulnerabilidadCatBundle\Entity\Cat_Vulnerabilidad 
     */
    public function getCatVulnerabilidad()
    {
        return $this->cat__vulnerabilidad;
    }
}

