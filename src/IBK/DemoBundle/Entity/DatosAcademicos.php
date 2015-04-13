<?php

namespace IBK\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * DatosAcademicos
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class DatosAcademicos
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=20)
     * @ORM\Id
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="educacion", type="string", length=255, nullable=true)
     */
    private $educacion;

    /**
     * @var string
     *
     * @ORM\Column(name="profesion", type="string", length=255, nullable=true)
     */
    private $profesion;

    /**
     * @var string
     *
     * @ORM\Column(name="universidad", type="string", length=255, nullable=true)
     */
    private $universidad;

    /**
     * @var string
     *
     * @ORM\Column(name="economia", type="string", length=255, nullable=true)
     */
    private $economia;
    

    /**
     * Set id
     *
     * @param string $id
     * @return DatosAcademicos
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set educacion
     *
     * @param string $educacion
     * @return DatosAcademicos
     */
    public function setEducacion($educacion)
    {
        $this->educacion = $educacion;

        return $this;
    }

    /**
     * Get educacion
     *
     * @return string 
     */
    public function getEducacion()
    {
        return $this->educacion;
    }

    /**
     * Set profesion
     *
     * @param string $profesion
     * @return DatosAcademicos
     */
    public function setProfesion($profesion)
    {
        $this->profesion = $profesion;

        return $this;
    }

    /**
     * Get profesion
     *
     * @return string 
     */
    public function getProfesion()
    {
        return $this->profesion;
    }

    /**
     * Set universidad
     *
     * @param string $universidad
     * @return DatosAcademicos
     */
    public function setUniversidad($universidad)
    {
        $this->universidad = $universidad;

        return $this;
    }

    /**
     * Get universidad
     *
     * @return string 
     */
    public function getUniversidad()
    {
        return $this->universidad;
    }

    /**
     * Set economia
     *
     * @param string $economia
     * @return DatosAcademicos
     */
    public function setEconomia($economia)
    {
        $this->economia = $economia;

        return $this;
    }

    /**
     * Get economia
     *
     * @return string 
     */
    public function getEconomia()
    {
        return $this->economia;
    }
}
