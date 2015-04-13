<?php

namespace IBK\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * DatosLocalizacion
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class DatosLocalizacion
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
     * @ORM\Column(name="calidad_domicilio", type="string", length=255, nullable=true)
     */
    private $calidad_domicilio;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="celular", type="string", length=50, nullable=true)
     */
    private $celular;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=50, nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="redes", type="string", length=500,nullable=true)
     */
    private $redes;


    /**
     * Set id
     *
     * @param string $id
     * @return DatosTwo
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
     * Set domicilio
     *
     * @param string $domicilio
     * @return DatosTwo
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
     * @return DatosTwo
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
     * @return DatosTwo
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
     * Set calidad_domicilio
     *
     * @param string $calidadDomicilio
     * @return DatosTwo
     */
    public function setCalidadDomicilio($calidadDomicilio)
    {
        $this->calidad_domicilio = $calidadDomicilio;

        return $this;
    }

    /**
     * Get calidad_domicilio
     *
     * @return string 
     */
    public function getCalidadDomicilio()
    {
        return $this->calidad_domicilio;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return DatosTwo
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

    /**
     * Set celular
     *
     * @param string $celular
     * @return DatosTwo
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
     * Set telefono
     *
     * @param string $telefono
     * @return DatosTwo
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

    /**
     * Set redes
     *
     * @param string $redes
     * @return DatosLocalizacion
     */
    public function setRedes($redes)
    {
        $this->redes = $redes;

        return $this;
    }

    /**
     * Get redes
     *
     * @return string 
     */
    public function getRedes()
    {
        return $this->redes;
    }
}
