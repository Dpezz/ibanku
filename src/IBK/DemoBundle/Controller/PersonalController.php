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
use IBK\DemoBundle\Entity\DatosPersonales;
use IBK\DemoBundle\Entity\DatosLocalizacion;
use IBK\DemoBundle\Entity\DatosConyugue;
use IBK\DemoBundle\Entity\DatosDependiente;
use IBK\DemoBundle\Entity\DatosIndependiente;
use IBK\DemoBundle\Entity\DatosNatural;
use IBK\DemoBundle\Controller\LoadController;


/**
 * @Route("/demo/profile")
 */
class PersonalController extends Controller
{
    /**
    * @Route("/personal", name="_personal_personal")
    * @Template()
    */
    public function personalAction(Request $request){
      
        //Asignar el FLAG
        if(!$request->getSession()->get('flag'))
        {$request->getSession()->set('flag',-1);}

        $flag = $request->getSession()->get('flag');
        $request->getSession()->set('flag',-1);


        //Cargar Listas Desplegables
        $load = new LoadController();
        $sexo = $load->sexoAction();
        $civil = $load->civilAction();
        $domicilio = $load->domicilioAction();
        $region = $load->regionAction();

        //Cargar Datos Personales Usuario
        $id = $this->getUser() -> getId();
        $personal = $this->getDoctrine()
        ->getRepository('IBKDemoBundle:DatosPersonales')
        ->find($id);
 
        if (!$personal) {
            throw $this->createNotFoundException('No Data found for id '.$id); 
        }

        //Cargar Datos Localizacion Usuario
        $localizacion = $this->getDoctrine()
        ->getRepository('IBKDemoBundle:DatosLocalizacion')
        ->find($id);
 
        if (!$localizacion) {
            throw $this->createNotFoundException('No Data found for id '.$id); 
        }   

        return array(
            'sexo' => $sexo,
            'civil' => $civil,
            'domicilio' => $domicilio,
            'region' => $region,
            'dataP' => $personal,
            'dataL' => $localizacion,
            'flag' => $flag
        );
    }

    /**
    * @Route("/conyugue", name="_personal_conyugue")
    * @Template()
    */
    public function conyugueAction(Request $request){
        //Asignar el FLAG
        if(!$request->getSession()->get('flag'))
        {$request->getSession()->set('flag',-1);}

        $flag = $request->getSession()->get('flag');
        $request->getSession()->set('flag',-1);

        //Cargar Listas Desplegables
        $load = new LoadController();
        $sexo = $load->sexoAction();
        $civil = $load->civilAction();
        $domicilio = $load->domicilioAction();
        $educacion = $load->educacionAction();
        $economia = $load->economiaAction();
        $region = $load->regionAction();

        //Cargar Datos Personales Usuario
        $id = $this->getUser() -> getId();
        $conyugue = $this->getDoctrine()->getRepository('IBKDemoBundle:DatosConyugue')->find($id);

 
        return array(
            'sexo' => $sexo,
            'educacion' => $educacion,
            'economia'=>$economia,
            'dataC' => $conyugue,
            'flag' => $flag
        );
    }

    /**
    * @Route("/academico", name="_personal_academico")
    * @Template()
    */
    public function academicoAction(Request $request){
        //Asignar el FLAG
        if(!$request->getSession()->get('flag'))
        {$request->getSession()->set('flag',-1);}

        $flag = $request->getSession()->get('flag');
        $request->getSession()->set('flag',-1);


        //Cargar Listas Desplegables
        $load = new LoadController();
        $educacion = $load->educacionAction();
        $economia = $load->economiaAction();
        $contrato = $load->contratoAction();
        $remuneracion = $load->remuneracionAction();
        $region = $load->regionAction();

        //Cargar Datos Personales Usuario
        $id = $this->getUser() -> getId();
        $personal = $this->getDoctrine()
        ->getRepository('IBKDemoBundle:DatosPersonales')
        ->find($id);
 
        if (!$personal) {
            throw $this->createNotFoundException('No Data found for id '.$id); 
        }

        //Cargar Datos Personales Usuario
        $id = $this->getUser() -> getId();
        $actividad = $this->getDoctrine()
        ->getRepository('IBKDemoBundle:DatosAcademicos')
        ->find($id);
 
        if (!$actividad) {
            throw $this->createNotFoundException('No Data found for id '.$id); 
        }

        //Cargar Datos Dependiente Usuario
        $id = $this->getUser() -> getId();
        $dependiente = $this->getDoctrine()
        ->getRepository('IBKDemoBundle:DatosDependiente')
        ->find($id);

        //Cargar Datos Independiente Usuario
        $id = $this->getUser() -> getId();
        $independiente = $this->getDoctrine()
        ->getRepository('IBKDemoBundle:DatosIndependiente')
        ->find($id);

        //Cargar Datos Natural Usuario
        $id = $this->getUser() -> getId();
        $natural = $this->getDoctrine()
        ->getRepository('IBKDemoBundle:DatosNatural')
        ->find($id);


        return array(
            'educacion' =>$educacion,
            'economia' => $economia,
            'contrato' => $contrato,
            'remuneracion' => $remuneracion,
            'region' => $region,
            'dataA'=>$actividad,
            'dataP' => $personal,
            'dataD' => $dependiente,
            'dataI' => $independiente,
            'dataN' => $natural,
            'flag' => $flag
        );
    }


}