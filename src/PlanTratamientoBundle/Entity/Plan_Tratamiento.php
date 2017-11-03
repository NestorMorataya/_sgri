<?php

namespace PlanTratamientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Plan_Tratamiento
 *
 * @ORM\Table(name="plan__tratamiento")
 * @ORM\Entity(repositoryClass="PlanTratamientoBundle\Repository\Plan_TratamientoRepository")
 */
class Plan_Tratamiento
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
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;


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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Plan_Tratamiento
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

  
     public function __toString(){
        // to show the name of the Category in the select
        return $this->descripcion;
        // to show the id of the Category in the select
        // return $this->id;
    }

   /**
     * @ORM\ManyToOne(targetEntity="TareaBundle\Entity\Tarea", inversedBy="Tarea")
     * @ORM\JoinColumn(name="id_tarea", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $Tareas;

   

    /**
     * Set tareas
     *
     * @param \TareaBundle\Entity\Tarea $tareas
     *
     * @return Plan_Tratamiento
     */
    public function setTareas(\TareaBundle\Entity\Tarea $tareas = null)
    {
        $this->Tareas = $tareas;
    
        return $this;
    }

    /**
     * Get tareas
     *
     * @return \TareaBundle\Entity\Tarea
     */
    public function getTareas()
    {
        return $this->Tareas;
    }
}
