<?php

namespace IBK\DemoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use IBK\DemoBundle\Entity\User;
use IBK\DemoBundle\Repository\Datos;

/**
 * @Route("/demo")
 */
class LoadController extends Controller
{

	/**
     * @Route("/load/region", name="_load_region")
     */
    public function regionAction()
    {
        $datos = new Datos();
        return $datos->getRegiones();
    }

    /**
     * @Route("/load/comuna", name="_load_comuna")
     */
    public function comunaAction(Request $request)
    {
        $datos = new Datos();
        $region = $request->get('region');
        return new Response($datos->getComunas($region));
    }

    /**
     * @Route("/load/educacion", name="_load_educacion")
     */
    public function educacionAction()
    {
        $datos = new Datos();
        return $datos->getEducacion();
    }

    /**
     * @Route("/load/civil", name="_load_civil")
     */
    public function civilAction()
    {
        $datos = new Datos();
        return $datos->getCivil();
    }

    /**
     * @Route("/load/sexo", name="_load_sexo")
     */
    public function sexoAction()
    {
        $datos = new Datos();
        return $datos->getSexo();
    }

    /**
     * @Route("/load/domicilio", name="_load_domicilio")
     */
    public function domicilioAction()
    {
        $datos = new Datos();
        return $datos->getDomicilio();
    }

    /**
     * @Route("/load/economia", name="_load_economia")
     */
    public function economiaAction()
    {
        $datos = new Datos();
        return $datos->getEconomia();
    }

    /**
     * @Route("/load/conyugue", name="_load_econyugue")
     */
    public function econyugueAction()
    {
        $datos = new Datos();
        return $datos->getEconomiaConyugue();
    }

    /**
     * @Route("/load/remuneracion", name="_load_remuneracion")
     */
    public function remuneracionAction()
    {
        $datos = new Datos();
        return $datos->getRemuneracion();
    }

    /**
     * @Route("/load/contrato", name="_load_contrato")
     */
    public function contratoAction()
    {
        $datos = new Datos();
        return $datos->getContrato();
    }

    /**
     * @Route("/load/inversion", name="_load_inversion")
     */
    public function inversionAction()
    {
        $datos = new Datos();
        return $datos->getInversion();
    }

    /**
     * @Route("/load/propiedad", name="_load_propiedad")
     */
    public function propiedadAction()
    {
        $datos = new Datos();
        return $datos->getPropiedad();
    }

}