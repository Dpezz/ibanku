<?php

namespace IBK\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * DatosOtros
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class DatosOtros
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
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;


    /**
     * @var integer
     *
     * @ORM\Column(name="valor", type="integer")
     */
    private $valor;


    /**
     * @var boolean
     *
     * @ORM\Column(name="en_prenda", type="boolean")
     */
    private $en_prenda;


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
     * @return DatosOtros
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return DatosOtros
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
     * Set valor
     *
     * @param integer $valor
     * @return DatosOtros
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return integer 
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set en_prenda
     *
     * @param boolean $enPrenda
     * @return DatosOtros
     */
    public function setEnPrenda($enPrenda)
    {
        $this->en_prenda = $enPrenda;

        return $this;
    }

    /**
     * Get en_prenda
     *
     * @return boolean 
     */
    public function getEnPrenda()
    {
        return $this->en_prenda;
    }

    /**
     * Set a_favor
     *
     * @param string $aFavor
     * @return DatosOtros
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
