<?php

namespace EmpresaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Empresa
 *
 * @ORM\Table(name="empresa")
 * @ORM\Entity(repositoryClass="EmpresaBundle\Repository\EmpresaRepository")
 */
class Empresa
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
     * @ORM\Column(name="nombre", type="string", length=50, unique=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="objetivos", type="string", length=255, nullable=true)
     */
    private $objetivos;

    /**
     * @var string
     *
     * @ORM\Column(name="politicas", type="string", length=255, nullable=true)
     */
    private $politicas;

    /**
     * @var string
     *
     * @ORM\Column(name="alcances", type="string", length=255, nullable=true)
     */
    private $alcances;


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
     * @return Empresa
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
     * Set objetivos
     *
     * @param string $objetivos
     * @return Empresa
     */
    public function setObjetivos($objetivos)
    {
        $this->objetivos = $objetivos;

        return $this;
    }

    /**
     * Get objetivos
     *
     * @return string 
     */
    public function getObjetivos()
    {
        return $this->objetivos;
    }

    /**
     * Set politicas
     *
     * @param string $politicas
     * @return Empresa
     */
    public function setPoliticas($politicas)
    {
        $this->politicas = $politicas;

        return $this;
    }

    /**
     * Get politicas
     *
     * @return string 
     */
    public function getPoliticas()
    {
        return $this->politicas;
    }

    /**
     * Set alcances
     *
     * @param string $alcances
     * @return Empresa
     */
    public function setAlcances($alcances)
    {
        $this->alcances = $alcances;

        return $this;
    }

    /**
     * Get alcances
     *
     * @return string 
     */
    public function getAlcances()
    {
        return $this->alcances;
    }
}
