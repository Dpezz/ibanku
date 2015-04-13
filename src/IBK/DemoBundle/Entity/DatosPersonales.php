<?php

namespace IBK\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * DatosPersonales
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class DatosPersonales
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
     * @ORM\Column(name="numero_serie", type="string", length=255, nullable=true)
     */
    private $numero_serie;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido_p", type="string", length=255, nullable=true)
     */
    private $apellido_p;


    /**
     * @var string
     *
     * @ORM\Column(name="apellido_m", type="string", length=255, nullable=true)
     */
    private $apellido_m;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=10, nullable=true)
     */
    private $sexo;


    /**
     * @var date
     *
     * @ORM\Column(name="fecha_nacimiento", type="date", nullable=true)
     */
    private $fecha_nacimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="nacionalidad", type="string", length=255, nullable=true)
     */
    private $nacionalidad;

    /**
     * @var string
     *
     * @ORM\Column(name="estado_civil", type="string", length=255, nullable=true)
     */
    private $estado_civil;

    /**
     * @var integer
     *
     * @ORM\Column(name="dependientes", type="integer", nullable=true)
     */
    private $dependientes;


    /**
     * Set id
     *
     * @param string $id
     * @return Datos_Personales_One
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
     * Set numero_serie
     *
     * @param string $numeroSerie
     * @return Datos_Personales_One
     */
    public function setNumeroSerie($numeroSerie)
    {
        $this->numero_serie = $numeroSerie;

        return $this;
    }

    /**
     * Get numero_serie
     *
     * @return string 
     */
    public function getNumeroSerie()
    {
        return $this->numero_serie;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Datos_Personales_One
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
     * Set apellido_p
     *
     * @param string $apellidoP
     * @return Datos_Personales_One
     */
    public function setApellidoP($apellidoP)
    {
        $this->apellido_p = $apellidoP;

        return $this;
    }

    /**
     * Get apellido_p
     *
     * @return string 
     */
    public function getApellidoP()
    {
        return $this->apellido_p;
    }

    /**
     * Set apellido_m
     *
     * @param string $apellidoM
     * @return Datos_Personales_One
     */
    public function setApellidoM($apellidoM)
    {
        $this->apellido_m = $apellidoM;

        return $this;
    }

    /**
     * Get apellido_m
     *
     * @return string 
     */
    public function getApellidoM()
    {
        return $this->apellido_m;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     * @return Datos_Personales_One
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return string 
     */
    public function getSexo()
    {
        return $this->sexo;
    }


    /**
     * Set nacionalidad
     *
     * @param string $nacionalidad
     * @return Datos_Personales_One
     */
    public function setNacionalidad($nacionalidad)
    {
        $this->nacionalidad = $nacionalidad;

        return $this;
    }

    /**
     * Get nacionalidad
     *
     * @return string 
     */
    public function getNacionalidad()
    {
        return $this->nacionalidad;
    }

    /**
     * Set estado_civil
     *
     * @param string $estadoCivil
     * @return Datos_Personales_One
     */
    public function setEstadoCivil($estadoCivil)
    {
        $this->estado_civil = $estadoCivil;

        return $this;
    }

    /**
     * Get estado_civil
     *
     * @return string 
     */
    public function getEstadoCivil()
    {
        return $this->estado_civil;
    }

    /**
     * Set fecha_nacimiento
     *
     * @param \DateTime $fechaNacimiento
     * @return DatosOne
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fecha_nacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get fecha_nacimiento
     *
     * @return \DateTime 
     */
    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }

    /**
     * Set dependientes
     *
     * @param integer $dependientes
     * @return DatosPersonales
     */
    public function setDependientes($dependientes)
    {
        $this->dependientes = $dependientes;

        return $this;
    }

    /**
     * Get dependientes
     *
     * @return integer 
     */
    public function getDependientes()
    {
        return $this->dependientes;
    }
}
