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
     * @ORM\ManyToOne(targetEntity="ControlBundle\Entity\Control", inversedBy="Control")
     * @ORM\JoinColumn(name="id_control", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $controles;


    /**
     * @ORM\OneToMany(targetEntity="PlanTratamientoBundle\Entity\Plan_Tratamiento", mappedBy="control")
     */
    protected $plan_Tratamiento;


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
        $this->plan_Tratamiento = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Add planTratamiento
     *
     * @param \PlanTratamientoBundle\Entity\Plan_Tratamiento $planTratamiento
     *
     * @return Tarea
     */
    public function addPlanTratamiento(\PlanTratamientoBundle\Entity\Plan_Tratamiento $planTratamiento)
    {
        $this->plan_Tratamiento[] = $planTratamiento;
    
        return $this;
    }

    /**
     * Remove planTratamiento
     *
     * @param \PlanTratamientoBundle\Entity\Plan_Tratamiento $planTratamiento
     */
    public function removePlanTratamiento(\PlanTratamientoBundle\Entity\Plan_Tratamiento $planTratamiento)
    {
        $this->plan_Tratamiento->removeElement($planTratamiento);
    }

    /**
     * Get planTratamiento
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlanTratamiento()
    {
        return $this->plan_Tratamiento;
    }

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
}
