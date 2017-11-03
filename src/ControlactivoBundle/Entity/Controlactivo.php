<?php

namespace ControlactivoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Controlactivo
 *
 * @ORM\Table(name="controlactivo")
 * @ORM\Entity(repositoryClass="ControlactivoBundle\Repository\ControlactivoRepository")
 */
class Controlactivo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


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
     * @ORM\ManyToOne(targetEntity="ActivoBundle\Entity\activo", inversedBy="Activo")
     * @ORM\JoinColumn(name="id_activo", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $activos;

    /**
     * @ORM\ManyToOne(targetEntity="ControlBundle\Entity\Control", inversedBy="Control")
     * @ORM\JoinColumn(name="id_control", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $controles;

   
 

    /**
     * Set activos
     *
     * @param \ActivoBundle\Entity\activo $activos
     *
     * @return Controlactivo
     */
    public function setActivos(\ActivoBundle\Entity\activo $activos = null)
    {
        $this->activos = $activos;
    
        return $this;
    }

    /**
     * Get activos
     *
     * @return \ActivoBundle\Entity\activo
     */
    public function getActivos()
    {
        return $this->activos;
    }

    /**
     * Set controles
     *
     * @param \ControlBundle\Entity\Control $controles
     *
     * @return Controlactivo
     */
    public function setControles(\ControlBundle\Entity\Control $controles = null)
    {
        $this->controles = $controles;
    
        return $this;
    }

    /**
     * Get controles
     *
     * @return \ControlBundle\Entity\Control
     */
    public function getControles()
    {
        return $this->controles;
    }
}
