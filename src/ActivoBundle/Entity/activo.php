<?php

namespace ActivoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * activo
 *
 * @ORM\Table(name="activo")
 * @ORM\Entity(repositoryClass="ActivoBundle\Repository\activoRepository")
 */
class activo
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
     * @ORM\Column(name="codigo", type="string", length=50)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=50)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="unidad_responsable", type="string", length=50)
     */
    private $unidadResponsable;

    /**
     * @var string
     *
     * @ORM\Column(name="persona_responsable", type="string", length=50)
     */
    private $personaResponsable;

    /**
     * @var string
     *
     * @ORM\Column(name="ubicacion", type="string", length=50)
     */
    private $ubicacion;

    /**
     * @var int
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;
     /**
     * @var string
     *
     * @ORM\Column(name="categoria", type="string", length=50, nullable=true)
     */
    private $categoria;

            /**
     * @var string
     *
     * @ORM\Column(name="empresa_id", type="integer", nullable=true)
     */
    private $empresaId;

    public function setEmpresa($empresaId)
    {
        $this->empresaId = $empresaId;

        return $this;
    }

    public function getEmpresa()
    {
        return $this->empresaId;
    }


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
     * Set codigo
     *
     * @param string $codigo
     * @return activo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    
        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }
     /**
     * Set codigo
     *
     * @param string $categoria
     * @return activo
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    
        return $this;
    }

    /**
     * Get categoria
     *
     * @return string 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }


    /**
     * Set nombre
     *
     * @param string $nombre
     * @return activo
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return activo
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
     * Set unidadResponsable
     *
     * @param string $unidadResponsable
     * @return activo
     */
    public function setUnidadResponsable($unidadResponsable)
    {
        $this->unidadResponsable = $unidadResponsable;
    
        return $this;
    }

    /**
     * Get unidadResponsable
     *
     * @return string 
     */
    public function getUnidadResponsable()
    {
        return $this->unidadResponsable;
    }

    /**
     * Set personaResponsable
     *
     * @param string $personaResponsable
     * @return activo
     */
    public function setPersonaResponsable($personaResponsable)
    {
        $this->personaResponsable = $personaResponsable;
    
        return $this;
    }

    /**
     * Get personaResponsable
     *
     * @return string 
     */
    public function getPersonaResponsable()
    {
        return $this->personaResponsable;
    }

    /**
     * Set ubicacion
     *
     * @param string $ubicacion
     * @return activo
     */
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;
    
        return $this;
    }

    /**
     * Get ubicacion
     *
     * @return string 
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return activo
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    
        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }


    /**
     * Set empresaId
     *
     * @param integer $empresaId
     *
     * @return activo
     */
    public function setEmpresaId($empresaId)
    {
        $this->empresaId = $empresaId;
    
        return $this;
    }

    /**
     * Get empresaId
     *
     * @return integer
     */
    public function getEmpresaId()
    {
        return $this->empresaId;
    }

    public function __toString() {
    return $this->getNombre();
    }
}
