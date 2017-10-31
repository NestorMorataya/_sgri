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
     * @ORM\ManyToOne(targetEntity="PlanTratamientoBundle\Entity\Plan_Tratamiento")
     */
    protected $planTratamiento;


    /**
     * @ORM\OneToMany(targetEntity="TareaBundle\Entity\Tarea", mappedBy="control")
     */
    private $tareas;

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
     * Set control
     *
     * @param \ControlBundle\Entity\Control $control
     *
     * @return Tarea
     */
    public function setControl(\ControlBundle\Entity\Control $control = null)
    {
        $this->control = $control;
    
        return $this;
    }

    /**
     * Get control
     *
     * @return \ControlBundle\Entity\Control
     */
    public function getControl()
    {
        return $this->control;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="control_id", type="integer", nullable=true)
     */
    private $controlId;

    /**
     * Generates the magic method
     * 
     */
     public function __toString(){
        // to show the name of the Category in the select
        return $this->nombre;
        // to show the id of the Category in the select
        // return $this->id;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tareas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set controlId
     *
     * @param integer $controlId
     *
     * @return Tarea
     */
    public function setControlId($controlId)
    {
        $this->controlId = $controlId;
    
        return $this;
    }

    /**
     * Get controlId
     *
     * @return integer
     */
    public function getControlId()
    {
        return $this->controlId;
    }

    /**
     * Set planTratamiento
     *
     * @param \PlanTratamientoBundle\Entity\Plan_Tratamiento $planTratamiento
     *
     * @return Tarea
     */
    public function setPlanTratamiento(\PlanTratamientoBundle\Entity\Plan_Tratamiento $planTratamiento = null)
    {
        $this->planTratamiento = $planTratamiento;
    
        return $this;
    }

    /**
     * Get planTratamiento
     *
     * @return \PlanTratamientoBundle\Entity\Plan_Tratamiento
     */
    public function getPlanTratamiento()
    {
        return $this->planTratamiento;
    }

    /**
     * Add tarea
     *
     * @param \TareaBundle\Entity\Tarea $tarea
     *
     * @return Tarea
     */
    public function addTarea(\TareaBundle\Entity\Tarea $tarea)
    {
        $this->tareas[] = $tarea;
    
        return $this;
    }

    /**
     * Remove tarea
     *
     * @param \TareaBundle\Entity\Tarea $tarea
     */
    public function removeTarea(\TareaBundle\Entity\Tarea $tarea)
    {
        $this->tareas->removeElement($tarea);
    }

    /**
     * Get tareas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTareas()
    {
        return $this->tareas;
    }
}
