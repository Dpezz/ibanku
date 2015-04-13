<?php

namespace IBK\DemoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/demo/profile")
 */
class ProfileController extends Controller
{
	/**
    * @Route("/imagen", name="_profile_imagen")
    * @Template()
    */
    public function imagenAction(Request $request){
		//Asignar el FLAG
        if(!$request->getSession()->get('flag'))
        {$request->getSession()->set('flag',-1);}

        $flag = $request->getSession()->get('flag');
        $request->getSession()->set('flag',-1);

        return array(
            'flag' => $flag
        );
    }

    /**
    * @Route("/documentos", name="_profile_documentos")
    * @Template()
    */
    public function documentosAction(Request $request){
        //Asignar el FLAG
        if(!$request->getSession()->get('flag'))
        {$request->getSession()->set('flag',-1);}

        $flag = $request->getSession()->get('flag');
        $request->getSession()->set('flag',-1);

        $documentos = array(
            array('id' => 1,'title'=>'Papelucho','descripcion'=> 'Cuento para niños','size'=> '50 mb', 'type'=> '.pdf', 'uploadBy'=> '08/01/2015' ),
            array('id' => 2,'title'=>'Principito','descripcion'=> 'Cuento para niños','size'=> '100 mb', 'type'=> '.pdf', 'uploadBy'=> '05/01/2013' ),
            );

        return array(
            'datosD' => $documentos,
            'flag' => $flag
        );
    }

    /**
    * @Route("/permisos", name="_profile_permisos")
    * @Template()
    */
    public function permisosAction(Request $request){
        //Asignar el FLAG
        if(!$request->getSession()->get('flag'))
        {$request->getSession()->set('flag',-1);}

        $flag = $request->getSession()->get('flag');
        $request->getSession()->set('flag',-1);

        $permisos = array(
            array('id' => 1,'banco'=>'Santander','sucursal'=> 'La Serena','name'=> 'Luis Miguel','view'=> '08/01/2015','permiso'=>1 ),
            array('id' => 2,'banco'=>'Estado','sucursal'=> 'Ovalle','name'=> 'Alfredo Rojas','view'=> '05/01/2013','permiso'=>0 ),
            );

        $permiso = 'All';

        return array(
            'datosP' => $permisos,
            'permiso' => $permiso,
            'flag' => $flag
        );
    }
}