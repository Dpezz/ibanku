<?php

namespace IBK\DemoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use IBK\DemoBundle\Entity\User;
use IBK\DemoBundle\Entity\DatosOtros;
use IBK\DemoBundle\Entity\DatosInversiones;
use IBK\DemoBundle\Entity\DatosPropiedades;
use IBK\DemoBundle\Entity\DatosVehiculos;
use IBK\DemoBundle\Entity\DatosCuentas;


/**
 * @Route("/demo/profile/edit")
 */
class EditController extends Controller
{
//Edit Secured

    /**
    * @Route("/edit_account", name="_edit_account")
    */
    public function editAccountAction(Request $request){
        try{
            $id = $this->getUser() -> getId();

            //Ingreso Datos Personales
            $em = $this->getDoctrine()->getManager();
            if($dPersonal = $em->getRepository('IBKDemoBundle:DatosPersonales')->find($id)){        
                $dPersonal->setNombre($request->get("_nombre"));
                $dPersonal->setApellidoP($request->get("_apellido_p"));
                $dPersonal->setApellidoM($request->get("_apellido_m"));
                $em->flush();
            }

           //Ingreso Datos User
            if($dUser = $em->getRepository('IBKDemoBundle:User')->find($id)){
                $name = $request->get('_nombre');
                $plastname = $request->get('_apellido_p');
                $dUser->setUsername($name[0].$plastname);
                $em->flush();
            }

            $request->getSession()->set('flag',1);
        }catch(Exception $e){
            $request->getSession()->set('flag',0);
        }
       return $this->redirect($this->generateUrl('_profile_secured_account'));
    }

    /**
    * @Route("/edit_email", name="_edit_email")
    */
    public function editEmailAction(Request $request){
        try{
            $id = $this->getUser() -> getId();
            //Ingreso Datos Localizacion
            $em = $this->getDoctrine()->getManager();
            if($dLocalizacion = $em->getRepository('IBKDemoBundle:DatosLocalizacion')->find($id)){
                $dLocalizacion->setEmail($request->get("_email"));
                $em->flush();
            }
           $request->getSession()->set('flag',1);
        }catch(Exception $e){
            $request->getSession()->set('flag',0);
        }
        return $this->redirect($this->generateUrl('_profile_secured_account'));
    }

    /**
    * @Route("/edit_password", name="_edit_password")
    */
    public function editPasswordAction(Request $request){
        try {
            $id = $this->getUser() -> getId();
            $em = $this->getDoctrine()->getManager();
                
            if ($dUser = $em->getRepository('IBKDemoBundle:User')->find($id)) {

                $passwordActual = $request->get('_password');

                if(password_verify($passwordActual, $dUser->getPassword()))
                {
                    $dUser->setPassword($request->get('_passwordNew'));
                    $em->flush();

                    //Se envia correo Informando del cambio de Contraseña
                    //$this->sendMessage($dUser->getName(),$email);

                    $request->getSession()->set('flag',1);
                }else{
                   $request->getSession()->set('flag',2);
                }
            }else{
               $request->getSession()->set('flag',0);
            }
        } 
        catch (Exception $e) 
        {
            $request->getSession()->set('flag',0);
        }
       return $this->redirect($this->generateUrl('_profile_secured_password'));
    }

    /**
    * @Route("/edit_disabled", name="_edit_disabled")
    */
    public function editDisabledAction(Request $request){
        try{
            $id = $this->getUser() -> getId();
            $password = $request->get('_password');

            $em = $this->getDoctrine()->getManager();
            if($dUser = $em->getRepository('IBKDemoBundle:User')->find($id)){
                $passwordActual = $request->get('_password');

                if(password_verify($passwordActual, $dUser->getPassword())){
                    //Ingreso Datos User
                    if($dUser = $em->getRepository('IBKDemoBundle:User')->find($id)){
                        $dUser->setIsActive(0);
                        $em->flush();
                    }
                    $request->getSession()->set('flag',1);
                }else{
                    $request->getSession()->set('flag',2);
                }
            }
        }catch(Exception $e){
            $request->getSession()->set('flag',0);
        }
       return $this->redirect($this->generateUrl('_profile_secured_account'));
    }

    /**
    * @Route("/edit_rut", name="_edit_rut")
    */
    public function editRutAction(Request $request){
        try{
            $id = $this->getUser() -> getId();
            $idNew = $request->get("_rut");

            if($idNew != $id){
                
                $em = $this->getDoctrine()->getManager();
                
                //Update Rut User
                if($dLocalizacion = $em->getRepository('IBKDemoBundle:User')->find($id)){
                    $dLocalizacion->setId($idNew);
                    $em->flush();
                }

                //Update Rut Personales
                if ($dPersonal = $em->getRepository('IBKDemoBundle:DatosPersonales')->find($id)) {
                    $dPersonal->setId($idNew);
                    $em->flush();
                }

                //Update Rut Localizacion
                if($dLocalizacion = $em->getRepository('IBKDemoBundle:DatosLocalizacion')->find($id)){
                    $dLocalizacion->setId($idNew);
                    $em->flush();
                }
         
                //Update Rut Conyugue
                if($dConyugue = $em->getRepository('IBKDemoBundle:DatosConyugue')->find($id)){
                    $dConyugue->setId($idNew);
                    $em->flush();
                }

                //Update Rut Academicos
                if($dAcademico = $em->getRepository('IBKDemoBundle:DatosAcademicos')->find($id)){
                    $dAcademico->setId($idNew);
                    $em->flush();
                }

                //Update Rut Dependiente
                if($dDependiente = $em->getRepository('IBKDemoBundle:DatosDependiente')->find($id)){
                    $dDependiente->setId($idNew);
                    $em->flush();
                }

                //Update Rut Independiente
                if($dIndependiente = $em->getRepository('IBKDemoBundle:DatosIndependiente')->find($id)){
                    $dIndependiente->setId($idNew);
                    $em->flush();
                }

                //Update Rut Natural
                if($dNatural = $em->getRepository('IBKDemoBundle:DatosNatural')->find($id)){
                    $dNatural->setId($idNew);
                    $em->flush();
                }

                //Update Rut Cuentas
                if($dCuentas = $em->getRepository('IBKDemoBundle:DatosCuentas')->findByRut($id)){
                    foreach ($dCuentas as $key) {
                        $key->setRut($idNew);
                        $em->flush();
                    }
                }

                //Update Rut Vehiculos
                if($dVehiculos = $em->getRepository('IBKDemoBundle:DatosVehiculos')->findByRut($id)){
                    foreach ($dVehiculos as $key) {
                        $key->setRut($idNew);
                        $em->flush();
                    }
                }


                //Update Rut Propiedades
                if($dPropiedades = $em->getRepository('IBKDemoBundle:DatosPropiedades')->findByRut($id)){
                    foreach ($dPropiedades as $key) {
                        $key->setRut($idNew);
                        $em->flush();
                    }
                }

                //Update Rut Inversiones
                if($dInversiones = $em->getRepository('IBKDemoBundle:DatosInversiones')->findByRut($id)){
                    foreach ($dInversiones as $key) {
                        $key->setRut($idNew);
                        $em->flush();
                    }
                }

                //Update Rut Otros
                if($dOtros = $em->getRepository('IBKDemoBundle:DatosOtros')->findByRut($id)){
                    foreach ($dOtros as $key) {
                        $key->setRut($idNew);
                        $em->flush();
                    }
                }
            }

            $request->getSession()->set('flag',1);
        }catch(Exception $e){
            $request->getSession()->set('flag',0);
        }
       return $this->redirect($this->generateUrl('_profile_secured_account'));
    }

//Edit Imagen
    /**
    * @Route("/edit_imagen", name="_edit_imagen")
    */
    public function editImagenAction(Request $request){
        try{
            $id = $this->getUser() -> getId();
            $id_puntos = trim($id,'-');
            $id_temp = trim($id_puntos,'.');

            $imagen = $request->files->get('_file');

            if (($imagen instanceof UploadedFile) && ($imagen->getError() == '0')) {

                if (($imagen->getSize() < 200000000)) {
                    
                    $type = exif_imagetype($imagen);
                    $extension = image_type_to_extension($type);

                    $valid_filetypes = array('.jpg', '.jpeg','.png');
                    if (in_array($extension, $valid_filetypes)) {

                        //$result = move_uploaded_file($imagen, $url);
                        $this->saveImagen($imagen, $id_temp, $extension, $request);

                        //update BD USER
                        $em = $this->getDoctrine()->getManager();
                        if($dUser = $em->getRepository('IBKDemoBundle:User')->find($id)){
                            $dUser ->setUrl($id_temp.$extension);
                            $em->flush();

                            $request->getSession()->set('flag',1);
                        }else{
                            $url = 'img/'.$id_temp.$extension;
                            //delete Imagen
                            $this->deleteImagen($url);
                            //Error de file error (0)
                            $request->getSession()->set('flag',0);
                        }
                    } else {
                        //Error de type(2)
                        $request->getSession()->set('flag',2);
                    }
                } else {
                    //Error de size(3)
                    $request->getSession()->set('flag',3);
                }
            } else {
                //Error de file error (0)
                 $request->getSession()->set('flag',0);
            }

        }catch(Exception $e){
            $request->getSession()->set('flag',0);
        }
        return $this->redirect($this->generateUrl('_profile_imagen'));
    }

    private function saveImagen($imagen, $id, $extension, Request $request){
        try
        {
            $data = getimagesize($imagen);
            //get width and height de la foto-- tamaño normal
            $width = intval($data[0]);
            $height = intval($data[1]);
            
            //tamaño de Width and Height en la pagina Web
            $wWeb = intval($request->get('_wWeb'));
            $hWeb = intval($request->get('_hWeb'));

            //seleccion del area
            $w = intval($request->get('_w'));
            $h = intval($request->get('_h'));
            $x = intval($request->get('_x1'));
            $y = intval($request->get('_y1'));

            //obtener el valor scalada
            $valorPromedioW = $width/$wWeb;
            $valorPromedioH = $height/$hWeb;
            $origX = $valorPromedioW * $x;
            $origY = $valorPromedioH * $y;
            $origW = $valorPromedioW * $w;
            $origH = $valorPromedioH * $h;

            $name = $id.$extension;


            if($extension == ".png"){
                $origen = imagecreatefrompng($imagen);
                $imagen_crop = imagecrop($origen,array('x' => intval($origX), 'y' => intval($origY), 'width' => intval($origW), 'height' => intval($origH) ));

                imagepng($imagen_crop, "img/temp_".$name);
                imagedestroy($origen);
                imagedestroy($imagen_crop);

                $origen = imagecreatefrompng("img/temp_".$name);
                $imagen_escalada = imagescale($origen,250,250);
                imagepng($imagen_escalada, "img/".$name);
                imagedestroy($origen);
                imagedestroy($imagen_escalada);
                unLink("img/temp_".$name);
            }
            else if(($extension == ".jpg")||($extension == ".jpeg")){
                $origen = imagecreatefromjpeg($imagen);
                $imagen_crop = imagecrop($origen,array('x' => intval($origX), 'y' => intval($origY), 'width' => intval($origW), 'height' => intval($origH) ));

                imagejpeg($imagen_crop, "img/temp_".$name);
                imagedestroy($origen);
                imagedestroy($imagen_crop);

                $origen = imagecreatefromjpeg("img/temp_".$name);
                $imagen_escalada = imagescale($origen,250,250);
                imagejpeg($imagen_escalada, "img/".$name);
                imagedestroy($origen);
                imagedestroy($imagen_escalada);
                unLink("img/temp_".$name);
            }
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    private function deleteImagen($url){
        try{
            if (file_exists($url))
            {
                unlink($url);
            }
            return true;
        }catch(Exception $e){
            return false;
        }
    }

//New Datos Activos

    /**
    * @Route("/cuentas", name="_new_cuenta")
    */
    public function newCuentaAction(Request $request){
        try{
            $id = $this->getUser() -> getId();
            //insertar en Datos Activos Propiedad
            $dCuenta = new DatosCuentas();
           
            $dCuenta->setRut($id);
            $dCuenta->setBanco($request->get("_banco"));
            $dCuenta->setSucursal($request->get("_sucursal"));
            $dCuenta->setCuenta($request->get("_cuenta"));
            $dCuenta->setEjecutivo($request->get("_ejecutivo"));

            $em = $this->getDoctrine()->getManager();
            $em->persist($dCuenta);
            $em->flush();
            
            $request->getSession()->set('flag',1);
        }catch(Exception $e){
            $request->getSession()->set('flag',0);
        }
        return $this->redirect($this->generateUrl('_activos_cuentas'));
    }

    /**
    * @Route("/vehiculos", name="_new_vehiculo")
    */
    public function newVehiculoAction(Request $request){
        try{
            $id = $this->getUser() -> getId();
            //insertar en Datos Activos Propiedad
            $dVehiculo = new DatosVehiculos();
           
            $dVehiculo->setRut($id);
            $dVehiculo->setTipo($request->get("_tipo"));
            $dVehiculo->setAño($request->get("_año"));
            $dVehiculo->setMarca($request->get("_marca"));
            $dVehiculo->setModelo($request->get("_modelo"));
            $dVehiculo->setValor($request->get("_valor"));

            $em = $this->getDoctrine()->getManager();
            $em->persist($dVehiculo);
            $em->flush();
            
            $request->getSession()->set('flag',1);
        }catch(Exception $e){
            $request->getSession()->set('flag',0);
        }
        return $this->redirect($this->generateUrl('_activos_vehiculos'));
    }

    /**
    * @Route("/propiedades", name="_new_propiedad")
    */
    public function newPropiedadAction(Request $request){
        try{
            $id = $this->getUser() -> getId();
            //insertar en Datos Activos Propiedad
            $dPropiedad = new DatosPropiedades();
           
            $dPropiedad->setRut($id);
            $dPropiedad->setTipo($request->get("_tipo"));
            $dPropiedad->setDescripcion($request->get("_descripcion"));
            $dPropiedad->setRegion($request->get("_region"));
            $dPropiedad->setComuna($request->get("_comuna"));
            $dPropiedad->setRol($request->get("_rol"));
            $dPropiedad->setAvaluoFiscal($request->get("_fiscal"));
            $dPropiedad->setAvaluoComercial($request->get("_comercial"));
            $dPropiedad->setHipotecada($request->get("_hipotecada"));

            if(!empty($request->get("_a_favor"))){
                 $dPropiedad->setAFavor($request->get("_a_favor"));
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($dPropiedad);
            $em->flush();
            
            $request->getSession()->set('flag',1);
        }catch(Exception $e){
            $request->getSession()->set('flag',0);
        }
        return $this->redirect($this->generateUrl('_activos_propiedades'));
    }

    /**
    * @Route("/inversiones", name="_new_inversion")
    */
    public function newInversionAction(Request $request){
        try{
            $id = $this->getUser() -> getId();
            //insertar en Activos Inversiones
            $dInversiones = new DatosInversiones();
           
            $dInversiones->setRut($id);
            $dInversiones->setDescripcion($request->get("_descripcion"));
            $dInversiones->setValor($request->get("_valor"));
            $dInversiones->setTipo($request->get("_tipo"));

            $em = $this->getDoctrine()->getManager();
            $em->persist($dInversiones);
            $em->flush();
            
            $request->getSession()->set('flag',1);
        }catch(Exception $e){
            $request->getSession()->set('flag',0);
        }
        return $this->redirect($this->generateUrl('_activos_inversiones'));
    }

    /**
    * @Route("/otros", name="_new_otro")
    */
    public function newOtroAction(Request $request){
        try{
            $id = $this->getUser() -> getId();
            //insertar en Datos Activos Otros
            $dOtros = new DatosOtros();
           
            $dOtros->setRut($id);
            $dOtros->setDescripcion($request->get("_descripcion"));
            $dOtros->setValor($request->get("_valor"));
            $dOtros->setEnPrenda($request->get("_en_prenda_otro"));

            if(!empty($request->get("_a_favor"))){
                 $dOtros->setAFavor($request->get("_a_favor"));
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($dOtros);
            $em->flush();
            
            $request->getSession()->set('flag',1);
        }catch(Exception $e){
            $request->getSession()->set('flag',0);
        }
        return $this->redirect($this->generateUrl('_activos_otros'));
    }

//Delete Datos Activos
    /**
    * @Route("/delete_cuenta", name="_delete_cuenta")
    */
    public function deleteCuentaAction(Request $request){
        try{
            $id = $request->get("_id");
            //insertar en Datos Activos Propiedad

            $em = $this->getDoctrine()->getManager();
            $dCuenta = $em->getRepository('IBKDemoBundle:DatosCuentas')->find($id);
            $em->remove($dCuenta);
            $em->flush();
            
            $request->getSession()->set('flag',1);
        }catch(Exception $e){
            $request->getSession()->set('flag',0);
        }
        return $this->redirect($this->generateUrl('_activos_cuentas'));
    }

    /**
    * @Route("/delete_vehiculo", name="_delete_vehiculo")
    */
    public function deleteVehiculoAction(Request $request){
        try{
            $id = $request->get("_id");
            //insertar en Datos Activos Propiedad

            $em = $this->getDoctrine()->getManager();
            $dVehiculo = $em->getRepository('IBKDemoBundle:DatosVehiculos')->find($id);
            $em->remove($dVehiculo);
            $em->flush();
            
            $request->getSession()->set('flag',1);
        }catch(Exception $e){
            $request->getSession()->set('flag',0);
        }
        return $this->redirect($this->generateUrl('_activos_vehiculos'));
    }

    /**
    * @Route("/delete_propiedades", name="_delete_propiedad")
    */
    public function deletePropiedadAction(Request $request){
        try{
            $id = $request->get("_id");
            //insertar en Datos Activos Propiedad

            $em = $this->getDoctrine()->getManager();
            $dPropiedad = $em->getRepository('IBKDemoBundle:DatosPropiedades')->find($id);
            $em->remove($dPropiedad);
            $em->flush();
            
            $request->getSession()->set('flag',1);
        }catch(Exception $e){
            $request->getSession()->set('flag',0);
        }
        return $this->redirect($this->generateUrl('_activos_propiedades'));
    }

    /**
    * @Route("/delete_inversion", name="_delete_inversion")
    */
    public function deleteInversionAction(Request $request){
        try{
            $id = $request->get("_id");
            //insertar en Datos Activos Propiedad

            $em = $this->getDoctrine()->getManager();
            $dInversion = $em->getRepository('IBKDemoBundle:DatosInversiones')->find($id);
            $em->remove($dInversion);
            $em->flush();
            
            $request->getSession()->set('flag',1);
        }catch(Exception $e){
            $request->getSession()->set('flag',0);
        }
        return $this->redirect($this->generateUrl('_activos_inversiones'));
    }

    /**
    * @Route("/delete_otro", name="_delete_otro")
    */
    public function deleteOtrosAction(Request $request){
        try{
            $id = $request->get("_id");
            //insertar en Datos Activos Propiedad

            $em = $this->getDoctrine()->getManager();
            $dOtro = $em->getRepository('IBKDemoBundle:DatosOtros')->find($id);
            $em->remove($dOtro);
            $em->flush();
            
            $request->getSession()->set('flag',1);
        }catch(Exception $e){
            $request->getSession()->set('flag',0);
        }
        return $this->redirect($this->generateUrl('_activos_otros'));
    }

//Editar Datos Activos

    /**
    * @Route("/edit_cuenta", name="_edit_cuenta")
    */
    public function editCuentaAction(Request $request){
        try{
            //Editar en Datos Activos
            $id = $request->get("_id");
            $em = $this->getDoctrine()->getManager();
            $dCuenta = $em->getRepository('IBKDemoBundle:DatosCuentas')->find($id);

            $dCuenta->setBanco($request->get("_banco"));
            $dCuenta->setSucursal($request->get("_sucursal"));
            $dCuenta->setCuenta($request->get("_cuenta"));
            $dCuenta->setEjecutivo($request->get("_ejecutivo"));

            $em->flush();

            $request->getSession()->set('flag',1);
        }catch(Exception $e){
            $request->getSession()->set('flag',0);
        }
        return $this->redirect($this->generateUrl('_activos_cuentas'));
    }

    /**
    * @Route("/edit_vehiculo", name="_edit_vehiculo")
    */
    public function editVehiculoAction(Request $request){
        try{

            //Editar en Datos Activos
            $id = $request->get("_id");
            $em = $this->getDoctrine()->getManager();
            $dVehiculo = $em->getRepository('IBKDemoBundle:DatosVehiculos')->find($id);

            $dVehiculo->setAño($request->get("_año"));
            $dVehiculo->setTipo($request->get("_tipo"));
            $dVehiculo->setMarca($request->get("_marca"));
            $dVehiculo->setModelo($request->get("_modelo"));
            $dVehiculo->setValor($request->get("_valor"));

            $em->flush();

            $request->getSession()->set('flag',1);
        }catch(Exception $e){
            $request->getSession()->set('flag',0);
        }
        return $this->redirect($this->generateUrl('_activos_vehiculos'));
    }

    /**
    * @Route("/edit_propiedad", name="_edit_propiedad")
    */
    public function editPropiedadAction(Request $request){
        try{

            //Editar en Datos Activos Otros
            $id = $request->get("_id");
            $em = $this->getDoctrine()->getManager();
            $dPropiedad = $em->getRepository('IBKDemoBundle:DatosPropiedades')->find($id);

            $dPropiedad->setTipo($request->get("_tipo"));
            $dPropiedad->setDescripcion($request->get("_descripcion"));
            $dPropiedad->setRegion($request->get("_region"));
            $dPropiedad->setComuna($request->get("_comuna"));
            $dPropiedad->setRol($request->get("_rol"));
            $dPropiedad->setAvaluoFiscal($request->get("_fiscal"));
            $dPropiedad->setAvaluoComercial($request->get("_comercial"));
            $dPropiedad->setHipotecada($request->get("_hipotecada"));

            if(!empty($request->get("_a_favor"))){
                 $dPropiedad->setAFavor($request->get("_a_favor"));
            }

            $em->flush();

            $request->getSession()->set('flag',1);
        }catch(Exception $e){
            $request->getSession()->set('flag',0);
        }
        return $this->redirect($this->generateUrl('_activos_propiedades'));
    }

    /**
    * @Route("/edit_inversion", name="_edit_inversion")
    */
    public function editInversionAction(Request $request){
        try{

            //Editar en Datos Activos Otros
            $id = $request->get("_id");
            $em = $this->getDoctrine()->getManager();
            $dInversion = $em->getRepository('IBKDemoBundle:DatosInversiones')->find($id);

            $dInversion->setDescripcion($request->get("_descripcion"));
            $dInversion->setValor($request->get("_valor"));
            $dInversion->setTipo($request->get("_tipo"));

            $em->flush();

            $request->getSession()->set('flag',1);
        }catch(Exception $e){
            $request->getSession()->set('flag',0);
        }
        return $this->redirect($this->generateUrl('_activos_inversiones'));
    }

    /**
    * @Route("/edit_otro", name="_edit_otro")
    */
    public function editOtrosAction(Request $request){
        try{

            //Editar en Datos Activos Otros
            $id = $request->get("_id");
            $em = $this->getDoctrine()->getManager();
            $dOtros = $em->getRepository('IBKDemoBundle:DatosOtros')->find($id);

            $dOtros->setDescripcion($request->get("_descripcion"));
            $dOtros->setValor($request->get("_valor"));
            $dOtros->setEnPrenda($request->get("_en_prenda_otro"));

            if(!empty($request->get("_a_favor"))){
                 $dOtros->setAFavor($request->get("_a_favor"));
            }

            $em->flush();

            $request->getSession()->set('flag',1);
        }catch(Exception $e){
            $request->getSession()->set('flag',0);
        }
        return $this->redirect($this->generateUrl('_activos_otros'));
    }

//Editar Datos Personales

    /**
    * @Route("/personal", name="_edit_personal")
    */
    public function editPersonalAction(Request $request){
        try{
            $id = $this->getUser() -> getId();
            //Ingreso Datos Personales
            $em = $this->getDoctrine()->getManager();
            $dPersonal = $em->getRepository('IBKDemoBundle:DatosPersonales')->find($id);
     
            if (!$dPersonal) {
                    throw $this->createNotFoundException(
                    'No dPersonal found for id '.$id
                );
            }

            //Agregar la fecha
            $birthday = str_replace('/', '-', $request->get('_birthday'));
            $birthday = new \DateTime($birthday);
            $dPersonal->setFechaNacimiento($birthday);
            $dPersonal->setNumeroSerie($request->get("_numero_serie"));
            $dPersonal->setSexo($request->get("_sexo"));
            $dPersonal->setNacionalidad($request->get("_nacionalidad"));
            $dPersonal->setEstadoCivil($request->get("_civil"));
            $dPersonal->setDependientes($request->get("_dependientes"));
            $em->flush();

            //Ingreso Datos Localizacion
            $dLocalizacion = $em->getRepository('IBKDemoBundle:DatosLocalizacion')->find($id);
     
            if (!$dLocalizacion) {
                    throw $this->createNotFoundException(
                    'No dLocalizacion found for id '.$id
                );
            }

            $dLocalizacion->setDomicilio($request->get("_direccion"));
            $dLocalizacion->setRegion($request->get("_region"));
            $dLocalizacion->setComuna($request->get("_comuna"));
            $dLocalizacion->setCalidadDomicilio($request->get("_calidad"));
            $dLocalizacion->setCelular($request->get("_celular"));
            $dLocalizacion->setTelefono($request->get("_telefono"));

            $em->flush();

            $request->getSession()->set('flag',1);
        }catch(Exception $e){
            $request->getSession()->set('flag',0);
        }
        return $this->redirect($this->generateUrl('_personal_personal'));
    }

    /**
    * @Route("/conyugue", name="_edit_conyugue")
    */
    public function editConyugueAction(Request $request){
        try{
            $id = $this->getUser() -> getId();

            $em = $this->getDoctrine()->getManager();
            if(! $dConyugue = $em->getRepository('IBKDemoBundle:DatosConyugue')->find($id))
            {
                //insertar en Datos Conyugue
                $dConyugue = new DatosConyugue();
                $dConyugue->setId($id);
                $em = $this->getDoctrine()->getManager();
                $em->persist($dConyugue);
                $em->flush();
            }
            $dConyugue = $em->getRepository('IBKDemoBundle:DatosConyugue')->find($id);
            $dConyugue->setRut($request->get("_rut"));
            $dConyugue->setNombre($request->get("_nombre"));
            $dConyugue->setApellidoP($request->get("_apellido_p"));
            $dConyugue->setApellidoM($request->get("_apellido_m"));
            $dConyugue->setSexo($request->get("_sexo"));
            $dConyugue->setNacionalidad($request->get("_nacionalidad"));
            $dConyugue->setEducacion($request->get("_educacion"));
            $dConyugue->setProfesion($request->get("_profesion"));
            $dConyugue->setEconomia($request->get("_economia"));
            $dConyugue->setRenta($request->get("_renta"));
            $dConyugue->setCelular($request->get("_celular"));
            $dConyugue->setEmail($request->get("_email"));

            //Agregar la fecha
            if( !empty($request->get('_birthday'))){
                $fecha = str_replace('/', '-', $request->get('_birthday'));
                $fecha = new \DateTime($fecha);
                $dConyugue->setFechaNacimiento($fecha);
            }

            $em->flush();

            $request->getSession()->set('flag',1);
        }catch(Exception $e){
            $request->getSession()->set('flag',0);
        }
        return $this->redirect($this->generateUrl('_personal_conyugue'));
    }

    /**
    * @Route("/academico", name="_edit_academico")
    */
    public function editAcademicoAction(Request $request){
        try{
            $id = $this->getUser() -> getId();

            //Ingreso Datos Personales
            $em = $this->getDoctrine()->getManager();
            $dAcademicos = $em->getRepository('IBKDemoBundle:DatosAcademicos')->find($id);
     
            if (!$dAcademicos) {
                    throw $this->createNotFoundException(
                    'No dAcademicos found for id '.$id
                );
            }
           
            $dAcademicos->setEducacion($request->get("_educacion"));
            $dAcademicos->setUniversidad($request->get("_universidad"));
            $dAcademicos->setProfesion($request->get("_profesion"));
            $dAcademicos->setEconomia($request->get("_economia"));
            $em->flush();

            //Segun la economia
            switch ( $request->get("_economia") ) 
            {
                case "Trabajador(a) dependiente":
                    $flag = $this->editDependienteAction($request,$id);
                    break;
                case "Profesional independiente":
                    $flag = $this->editIndependienteAction($request,$id);
                    break;
                case "Persona natural con giro":
                    $flag = $this->editNaturalAction($request,$id);
                    break;
            }

            if($flag)
                $request->getSession()->set('flag',1);
        }catch(Exception $e){
            $request->getSession()->set('flag',0);
        }

        return $this->redirect($this->generateUrl('_personal_academico'));
    }


    private function editDependienteAction(Request $request, $id){
        try
        {
            $em = $this->getDoctrine()->getManager();
            if(! $dDependiente = $em->getRepository('IBKDemoBundle:DatosDependiente')->find($id))
            {
                //insertar en Datos Dependientes
                $dDependiente = new DatosDependiente();
                $dDependiente->setId($id);
                $em = $this->getDoctrine()->getManager();
                $em->persist($dDependiente);
                $em->flush();
            }

            $dDependiente = $em->getRepository('IBKDemoBundle:DatosDependiente')->find($id);
            $dDependiente->setEmpresa($request->get("_empresa_d"));
            $dDependiente->setRut($request->get("_rut_d"));
            $dDependiente->setGiro($request->get("_giro_d"));
            $dDependiente->setDomicilio($request->get("_domicilio_d"));
            $dDependiente->setRegion($request->get("_region_d"));
            $dDependiente->setComuna($request->get("_comuna_d"));
            $dDependiente->setContrato($request->get("_contrato_d"));
            $dDependiente->setCargo($request->get("_cargo_d"));
            $dDependiente->setRemuneracion($request->get("_remuneracion_d"));
            $dDependiente->setRenta($request->get("_renta_d"));
            $dDependiente->setTelefono($request->get("_telefono_d"));

            //Agregar la fecha
            if( !empty($request->get('_fecha_ingreso_d'))){
                $fecha = str_replace('/', '-', $request->get('_fecha_ingreso_d'));
                $fecha = new \DateTime($fecha);
                $dDependiente->setFechaIngreso($fecha);
            }

            $em->flush();

            return true;

        }catch(Exception $e){
            return false;
        }
    }


    private function editIndependienteAction(Request $request, $id){
        try
        {
            $em = $this->getDoctrine()->getManager();
            if(! $dIndependiente = $em->getRepository('IBKDemoBundle:DatosIndependiente')->find($id))
            {
                //insertar en Datos Inpendientes
                $dIndependiente = new DatosIndependiente();
                $dIndependiente->setId($id);
                $em = $this->getDoctrine()->getManager();
                $em->persist($dIndependiente);
                $em->flush();
            }

            $dIndependiente = $em->getRepository('IBKDemoBundle:DatosIndependiente')->find($id);
            $dIndependiente->setServicio($request->get("_servicio_i"));
            $dIndependiente->setDomicilio($request->get("_domicilio_i"));
            $dIndependiente->setRegion($request->get("_region_i"));
            $dIndependiente->setComuna($request->get("_comuna_i"));
            $dIndependiente->setAntiguedad($request->get("_antiguedad_i"));
            $dIndependiente->setRenta($request->get("_renta_i"));
            $em->flush();

            return true;
        }catch(Exception $e){
            return false;
        }
    }


    private function editNaturalAction(Request $request, $id){
        try
        {
            $em = $this->getDoctrine()->getManager();
            if(! $dNatural = $em->getRepository('IBKDemoBundle:DatosNatural')->find($id))
            {
                //insertar en Datos Inpendientes
                $dNatural = new DatosNatural();
                $dNatural->setId($id);
                $em = $this->getDoctrine()->getManager();
                $em->persist($dNatural);
                $em->flush();
            }

            $dNatural = $em->getRepository('IBKDemoBundle:DatosNatural')->find($id);
            $dNatural->setGiro($request->get("_giro_n"));
            $dNatural->setDomicilio($request->get("_domicilio_n"));
            $dNatural->setRegion($request->get("_region_n"));
            $dNatural->setComuna($request->get("_comuna_n"));
            $dNatural->setAntiguedad($request->get("_antiguedad_n"));
            $dNatural->setVentas($request->get("_ventas_n"));
            //Agregar la fecha
            if( !empty($request->get('_fecha_sii_n'))){
                $fecha = str_replace('/', '-', $request->get('_fecha_sii_n'));
                $fecha = new \DateTime($fecha);
                $dNatural->setFechaSii($fecha);
            }

            $em->flush();

            return true;
        }catch(Exception $e){
            return false;
        }
    }
}