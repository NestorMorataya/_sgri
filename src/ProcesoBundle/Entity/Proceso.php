<?php

namespace ProcesoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proceso
 *
 * @ORM\Table(name="proceso")
 * @ORM\Entity(repositoryClass="ProcesoBundle\Repository\ProcesoRepository")
 */
class Proceso
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
     * @var float
     *
     * @ORM\Column(name="procesoTarea", type="float", nullable=true)
     */
    private $procesoTarea;


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
     * Set procesoTarea
     *
     * @param float $procesoTarea
     *
     * @return Proceso
     */
    public function setProcesoTarea($procesoTarea)
    {
        $this->procesoTarea = $procesoTarea;
    
        return $this;
    }

    /**
     * Get procesoTarea
     *
     * @return float
     */
    public function getProcesoTarea()
    {
        return $this->procesoTarea;
    }

    //cuando el valor a devolver no es un string
    public function __toString() {
    return sprintf(('%s'), $this->getProcesoTarea());
    }


    /**
     * @ORM\ManyToOne(targetEntity="ControlBundle\Entity\Control", inversedBy="procesos")
     * @ORM\JoinColumn(name="id_control", referencedColumnName="id", onDelete="CASCADE") 
     */
    protected $control;


     /**
     * @ORM\ManyToOne(targetEntity="PlanTratamientoBundle\Entity\Plan_Tratamiento", inversedBy="procesos")
     * @ORM\JoinColumn(name="id_plan", referencedColumnName="id", onDelete="CASCADE") 
     */
    protected $plan;


  
    /**
     * Set control
     *
     * @param \ControlBundle\Entity\Control $control
     *
     * @return Proceso
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
     * Set plan
     *
     * @param \PlanTratamientoBundle\Entity\Plan_Tratamiento $plan
     *
     * @return Proceso
     */
    public function setPlan(\PlanTratamientoBundle\Entity\Plan_Tratamiento $plan = null)
    {
        $this->plan = $plan;
    
        return $this;
    }

    /**
     * Get plan
     *
     * @return \PlanTratamientoBundle\Entity\Plan_Tratamiento
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * @ORM\OneToMany(targetEntity="TareaBundle\Entity\Tarea", mappedBy="proceso")
     */
    protected $tareas;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tareas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add tarea
     *
     * @param \TareaBundle\Entity\Tarea $tarea
     *
     * @return Proceso
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
