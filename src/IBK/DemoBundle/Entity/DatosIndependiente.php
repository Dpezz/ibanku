<?php

namespace IBK\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * DatosIndependiente
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class DatosIndependiente
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
     * @ORM\Column(name="servicio", type="string", length=255, nullable=true)
     */
    private $servicio;

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
     * @var integer
     *
     * @ORM\Column(name="antiguedad", type="integer", nullable=true)
     */
    private $antiguedad;

    /**
     * @var integer
     *
     * @ORM\Column(name="renta", type="integer", nullable=true)
     */
    private $renta;


    /**
     * Set id
     *
     * @param string $id
     * @return DatosIndependiente
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
     * Set servicio
     *
     * @param string $servicio
     * @return DatosIndependiente
     */
    public function setServicio($servicio)
    {
        $this->servicio = $servicio;

        return $this;
    }

    /**
     * Get servicio
     *
     * @return string 
     */
    public function getServicio()
    {
        return $this->servicio;
    }

    /**
     * Set domicilio
     *
     * @param string $domicilio
     * @return DatosIndependiente
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
     * @return DatosIndependiente
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
     * @return DatosIndependiente
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
     * Set antiguedad
     *
     * @param integer $antiguedad
     * @return DatosIndependiente
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
     * Set renta
     *
     * @param integer $renta
     * @return DatosIndependiente
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
}
