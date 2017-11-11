<?php

namespace CategoriaPlanBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categoria_Plan
 *
 * @ORM\Table(name="categoria__plan")
 * @ORM\Entity(repositoryClass="CategoriaPlanBundle\Repository\Categoria_PlanRepository")
 */
class Categoria_Plan
{
    /*
    *Una categoria tiene un plan (One-To-One)
    *"@ORM\OneToOne (targetEntity="PlanTratamientoBundle\Entity\Plan_Tratamiento")
    *
    */
    protected $plan_tratamiento;

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
     * @return Categoria_Plan
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
    *Add plan_tratamiento
    *
    *@param \PlanTratamientoBundle\Entity\Plan_Tratamiento $plan_tratamiento
    *
    *@return Categoria_Plan
    */
    public function addPlanTratamiento(\PlanTratamientoBundle\Entity\Plan_Tratamiento $plan_tratamiento)
    {
        $this->plan_tratamiento[]=$plan_tratamiento;
        return $this;
    }

    /**
     * Remove plan_tratamiento
     *
     * @param \PlanTratamientoBundle\Entity\Plan_Tratamiento $plan_tratamiento
     */
    public function removeAmenaza(\PlanTratamientoBundle\Entity\Plan_Tratamiento $plan_tratamiento)
    {
        $this->plan_tratamiento->removeElement($plan_tratamiento);
    }

    /**
    *Get plan_tratamiento
    *
    *@return \PlanTratamientoBundle\Entity\Plan_Tratamiento
    */
    public function getPlanTratamiento (){
        return $this->plan_tratamiento;
    }

    public function __toString(){
        return $this->getNombre();
    }


}
