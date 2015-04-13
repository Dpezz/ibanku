<?php

namespace IBK\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * DatosPropiedades
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class DatosPropiedades
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
     * @ORM\Column(name="rut", type="string", length=20)
     */
    private $rut;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=255)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=255)
     */
    private $region;

    /**
     * @var string
     *
     * @ORM\Column(name="comuna", type="string", length=255)
     */
    private $comuna;

    /**
     * @var string
     *
     * @ORM\Column(name="rol", type="string", length=255)
     */
    private $rol;

    /**
     * @var string
     *
     * @ORM\Column(name="avaluo_fiscal", type="string", length=255)
     */
    private $avaluo_fiscal;

    /**
     * @var string
     *
     * @ORM\Column(name="avaluo_comercial", type="string", length=255)
     */
    private $avaluo_comercial;


    /**
     * @var boolean
     *
     * @ORM\Column(name="hipotecada", type="boolean")
     */
    private $hipotecada;


    /**
     * @var string
     *
     * @ORM\Column(name="a_favor", type="string", length=255, nullable=true)
     */
    private $a_favor;



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
     * Set rut
     *
     * @param string $rut
     * @return DatosPropiedades
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
     * Set tipo
     *
     * @param string $tipo
     * @return DatosPropiedades
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return DatosPropiedades
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
     * Set region
     *
     * @param string $region
     * @return DatosPropiedades
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
     * @return DatosPropiedades
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
     * Set rol
     *
     * @param string $rol
     * @return DatosPropiedades
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get rol
     *
     * @return string 
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set avaluo_fiscal
     *
     * @param string $avaluoFiscal
     * @return DatosPropiedades
     */
    public function setAvaluoFiscal($avaluoFiscal)
    {
        $this->avaluo_fiscal = $avaluoFiscal;

        return $this;
    }

    /**
     * Get avaluo_fiscal
     *
     * @return string 
     */
    public function getAvaluoFiscal()
    {
        return $this->avaluo_fiscal;
    }

    /**
     * Set avaluo_comercial
     *
     * @param string $avaluoComercial
     * @return DatosPropiedades
     */
    public function setAvaluoComercial($avaluoComercial)
    {
        $this->avaluo_comercial = $avaluoComercial;

        return $this;
    }

    /**
     * Get avaluo_comercial
     *
     * @return string 
     */
    public function getAvaluoComercial()
    {
        return $this->avaluo_comercial;
    }

    /**
     * Set hipotecada
     *
     * @param boolean $hipotecada
     * @return DatosPropiedades
     */
    public function setHipotecada($hipotecada)
    {
        $this->hipotecada = $hipotecada;

        return $this;
    }

    /**
     * Get hipotecada
     *
     * @return boolean 
     */
    public function getHipotecada()
    {
        return $this->hipotecada;
    }

    /**
     * Set a_favor
     *
     * @param string $aFavor
     * @return DatosPropiedades
     */
    public function setAFavor($aFavor)
    {
        $this->a_favor = $aFavor;

        return $this;
    }

    /**
     * Get a_favor
     *
     * @return string 
     */
    public function getAFavor()
    {
        return $this->a_favor;
    }
}
