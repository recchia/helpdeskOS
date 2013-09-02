<?php

namespace Recchia\HelpdeskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tarea
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Recchia\HelpdeskBundle\Entity\TareaRepository")
 */
class Tarea
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
     * @var object
     *
     * @ORM\ManyToOne(targetEntity="Recchia\HelpdeskBundle\Entity\Categoria", inversedBy="tareas")
     */
    private $categoria;
    
    /**
     *
     * @var ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="Recchia\HelpdeskBundle\Entity\Incidencia", mappedBy="tarea", cascade={"remove"}, orphanRemoval=true)
     */
    private $incidencias;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->incidencias = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Tarea
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
     * Set categoria
     *
     * @param \Recchia\HelpdeskBundle\Entity\Categoria $categoria
     * @return Tarea
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
     * toString
     * 
     * @return string
     */
    public function __toString() {
        return $this->getDescripcion().'';
    }

    /**
     * Add incidencias
     *
     * @param \Recchia\HelpdeskBundle\Entity\Incidencia $incidencias
     * @return Tarea
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
}