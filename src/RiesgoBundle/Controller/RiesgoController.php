<?php

namespace RiesgoBundle\Controller; 
 
use RiesgoBundle\Entity\Riesgo;
use AmenazaCatBundle\Entity\Cat_Amenaza;
use AmenazaBundle\Entity\Amenaza;
use ActivoBundle\Entity\activo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response; 

/**
 * Riesgo controller.
 *
 * @Route("riesgo")
 */
class RiesgoController extends Controller
{
    /**
     * Lists all riesgo entities.
     *
     * @Route("/index", name="riesgo_index")
     * @Method("GET")
     */
     public function indexAction()
     {
         $em = $this->getDoctrine()->getManager();

         $riesgos = $em->getRepository('RiesgoBundle:Riesgo')->findAll();

         return $this->render('riesgo/index.html.twig', array(
             'riesgos' => $riesgos,
         ));
     }

    /**
     * Creates a new riesgo entity.
     *
     * @Route("/new", name="riesgo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $riesgo = new Riesgo();
        $form = $this->createForm('RiesgoBundle\Form\RiesgoType', $riesgo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($riesgo);
            $em->flush();

            return $this->redirectToRoute('riesgo_show', array('id' => $riesgo->getId()));
        }

        return $this->render('riesgo/new.html.twig', array(
            'riesgo' => $riesgo,
            'form' => $form->createView(),
        ));
    }


    public function showAction(Riesgo $riesgo)
    {
        $deleteForm = $this->createDeleteForm($riesgo);

        return $this->render('riesgo/show.html.twig', array(
            'riesgo' => $riesgo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing riesgo entity.
     *
     * @Route("/{id}/edit", name="riesgo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request)
    {
           
        $rieid = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $riesgo = $em->getRepository('RiesgoBundle:Riesgo')->findOneBy(array('id'=> $rieid));
        $cat = $em->getRepository('AmenazaCatBundle:Cat_Amenaza')->findAll();
        $ame = $em->getRepository('AmenazaBundle:Amenaza')->findAll();

        return $this->render('riesgo/edit.html.twig', array(
            'riesgo' => $riesgo, 'categoria' => $cat, 'amenaza' => $ame,
        ));
    }

    /**
     * Deletes a riesgo entity.
     *
     * @Route("/{id}", name="riesgo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Riesgo $riesgo)
    {
        $form = $this->createDeleteForm($riesgo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($riesgo);
            $em->flush();
        }

        return $this->redirectToRoute('riesgo_index');
    }

    /**
     * Creates a form to delete a riesgo entity.
     *
     * @param Riesgo $riesgo The riesgo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Riesgo $riesgo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('riesgo_delete', array('id' => $riesgo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Lists all activo entities.
     *
     * @Route("/algo", name="algo")
     * @Method("GET")
     */
    public function riesgoAction()
    {

        $user = $this->getUser(); //Devuelve el usario que esta en sesion
        $em = $this->getDoctrine()->getManager();


       $activos = $em->getRepository('ActivoBundle:activo')->findBy(array('empresaId' => $user->getEmpresa())); //Filtramos los activos en base al empresa Id

        return $this->render('riesgo/indexActivo.html.twig', array(
           'activos' => $activos,
        ));
        // return new Response('Holi');
    }


     /**
     * Finds and displays a activo entity.
     *
     * @Route("/{id}", name="activo_show2")
     * @Method("GET")
     */
    public function showAction2(activo $activo)
    {
        //$deleteForm = $this->createDeleteForm($activo);
       // return new Response('Holi');

         $cat = new Cat_Amenaza();
         $ame = new Amenaza();
          $em = $this->getDoctrine()->getManager();
          $cat = $em->getRepository('AmenazaCatBundle:Cat_Amenaza')->findAll();
          $ame = $em->getRepository('AmenazaBundle:Amenaza')->findAll();

//           $query = $em->createQuery(
//          'SELECT p , p2
//          FROM AmenazaBundle:Amenaza p, AmenazaCatBundle:Cat_Amenaza p2
//          WHERE p.categoria_id = p2.id'

// );
//  $em->flush();
          //$ame = $em->getRepository('AmenazaBundle:Amenaza')->findById($cat);
         // $mascotas = $em->getRepository(‘AppBundle:Mascota’)->findByClienteId($cliente_id);

         // $ame = $em->getRepository('AmenazaBundle:Amenaza')->findByCategoriaId($Id);
        return $this->render('riesgo/indexActivoRiesgo.html.twig', array(
           'activo' => $activo,'categoria' => $cat,'amenaza'=>$ame,
           // 'delete_form' => $deleteForm->createView(),
        ));
    }

/**
     * Finds and displays a activo entity.
     *
     * @Route("/ver/{id}", name="activo_ver_riesgo")
     * @Method("GET")
     */
    public function showRiesgoAct(activo $activo)
    {
        //$deleteForm = $this->createDeleteForm($activo);
       // return new Response('Holi');
        
         $cat = new Cat_Amenaza();
         $ame = new Amenaza();
         
       $em = $this->getDoctrine()->getManager();
        $riesgos = $em->getRepository('RiesgoBundle:Riesgo')->findBy(array('activo' => $activo->getId()));

        $cat = $em->getRepository('AmenazaCatBundle:Cat_Amenaza')->findAll();
        $ame = $em->getRepository('AmenazaBundle:Amenaza')->findAll();


// );
//  $em->flush();
          //$ame = $em->getRepository('AmenazaBundle:Amenaza')->findById($cat);
         // $mascotas = $em->getRepository(‘AppBundle:Mascota’)->findByClienteId($cliente_id);

         // $ame = $em->getRepository('AmenazaBundle:Amenaza')->findByCategoriaId($Id);
        return $this->render('riesgo/verActivoRiesgo.html.twig', array(
           'activo' => $activo, 'categoria' => $cat,'amenaza'=>$ame, 'riesgos' => $riesgos,
           // 'delete_form' => $deleteForm->createView(),
        ));
    }


    /**
     * Lists all riesgo entities.
     *
     * @Route("/", name="menu_riesgo")
     * @Method("GET")
     */
 public function menuAction()
    {
        return $this->render('menu/menuRiesgo.html.twig');
    }

      /**
     * Lists all riesgo entities.
     *
     * @Route("/guardar/prueba", name="guardarRiesgo")
     * @Method("GET")
     */
 public function guardarAction(Request $request)
    {
       
        $num = 0;
        $contador = $request->get('contador');
        $idactivo=$request->get('activo');
        for ($i=0; $i < $contador; $i++) { 
            $dis = $request->get('disp'.$num);
            $con = $request->get('conf'.$num);
            $int = $request->get('int'.$num);
            $vActivo = $request->get('valor'.$num);
            $deg = $request->get('degra'.$num);
            $impacto = $request->get('impac'.$num);
            $ame = $request->get('ame'.$num);
            //$vul = $request->get('vulnerabilidad'.$num);
            $prob = $request->get('prob'.$num);
            $eRiesgo = $request->get('ries'.$num);

            $riesgo = new Riesgo();
            $riesgo->setActivo($idactivo);
            $riesgo->setDisponibilidad($dis);
            $riesgo->setConfidencialidad($con);
            $riesgo->setIntegridad($int);
            $riesgo->setValorActivo($vActivo);
            $riesgo->setDegradacion($deg);
            $riesgo->setImpacto($impacto);
            $riesgo->setAmenaza($ame);
            $riesgo->setProbOcurrencia($prob);
            $riesgo->setEstimacionRiesgo($eRiesgo);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($riesgo);
            $em->flush();
            $num++;
        }
         return $this->redirectToRoute('user_homepage');
    }

        /**
     * Metodo para edicion de un registro de riesgo.
     *
     * @Route("/edicion/guardar", name="edicion_guardar")
     * @Method("GET")
     */
    public function editarAction(Request $request){


        $rieid = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $riesgo = $em->getRepository('RiesgoBundle:Riesgo')->findOneBy(array('id'=> $rieid));
        $actid = $request->get('activo');
        $dis = $request->get('dispSeleccionada');
        $con = $request->get('confSeleccionada');
        $int = $request->get('intSeleccionada');
        $valA = $request->get('valorCalc');
        $deg = $request->get('degradacionSeleccionada');
        $prob = $request->get('probabilidadSeleccionada');
        $imp = $request->get('impactoCalc');
        $estR = $request->get('riesgoCalc');

        $ame = $request->get('amenazaSeleccionada');

        $ame = substr($ame, 1);

        $riesgo->setDisponibilidad($dis);
        $riesgo->setConfidencialidad($con);
        $riesgo->setIntegridad($int);
        $riesgo->setValorActivo($valA);
        $riesgo->setDegradacion($deg);
        $riesgo->setImpacto($imp);
        $riesgo->setAmenaza($ame);
        $riesgo->setProbOcurrencia($prob);
        $riesgo->setEstimacionRiesgo($estR);


        $em->persist($riesgo);
        $em->flush();

        //return new Response($rieid);

        return $this->redirectToRoute('activo_ver_riesgo', array( 'id' => $actid ));


    }
}
