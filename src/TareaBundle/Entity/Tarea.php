<?php

namespace TareaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tarea
 *
 * @ORM\Table(name="tarea")
 * @ORM\Entity(repositoryClass="TareaBundle\Repository\TareaRepository")
 */
class Tarea
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
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50)
     */
    private $nombre;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean", nullable=true)
     */
    private $estado;

    /**
     * Get id
     *
     * @return int
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
     * @return Tarea
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
     * @ORM\ManyToOne(targetEntity="ControlBundle\Entity\Control", inversedBy="tareas")
     * @ORM\JoinColumn(name="id_control", referencedColumnName="id", onDelete="CASCADE") 
     */
    protected $controles;


    /**
     * @ORM\ManyToOne(targetEntity="PlanTratamientoBundle\Entity\Plan_Tratamiento", inversedBy="tareas")
     * @ORM\JoinColumn(name="id_plan", referencedColumnName="id", onDelete="CASCADE") 
     */
    protected $planes;

    /**
     * Set controles
     *
     * @param \ControlBundle\Entity\Control $controles
     *
     * @return Tarea
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

    /**
     * Set planes
     *
     * @param \PlanTratamientoBundle\Entity\Plan_Tratamiento $planes
     *
     * @return Tarea
     */
    public function setPlanes(\PlanTratamientoBundle\Entity\Plan_Tratamiento $planes = null)
    {
        $this->planes = $planes;
    
        return $this;
    }

    /**
     * Get planes
     *
     * @return \PlanTratamientoBundle\Entity\Plan_Tratamiento
     */
    public function getPlanes()
    {
        return $this->planes;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     *
     * @return Tarea
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean
     */
    public function getEstado()
    {
        return $this->estado;
    }
}
