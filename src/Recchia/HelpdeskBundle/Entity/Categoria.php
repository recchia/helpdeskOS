<?php

namespace Recchia\HelpdeskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categoria
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Categoria
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=100)
     */
    private $descripcion;
    
    /**
     *
     * @var ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="Recchia\HelpdeskBundle\Entity\Incidencia", mappedBy="categoria", cascade={"remove"}, orphanRemoval=true)
     */
    private $incidencias;
    
    /**
     *
     * @var ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="Recchia\HelpdeskBundle\Entity\Tarea", mappedBy="categoria", cascade={"remove"}, orphanRemoval=true)
     */
    private $tareas;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->incidencias = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tareas = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Categoria
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
     * toString
     * 
     * @return string
     */
    public function __toString() {
        return $this->getDescripcion();
    }

    /**
     * Add incidencias
     *
     * @param \Recchia\HelpdeskBundle\Entity\Incidencia $incidencias
     * @return Categoria
     */
    public function addIncidencia(\Recchia\HelpdeskBundle\Entity\Incidencia $incidencias)
    {
        $this->incidencias[] = $incidencias;
    
        return $this;
    }

    /**
     * Remove incidencias
     *
     * @param \Recchia\HelpdeskBundle\Entity\Incidencia $incidencias
     */
    public function removeIncidencia(\Recchia\HelpdeskBundle\Entity\Incidencia $incidencias)
    {
        $this->incidencias->removeElement($incidencias);
    }

    /**
     * Get incidencias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIncidencias()
    {
        return $this->incidencias;
    }

    /**
     * Add tareas
     *
     * @param \Recchia\HelpdeskBundle\Entity\Tarea $tareas
     * @return Categoria
     */
    public function addTarea(\Recchia\HelpdeskBundle\Entity\Tarea $tareas)
    {
        $this->tareas[] = $tareas;
    
        return $this;
    }

    /**
     * Remove tareas
     *
     * @param \Recchia\HelpdeskBundle\Entity\Tarea $tareas
     */
    public function removeTarea(\Recchia\HelpdeskBundle\Entity\Tarea $tareas)
    {
        $this->tareas->removeElement($tareas);
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
}