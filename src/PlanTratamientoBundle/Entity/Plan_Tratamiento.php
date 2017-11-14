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


    public function __toString() {
    return $this->getDescripcion();
    }

    /**
    *@ORM\ManyToOne (targetEntity="CategoriaPlanBundle\Entity\Categoria_Plan", inversedBy="categoria__plan")
    *@ORM\JoinColumn(name="categoria_plan_id", referencedColumnName="id", onDelete="CASCADE")
    */
    public $categoria_plan;
    /**
    *Set categoria_plan
    *
    *@param \CategoriaPlanBundle\Entity\Categoria_Plan $categoria_plan
    *
    *@return Plan_Tratamiento
    */
    public function setCategoriaPlan(\CategoriaPlanBundle\Entity\Categoria_Plan $categoria_plan)
    {
        $this->categoria_plan=$categoria_plan;
        
        return $this;
    }

    /**
    *Get categoria_plan
    *
    *@return \CategoriaPlanBundle\Entity\Categoria_Plan
    */
    public function getCategoriaPlan()
    {
        return $this->categoria_plan;

    }

    /**
     * @ORM\OneToMany(targetEntity="TareaBundle\Entity\Tarea", mappedBy="planes")
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
     * @return Plan_Tratamiento
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

    /**
     * @var int
     *
     * @ORM\Column(name="riesgo", type="integer", nullable=true)
     */
    private $riesgo;
    
    /**
     * Set  riesgo
     *
     * @param int $riesgo
     * @return Plan_Tratamiento
     */
    public function setRiesgo($riesgo)
    {
        $this->riesgo = $riesgo;
    
        return $this;
    }

    /**
     * Get riesgo
     *
     * @return integer 
     */
    public function getRiesgo()
    {
        return $this->riesgo;
    }
    
}
