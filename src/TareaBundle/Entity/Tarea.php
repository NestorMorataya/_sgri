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
     * @var boolean
     *
     * @ORM\Column(name="hecha", type="boolean", nullable=true)
     */
    private $hecha;

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
     * Get hecha
     *
     * @return boolean
     */
    public function getHecha()
    {
        return $this->hecha;
    }


    /**
     * Set hecha
     *
     * @param boolean $hecha
     *
     * @return Tarea
     */
    public function setHecha($hecha)
    {
        $this->hecha = $hecha;

        return $this;
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


    public function __toString() {
    return $this->getNombre();
    }


    /**
     * @ORM\ManyToOne(targetEntity="ProcesoBundle\Entity\Proceso", inversedBy="tareas")
     * @ORM\JoinColumn(name="id_proceso", referencedColumnName="id", onDelete="CASCADE") 
     */
    protected $proceso;


    /**
     * Set proceso
     *
     * @param \ProcesoBundle\Entity\Proceso $proceso
     *
     * @return Tarea
     */ 
    public function setProceso(\ProcesoBundle\Entity\Proceso $proceso = null)
    {
        $this->proceso = $proceso;
    
        return $this;
    }

    /**
     * Get proceso
     *
     * @return \ProcesoBundle\Entity\Proceso
     */
    public function getProceso()
    {
        return $this->proceso;
    }

 
}
