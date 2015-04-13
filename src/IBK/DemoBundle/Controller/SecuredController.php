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

/**
 * @Route("/demo")
 */
class SecuredController extends Controller
{
    /**
    * @Route("/profile/account", name="_profile_secured_account")
    * @Template()
    */
    public function accountAction(Request $request){
        //Asignar el FLAG
        if(!$request->getSession()->get('flag'))
        {$request->getSession()->set('flag',-1);}

        $flag = $request->getSession()->get('flag');
        $request->getSession()->set('flag',-1);

        //Cargar Datos Personales Usuario
        $id = $this->getUser() -> getId();
        $personal = $this->getDoctrine()->getRepository('IBKDemoBundle:DatosPersonales')->find($id);
 
        //Cargar Datos Localizacion Usuario
        $localizacion = $this->getDoctrine()->getRepository('IBKDemoBundle:DatosLocalizacion')->find($id);

        return array(
            'dataP' => $personal,
            'dataL' => $localizacion,
            'flag' => $flag
        );
    }

    /**
     * @Route("/profile/password", name="_profile_secured_password")
     * @Template()
     */
    public function passwordAction(Request $request){
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
     * @Route("/resend", name="_secured_resend")
     * @Route("/profile/resend", name="_profile_secured_resend")
     * @Template()
     */
    public function resendAction(Request $request){
        
        if ($request->isMethod('POST')){
            try{
                $id = $this->getUser() -> getId();
                //Ingreso Datos Localizacion
                $em = $this->getDoctrine()->getManager();
                if($dLocalizacion = $em->getRepository('IBKDemoBundle:DatosLocalizacion')->find($id)){
                    if($request->get("_email") == $dLocalizacion->getEmail()){
                        //Enviar Email
                        $request->getSession()->set('flag',1);
                    }else{
                        $request->getSession()->set('flag',2);
                    } 
                }else{
                    $request->getSession()->set('flag',0);
                }
            }catch(Exception $e){
                $request->getSession()->set('flag',0);
            }
        }

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
     * @Route("/restore/{codigo}", name="_secured_restore")
     * @Template()
     */
    public function restoreAction($codigo, Request $request){
    	return array();
    }

}