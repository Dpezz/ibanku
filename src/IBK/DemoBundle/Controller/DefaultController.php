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
use IBK\DemoBundle\Entity\DatosAcademicos;
use IBK\DemoBundle\Entity\DatosRedes;
use IBK\DemoBundle\Controller\LoadController;


/**
 * @Route("/demo")
 */
class DefaultController extends Controller
{
    /**
    * @Route("/", name="_demo_index")
    * @Template()
    */
    public function indexAction(Request $request)
    {
    	if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $request->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
        }

        return array(
            'last_username' => $request->getSession()->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        );
    }

    /**
     * @Route("/profile/login_check", name="_demo_security_check")
     */
    public function securityCheckAction()
    {
        // The security layer will intercept this request
    }

    /**
     * @Route("/profile/logout", name="_demo_logout")
     */
    public function logoutAction()
    {
        // The security layer will intercept this request
    }

    /**
    * @Route("/signup", name="_demo_signup")
    * @Template()
    */
    public function signupAction(Request $request)
    {

        //Cargar Listas Desplegables
        $load = new LoadController();
        $educacion = $load->educacionAction();
        $region = $load->regionAction();


        if ($request->isMethod('POST'))
        {
            $user = new User();
            $user->setId($request->get('_rut'));

            $name = $request->get('_nombre');
            $plastname = $request->get('_apellido_p');

            $user->setUsername($name[0].$plastname);
            $user->setPassword($request->get('_password'));
            
            $user->setCreateAt(new \DateTime('now'));
            $user->setUpdateAt(new \DateTime('now'));

            $user->setIsActive(false);
            $user->setRole("usuario");

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
           

            //insertar otros datos a Datos Personales One
            $dPersonales = new DatosPersonales();
            $dPersonales->setId($request->get('_rut'));
            $dPersonales->setNumeroSerie($request->get('_numero_serie'));
            $dPersonales->setNombre($request->get('_nombre'));
            $dPersonales->setApellidoP($request->get('_apellido_p'));
            $dPersonales->setApellidoM($request->get('_apellido_m'));
            $dPersonales->setNacionalidad($request->get('_nacionalidad'));

            //Agregar la fecha
            $birthday = str_replace('/', '-', $request->get('_birthday'));
            $birthday = new \DateTime($birthday);
            $dPersonales->setFechaNacimiento($birthday);

            $em = $this->getDoctrine()->getManager();
            $em->persist($dPersonales);

            //insertar otros datos a Datos Personales Two
            $dLocalizacion = new DatosLocalizacion();
            $dLocalizacion->setId($request->get('_rut'));
            $dLocalizacion->setRegion($request->get('_region'));
            $dLocalizacion->setComuna($request->get('_comuna'));
            $dLocalizacion->setEmail($request->get('_email'));
            $dLocalizacion->setCelular($request->get('_celular'));
            if(!empty($request->get('_telefono')))
                $dLocalizacion->setTelefono($request->get('_telefono'));

            $redes = "facebook[".$request->get('_facebook')."]twitter[".$request->get('_twitter')."]";
            $dLocalizacion->setRedes($redes);

            $em = $this->getDoctrine()->getManager();
            $em->persist($dLocalizacion);

            //insertar otros datos a Datos Academicos
            $dAcademicos = new DatosAcademicos();
            $dAcademicos->setId($request->get('_rut'));
            $dAcademicos->setEducacion($request->get('_educacion'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($dAcademicos);


            $em->flush();
        }
        return array('educacion' => $educacion,'region' => $region);
    }

}
