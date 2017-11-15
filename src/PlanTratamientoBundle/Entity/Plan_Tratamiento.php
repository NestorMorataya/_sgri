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
     * @ORM\OneToMany(targetEntity="ProcesoBundle\Entity\Proceso", mappedBy="plan")
     */
    protected $procesos;

   

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
    
   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->procesos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add proceso
     *
     * @param \ProcesoBundle\Entity\Proceso $proceso
     *
     * @return Plan_Tratamiento
     */
    public function addProceso(\ProcesoBundle\Entity\Proceso $proceso)
    {
        $this->procesos[] = $proceso;
    
        return $this;
    }

    /**
     * Remove proceso
     *
     * @param \ProcesoBundle\Entity\Proceso $proceso
     */
    public function removeProceso(\ProcesoBundle\Entity\Proceso $proceso)
    {
        $this->procesos->removeElement($proceso);
    }

    /**
     * Get procesos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProcesos()
    {
        return $this->procesos;
    }
}
