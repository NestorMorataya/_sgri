<?php

namespace ControlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Control
 *
 * @ORM\Table(name="control")
 * @ORM\Entity(repositoryClass="ControlBundle\Repository\ControlRepository")
 */
class Control
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
     * @ORM\Column(name="dominio", type="string", length=50)
     */
    private $dominio;

    /**
     * @var string
     *
     * @ORM\Column(name="objetivo", type="string", length=50)
     */
    private $objetivo;

    /**
     * @var string
     *
     * @ORM\Column(name="control", type="string", length=50)
     */
    private $control;


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
     * Set dominio
     *
     * @param string $dominio
     *
     * @return Control
     */
    public function setDominio($dominio)
    {
        $this->dominio = $dominio;

        return $this;
    }

    /**
     * Get dominio
     *
     * @return string
     */
    public function getDominio()
    {
        return $this->dominio;
    }

    /**
     * Set objetivo
     *
     * @param string $objetivo
     *
     * @return Control
     */
    public function setObjetivo($objetivo)
    {
        $this->objetivo = $objetivo;

        return $this;
    }

    /**
     * Get objetivo
     *
     * @return string
     */
    public function getObjetivo()
    {
        return $this->objetivo;
    }

    /**
     * Set control
     *
     * @param string $control
     *
     * @return Control
     */
    public function setControl($control)
    {
        $this->control = $control;

        return $this;
    }

    /**
     * Get control
     *
     * @return string
     */
    public function getControl()
    {
        return $this->control;
    }
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
     * @return Control
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

     public function __toString(){
        // to show the name of the Category in the select
        return $this->control;
        // to show the id of the Category in the select
        // return $this->id;
    }
}
