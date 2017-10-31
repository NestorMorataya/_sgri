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
     * @ORM\ManyToOne(targetEntity="ControlBundle\Entity\Control")
     */
    protected $control;


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


}
