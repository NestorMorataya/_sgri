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


    /**
     * @ORM\ManyToOne(targetEntity="TareaBundle\Entity\Tarea")
     */
    protected $tarea;

    /**
     * Set tarea
     *
     * @param \TareaBundle\Entity\Tarea $tarea
     *
     * @return Plan_Tratamiento
     */
    public function setTarea(\TareaBundle\Entity\Tarea $tarea = null)
    {
        $this->tarea = $tarea;
    
        return $this;
    }

    /**
     * Get tarea
     *
     * @return \TareaBundle\Entity\Tarea
     */
    public function getTarea()
    {
        return $this->tarea;
    }

     public function __toString(){
        // to show the name of the Category in the select
        return $this->descripcion;
        // to show the id of the Category in the select
        // return $this->id;
    }
}