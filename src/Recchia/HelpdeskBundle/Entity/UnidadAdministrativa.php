<?php

namespace Recchia\HelpdeskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Recchia\HelpdeskBundle\Entity\UnidadAdministrativa
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class UnidadAdministrativa
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
     * @ORM\Column(name="nombre", type="string", length=255)
     * @Assert\NotBlank(message="Debe ingresar un Nombre")
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=20)
     * @Assert\NotBlank(message="Debe ingresar un Código")
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="ubicacion", type="text")
     * @Assert\NotBlank(message="Debe ingresar una Ubicación")
     */
    private $ubicacion;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="UnidadAdministrativa", mappedBy="parent")
     */
    private $children;

    /**
     * @var object
     *
     * @ORM\ManyToOne(targetEntity="UnidadAdministrativa", inversedBy="children")
     */
    private $parent;
    
    /**
     * @var boolean
     * 
     * @ORM\Column(type="boolean")
     */
    private $isHelpdesk;
    
    /**
     *
     * @var ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="Application\Sonata\UserBundle\Entity\User", mappedBy="unidad_administrativa", cascade={"remove"}, orphanRemoval=true)
     */
    private $users;
    
    /**
     *
     * @var ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="Recchia\HelpdeskBundle\Entity\Incidencia", mappedBy="unidad", cascade={"remove"}, orphanRemoval=true)
     */
    private $incidencias;
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     * @return UnidadAdministrativa
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
     * Set codigo
     *
     * @param string $codigo
     * @return UnidadAdministrativa
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
     * Set ubicacion
     *
     * @param string $ubicacion
     * @return UnidadAdministrativa
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
     * Set isHelpdesk
     *
     * @param boolean $isHelpdesk
     * @return UnidadAdministrativa
     */
    public function setIsHelpdesk($isHelpdesk)
    {
        $this->isHelpdesk = $isHelpdesk;
    
        return $this;
    }

    /**
     * Get isHelpdesk
     *
     * @return boolean 
     */
    public function getIsHelpdesk()
    {
        return $this->isHelpdesk;
    }

    /**
     * Add children
     *
     * @param \Recchia\HelpdeskBundle\Entity\UnidadAdministrativa $children
     * @return UnidadAdministrativa
     */
    public function addChildren(\Recchia\HelpdeskBundle\Entity\UnidadAdministrativa $children)
    {
        $this->children[] = $children;
    
        return $this;
    }

    /**
     * Remove children
     *
     * @param \Recchia\HelpdeskBundle\Entity\UnidadAdministrativa $children
     */
    public function removeChildren(\Recchia\HelpdeskBundle\Entity\UnidadAdministrativa $children)
    {
        $this->children->removeElement($children);
    }

    /**
     * Get children
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set parent
     *
     * @param \Recchia\HelpdeskBundle\Entity\UnidadAdministrativa $parent
     * @return UnidadAdministrativa
     */
    public function setParent(\Recchia\HelpdeskBundle\Entity\UnidadAdministrativa $parent = null)
    {
        $this->parent = $parent;
    
        return $this;
    }

    /**
     * Get parent
     *
     * @return \Recchia\HelpdeskBundle\Entity\UnidadAdministrativa 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add users
     *
     * @param \Application\Sonata\UserBundle\Entity\User $users
     * @return UnidadAdministrativa
     */
    public function addUser(\Application\Sonata\UserBundle\Entity\User $users)
    {
        $this->users[] = $users;
    
        return $this;
    }

    /**
     * Remove users
     *
     * @param \Application\Sonata\UserBundle\Entity\User $users
     */
    public function removeUser(\Application\Sonata\UserBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
    
    /**
     * toString
     * 
     * @return string
     */
    public function __toString() {
        return $this->getCodigo().' '.$this->getNombre();
    }

    /**
     * Add incidencias
     *
     * @param \Recchia\HelpdeskBundle\Entity\Incidencia $incidencias
     * @return UnidadAdministrativa
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