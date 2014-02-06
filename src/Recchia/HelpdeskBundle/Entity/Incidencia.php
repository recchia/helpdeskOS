<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Representa los casos del helpdesk
 *
 * @author recchia
 */
namespace Recchia\HelpdeskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Recchia\HelpdeskBundle\Entity\Incidencia
 * 
 * @ORM\Entity()
 */
class Incidencia {
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     *
     * @var datetime
     * 
     * @@ORM/Column(type="datetime")
     */
    private $inicio;
    
    /**
     *
     * @var datetime
     * 
     * @@ORM/Column(type="datetime")
     */
    private $fin;
    
    /**
     *
     * @var object
     * 
     * @ORM\ManyToOne(targetEntity="Recchia\HelpdeskBundle\Entity\UnidadAdministrativa", inversedBy="incidencias")
     */
    private $unidad;
    
    /**
     *
     * @var object
     * 
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User", inversedBy="incidencias")
     */
    private $tecnico;
    
    /**
     *
     * @var integer
     * 
     * @ORM\Column(type="integer", nullable=false)
     * @Assert\NotBlank(message = "Debe ingresar el número de cédula")
     */
    private $cedula;
    
    /**
     *
     * @var string
     * 
     * @ORM\Column(type="string", length=32, nullable=false)
     * @Assert\NotBlank(message = "Debe ingresar el nombre")
     */
    private $nombres;
    
    /**
     *
     * @var string
     * 
     * @ORM\Column(type="string", length=32, nullable=false)
     * @Assert\NotBlank(message = "Debe ingresar el apellido")
     */
    private $apellidos;
    
    /**
     *
     * @var object
     * 
     * @ORM\ManyToOne(targetEntity="Recchia\HelpdeskBundle\Entity\Categoria", inversedBy="incidencias")
     */
    private $categoria;
    
    /**
     *
     * @var object
     * 
     * @ORM\ManyToOne(targetEntity="Recchia\HelpdeskBundle\Entity\Tarea", inversedBy="incidencias")
     */
    private $tarea;
    
    /**
     *
     * @var string
     * 
     * @ORM\Column(type="string", length=600, nullable=false)
     */
    private $incidencia;
    
    /**
     *
     * @var string
     * 
     * @ORM\Column(type="string", length=600, nullable=false)
     */
    private $motivo;
    
    /**
     *
     * @var string
     * 
     * @ORM\Column(type="string", length=600, nullable=false)
     */
    private $solucion;

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
     * Set cedula
     *
     * @param integer $cedula
     * @return Incidencia
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    
        return $this;
    }

    /**
     * Get cedula
     *
     * @return integer 
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set nombres
     *
     * @param string $nombres
     * @return Incidencia
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    
        return $this;
    }

    /**
     * Get nombres
     *
     * @return string 
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return Incidencia
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    
        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set incidencia
     *
     * @param string $incidencia
     * @return Incidencia
     */
    public function setIncidencia($incidencia)
    {
        $this->incidencia = $incidencia;
    
        return $this;
    }

    /**
     * Get incidencia
     *
     * @return string 
     */
    public function getIncidencia()
    {
        return $this->incidencia;
    }

    /**
     * Set motivo
     *
     * @param string $motivo
     * @return Incidencia
     */
    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;
    
        return $this;
    }

    /**
     * Get motivo
     *
     * @return string 
     */
    public function getMotivo()
    {
        return $this->motivo;
    }

    /**
     * Set solucion
     *
     * @param string $solucion
     * @return Incidencia
     */
    public function setSolucion($solucion)
    {
        $this->solucion = $solucion;
    
        return $this;
    }

    /**
     * Get solucion
     *
     * @return string 
     */
    public function getSolucion()
    {
        return $this->solucion;
    }

    /**
     * Set unidad
     *
     * @param \Recchia\HelpdeskBundle\Entity\UnidadAdministrativa $unidad
     * @return Incidencia
     */
    public function setUnidad(\Recchia\HelpdeskBundle\Entity\UnidadAdministrativa $unidad = null)
    {
        $this->unidad = $unidad;
    
        return $this;
    }

    /**
     * Get unidad
     *
     * @return \Recchia\HelpdeskBundle\Entity\UnidadAdministrativa 
     */
    public function getUnidad()
    {
        return $this->unidad;
    }

    /**
     * Set tecnico
     *
     * @param \Application\Sonata\UserBundle\Entity\User $tecnico
     * @return Incidencia
     */
    public function setTecnico(\Application\Sonata\UserBundle\Entity\User $tecnico = null)
    {
        $this->tecnico = $tecnico;
    
        return $this;
    }

    /**
     * Get tecnico
     *
     * @return \Application\Sonata\UserBundle\Entity\User 
     */
    public function getTecnico()
    {
        return $this->tecnico;
    }

    /**
     * Set categoria
     *
     * @param \Recchia\HelpdeskBundle\Entity\Categoria $categoria
     * @return Incidencia
     */
    public function setCategoria(\Recchia\HelpdeskBundle\Entity\Categoria $categoria = null)
    {
        $this->categoria = $categoria;
    
        return $this;
    }

    /**
     * Get categoria
     *
     * @return \Recchia\HelpdeskBundle\Entity\Categoria 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set tarea
     *
     * @param \Recchia\HelpdeskBundle\Entity\Tarea $tarea
     * @return Incidencia
     */
    public function setTarea(\Recchia\HelpdeskBundle\Entity\Tarea $tarea = null)
    {
        $this->tarea = $tarea;
    
        return $this;
    }

    /**
     * Get tarea
     *
     * @return \Recchia\HelpdeskBundle\Entity\Tarea 
     */
    public function getTarea()
    {
        return $this->tarea;
    }
}