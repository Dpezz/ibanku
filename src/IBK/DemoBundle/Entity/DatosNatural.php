<?php

namespace IBK\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * DatosNatural
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class DatosNatural
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
     * @var date
     *
     * @ORM\Column(name="fecha_sii", type="date", nullable=true)
     */
    private $fecha_sii;

    /**
     * @var integer
     *
     * @ORM\Column(name="antiguedad", type="integer", nullable=true)
     */
    private $antiguedad;

    /**
     * @var integer
     *
     * @ORM\Column(name="ventas", type="integer", nullable=true)
     */
    private $ventas;


    /**
     * Set id
     *
     * @param string $id
     * @return DatosNatural
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
     * Set giro
     *
     * @param string $giro
     * @return DatosNatural
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
     * @return DatosNatural
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
     * @return DatosNatural
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
     * @return DatosNatural
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
     * Set fecha_sii
     *
     * @param \DateTime $fechaSii
     * @return DatosNatural
     */
    public function setFechaSii($fechaSii)
    {
        $this->fecha_sii = $fechaSii;

        return $this;
    }

    /**
     * Get fecha_sii
     *
     * @return \DateTime 
     */
    public function getFechaSii()
    {
        return $this->fecha_sii;
    }

    /**
     * Set antiguedad
     *
     * @param integer $antiguedad
     * @return DatosNatural
     */
    public function setAntiguedad($antiguedad)
    {
        $this->antiguedad = $antiguedad;

        return $this;
    }

    /**
     * Get antiguedad
     *
     * @return integer 
     */
    public function getAntiguedad()
    {
        return $this->antiguedad;
    }

    /**
     * Set ventas
     *
     * @param integer $ventas
     * @return DatosNatural
     */
    public function setVentas($ventas)
    {
        $this->ventas = $ventas;

        return $this;
    }

    /**
     * Get ventas
     *
     * @return integer 
     */
    public function getVentas()
    {
        return $this->ventas;
    }
}
