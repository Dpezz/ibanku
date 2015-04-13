<?php

namespace IBK\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * DatosConyugue
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class DatosConyugue
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
     * @ORM\Column(name="rut", type="string", length=20, nullable=true)
     */
    private $rut;

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
     * @ORM\Column(name="economia", type="string", length=255, nullable=true)
     */
    private $economia;

    /**
     * @var integer
     *
     * @ORM\Column(name="renta", type="integer", nullable=true)
     */
    private $renta;

    /**
     * @var string
     *
     * @ORM\Column(name="celular", type="string", length=255, nullable=true)
     */
    private $celular;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;


    /**
     * Set id
     *
     * @param string $id
     * @return DatosConyugue
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
     * Set rut
     *
     * @param string $rut
     * @return DatosConyugue
     */
    public function setRut($rut)
    {
        $this->rut = $rut;

        return $this;
    }

    /**
     * Get rut
     *
     * @return string 
     */
    public function getRut()
    {
        return $this->rut;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return DatosConyugue
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
     * @return DatosConyugue
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
     * @return DatosConyugue
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
     * @return DatosConyugue
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
     * Set fecha_nacimiento
     *
     * @param \DateTime $fechaNacimiento
     * @return DatosConyugue
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
     * Set nacionalidad
     *
     * @param string $nacionalidad
     * @return DatosConyugue
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
     * Set educacion
     *
     * @param string $educacion
     * @return DatosConyugue
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
     * @return DatosConyugue
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
     * Set economia
     *
     * @param string $economia
     * @return DatosConyugue
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

    /**
     * Set renta
     *
     * @param integer $renta
     * @return DatosConyugue
     */
    public function setRenta($renta)
    {
        $this->renta = $renta;

        return $this;
    }

    /**
     * Get renta
     *
     * @return integer 
     */
    public function getRenta()
    {
        return $this->renta;
    }

    /**
     * Set celular
     *
     * @param string $celular
     * @return DatosConyugue
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get celular
     *
     * @return string 
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return DatosConyugue
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
}
