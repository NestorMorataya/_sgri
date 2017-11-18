<?php

namespace ControlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Media;
use AppBundle\Form\MediaType;
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
     * @var strings
     *
     * @ORM\Column(name="control", type="string", length=50)
     */
    private $control;


    public function __construct()
    {
        $this->tareas = new ArrayCollection();
    }

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


    public function __toString() {
    return $this->getControl();
    }

   /**
     * @ORM\OneToMany(targetEntity="ProcesoBundle\Entity\Proceso", mappedBy="control")
     */
    protected $procesos;

    
   

    /**
     * Add proceso
     *
     * @param \ProcesoBundle\Entity\Proceso $proceso
     *
     * @return Control
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
