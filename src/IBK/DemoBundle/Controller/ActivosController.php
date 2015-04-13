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
use IBK\DemoBundle\Entity\DatosOtros;
use IBK\DemoBundle\Entity\DatosInversiones;

use IBK\DemoBundle\Controller\LoadController;

/**
 * @Route("/demo/profile")
 */
class ActivosController extends Controller
{
    /**
    * @Route("/cuentas", name="_activos_cuentas")
    * @Template()
    */
    public function cuentasAction(Request $request){
        //Accedemos al Flag
        if(!$request->getSession()->get('flag'))
        {$request->getSession()->set('flag',-1);}

        $flag = $request->getSession()->get('flag');
        $request->getSession()->set('flag',-1);


        //Cargar Activos Inversiones
        $id = $this->getUser() -> getId();
        $dCuentas = $this->getDoctrine()->getRepository('IBKDemoBundle:DatosCuentas')->findByRut($id);

        return array(
            'datosC'=> $dCuentas, 
            'flag'=>$flag
        );
    }

    /**
    * @Route("/vehiculos", name="_activos_vehiculos")
    * @Template()
    */
    public function vehiculosAction(Request $request){
        //Accedemos al Flag
        if(!$request->getSession()->get('flag'))
        {$request->getSession()->set('flag',-1);}

        $flag = $request->getSession()->get('flag');
        $request->getSession()->set('flag',-1);


        //Cargar Activos Inversiones
        $id = $this->getUser() -> getId();
        $dVehiculos = $this->getDoctrine()->getRepository('IBKDemoBundle:DatosVehiculos')->findByRut($id);

        return array(
            'datosV'=> $dVehiculos, 
            'flag'=>$flag
        );
    }

    /**
    * @Route("/propiedades", name="_activos_propiedades")
    * @Template()
    */
    public function propiedadesAction(Request $request){
        //Accedemos al Flag
        if(!$request->getSession()->get('flag'))
        {$request->getSession()->set('flag',-1);}

        $flag = $request->getSession()->get('flag');
        $request->getSession()->set('flag',-1);


        //Cargar Listas Desplegables
        $load = new LoadController();
        $tipo = $load->propiedadAction();
        $region = $load->regionAction();

        //Cargar Activos Inversiones
        $id = $this->getUser() -> getId();
        $dPropiedades = $this->getDoctrine()->getRepository('IBKDemoBundle:DatosPropiedades')->findByRut($id);

        return array(
            'datosP'=> $dPropiedades, 
            'tipo'=> $tipo, 
            'region'=> $region, 
            'flag'=>$flag
        );
    }

    /**
    * @Route("/inversiones", name="_activos_inversiones")
    * @Template()
    */
    public function inversionesAction(Request $request){
        //Accedemos al Flag
        if(!$request->getSession()->get('flag'))
        {$request->getSession()->set('flag',-1);}

        $flag = $request->getSession()->get('flag');
        $request->getSession()->set('flag',-1);


        //Cargar Listas Desplegables
        $load = new LoadController();
        $tipo = $load->inversionAction();
 

        //Cargar Activos Inversiones
        $id = $this->getUser() -> getId();
        $dInversiones = $this->getDoctrine()
        ->getRepository('IBKDemoBundle:DatosInversiones')->findByRut($id);


        return array(
            'datosI'=> $dInversiones, 
            'tipo'=> $tipo, 
            'flag'=>$flag
        );
    }

    /**
    * @Route("/otros", name="_activos_otros")
    * @Template()
    */
    public function otrosAction(Request $request){

        if(!$request->getSession()->get('flag'))
        {$request->getSession()->set('flag',-1);}

        $flag = $request->getSession()->get('flag');
        $request->getSession()->set('flag',-1);


        //Cargar Datos Personales Usuario
        $id = $this->getUser() -> getId();
        $dOtros = $this->getDoctrine()
        ->getRepository('IBKDemoBundle:DatosOtros')->findByRut($id);
        
        return array(
            'datosO'=> $dOtros, 
            'flag'=>$flag
        );
    }
}