<?php

namespace IBK\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * DatosCuentas
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class DatosCuentas
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
     * @ORM\Column(name="banco", type="string", length=255)
     */
    private $banco;

    /**
     * @var string
     *
     * @ORM\Column(name="sucursal", type="string", length=255)
     */
    private $sucursal;

    /**
     * @var string
     *
     * @ORM\Column(name="cuenta", type="string", length=255)
     */
    private $cuenta;

    /**
     * @var string
     *
     * @ORM\Column(name="ejecutivo", type="string", length=255)
     */
    private $ejecutivo;


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
     * @return DatosCuentas
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
     * Set banco
     *
     * @param string $banco
     * @return DatosCuentas
     */
    public function setBanco($banco)
    {
        $this->banco = $banco;

        return $this;
    }

    /**
     * Get banco
     *
     * @return string 
     */
    public function getBanco()
    {
        return $this->banco;
    }

    /**
     * Set sucursal
     *
     * @param string $sucursal
     * @return DatosCuentas
     */
    public function setSucursal($sucursal)
    {
        $this->sucursal = $sucursal;

        return $this;
    }

    /**
     * Get sucursal
     *
     * @return string 
     */
    public function getSucursal()
    {
        return $this->sucursal;
    }

    /**
     * Set cuenta
     *
     * @param string $cuenta
     * @return DatosCuentas
     */
    public function setCuenta($cuenta)
    {
        $this->cuenta = $cuenta;

        return $this;
    }

    /**
     * Get cuenta
     *
     * @return string 
     */
    public function getCuenta()
    {
        return $this->cuenta;
    }

    /**
     * Set ejecutivo
     *
     * @param string $ejecutivo
     * @return DatosCuentas
     */
    public function setEjecutivo($ejecutivo)
    {
        $this->ejecutivo = $ejecutivo;

        return $this;
    }

    /**
     * Get ejecutivo
     *
     * @return string 
     */
    public function getEjecutivo()
    {
        return $this->ejecutivo;
    }
}
