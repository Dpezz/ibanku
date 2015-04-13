<?php

namespace IBK\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * DatosDependiente
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class DatosDependiente
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
     * @ORM\Column(name="empresa", type="string", length=255, nullable=true)
     */
    private $empresa;

    /**
     * @var string
     *
     * @ORM\Column(name="rut", type="string", length=20, nullable=true)
     */
    private $rut;

    /**
     * @var string
     *
     * @ORM\Column(name="giro", type="string", length=255, nullable=true)
     */
    private $giro;

    /**
     * @var string
     *
     * @ORM\Column(name="domicilio", type="string", length=255, nullable=true)
     */
    private $domicilio;

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=255, nullable=true)
     */
    private $region;    
    
    /**
     * @var string
     *
     * @ORM\Column(name="comuna", type="string", length=255, nullable=true)
     */
    private $comuna;

    /**
     * @var string
     *
     * @ORM\Column(name="contrato", type="string", length=255, nullable=true)
     */
    private $contrato;

    /**
     * @var string
     *
     * @ORM\Column(name="cargo", type="string", length=255, nullable=true)
     */
    private $cargo;
       
    /**
     * @var date
     *
     * @ORM\Column(name="fecha_ingreso", type="date", nullable=true)
     */
    private $fecha_ingreso;

    /**
     * @var string
     *
     * @ORM\Column(name="remuneracion", type="string", length=255, nullable=true)
     */
    private $remuneracion;

    /**
     * @var integer
     *
     * @ORM\Column(name="renta", type="integer", nullable=true)
     */
    private $renta; 

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=255, nullable=true)
     */
    private $telefono;

    /**
     * Set id
     *
     * @param string $id
     * @return DatosTrabajador
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
     * Set empresa
     *
     * @param string $empresa
     * @return DatosTrabajador
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return string 
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set rut
     *
     * @param string $rut
     * @return DatosTrabajador
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
     * Set giro
     *
     * @param string $giro
     * @return DatosTrabajador
     */
    public function setGiro($giro)
    {
        $this->giro = $giro;

        return $this;
    }

    /**
     * Get giro
     *
     * @return string 
     */
    public function getGiro()
    {
        return $this->giro;
    }

    /**
     * Set domicilio
     *
     * @param string $domicilio
     * @return DatosTrabajador
     */
    public function setDomicilio($domicilio)
    {
        $this->domicilio = $domicilio;

        return $this;
    }

    /**
     * Get domicilio
     *
     * @return string 
     */
    public function getDomicilio()
    {
        return $this->domicilio;
    }

    /**
     * Set region
     *
     * @param string $region
     * @return DatosTrabajador
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string 
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set comuna
     *
     * @param string $comuna
     * @return DatosTrabajador
     */
    public function setComuna($comuna)
    {
        $this->comuna = $comuna;

        return $this;
    }

    /**
     * Get comuna
     *
     * @return string 
     */
    public function getComuna()
    {
        return $this->comuna;
    }

    /**
     * Set contrato
     *
     * @param string $contrato
     * @return DatosTrabajador
     */
    public function setContrato($contrato)
    {
        $this->contrato = $contrato;

        return $this;
    }

    /**
     * Get contrato
     *
     * @return string 
     */
    public function getContrato()
    {
        return $this->contrato;
    }

    /**
     * Set cargo
     *
     * @param string $cargo
     * @return DatosTrabajador
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get cargo
     *
     * @return string 
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set fecha_ingreso
     *
     * @param \DateTime $fechaIngreso
     * @return DatosTrabajador
     */
    public function setFechaIngreso($fechaIngreso)
    {
        $this->fecha_ingreso = $fechaIngreso;

        return $this;
    }

    /**
     * Get fecha_ingreso
     *
     * @return \DateTime 
     */
    public function getFechaIngreso()
    {
        return $this->fecha_ingreso;
    }

    /**
     * Set remuneracion
     *
     * @param string $remuneracion
     * @return DatosTrabajador
     */
    public function setRemuneracion($remuneracion)
    {
        $this->remuneracion = $remuneracion;

        return $this;
    }

    /**
     * Get remuneracion
     *
     * @return string 
     */
    public function getRemuneracion()
    {
        return $this->remuneracion;
    }

    /**
     * Set renta
     *
     * @param integer $renta
     * @return DatosTrabajador
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
     * Set telefono
     *
     * @param string $telefono
     * @return DatosTrabajador
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }
}
