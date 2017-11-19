<?php

namespace VulnerabilidadCatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Cat_Vulnerabilidad
 *
 * @ORM\Table(name="cat__vulnerabilidad")
 * @ORM\Entity(repositoryClass="VulnerabilidadCatBundle\Repository\Cat_VulnerabilidadRepository")
 */
class Cat_Vulnerabilidad
{   
       /**
     * @ORM\OneToMany(targetEntity="VulnerabilidadBundle\Entity\Vulnerabilidad", mappedBy="cat__vulnerabilidad")
    */
    protected $vulnerabilidad;
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
     * @return Cat_Vulnerabilidad
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

    public function __construct(){
        $this->vulnerabilidad = new ArrayCollection();

    }

    /**
     * Add vulnerabilidad
     *
     * @param \VulnerabilidadBundle\Entity\Vulnerabilidad $vulnerabilidad
     * @return Cat_Vulnerabilidad
     */
    public function addVulnerabilidad(\VulnerabilidadBundle\Entity\Vulnerabilidad $vulnerabilidad)
    {
        $this->vulnerabilidad[] = $vulnerabilidad;
    
        return $this;
    }

    /**
     * Remove vulnerabilidad
     *
     * @param \VulnerabilidadBundle\Entity\Vulnerabilidad $vulnerabilidad
     */
    public function removeVulnerabilidad(\VulnerabilidadBundle\Entity\Vulnerabilidad $vulnerabilidad)
    {
        $this->vulnerabilidad->removeElement($vulnerabilidad);
    }

    /**
     * Get vulnerabilidad
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVulnerabilidad()
    {
        return $this->vulnerabilidad;
    }

    public function __toString() {
    return $this->getNombre();
    }

}

