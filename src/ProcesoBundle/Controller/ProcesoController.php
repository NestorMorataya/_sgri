<?php

namespace ProcesoBundle\Controller;

use ProcesoBundle\Entity\Proceso;
use ControlBundle\Entity\Control;
use PlanTratamientoBundle\Entity\Plan_Tratamiento;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Proceso controller.
 *
 * @Route("proceso")
 */
class ProcesoController extends Controller
{
    /**
     * Lists all proceso entities.
     *
     * @Route("/", name="proceso_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $procesos = $em->getRepository('ProcesoBundle:Proceso')->findAll();

        return $this->render('proceso/index.html.twig', array(
            'procesos' => $procesos,
        ));
    }

    /**
     * Creates a new proceso entity.
     *
     * @Route("/new", name="proceso_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $proceso = new Proceso();
        $form = $this->createForm('ProcesoBundle\Form\ProcesoType', $proceso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($proceso);
            $em->flush();

            return $this->redirectToRoute('proceso_show', array('id' => $proceso->getId()));
        }

        return $this->render('proceso/new.html.twig', array(
            'proceso' => $proceso,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a proceso entity.
     *
     * @Route("/{id}", name="proceso_show")
     * @Method("GET")
     */
    public function showAction(Proceso $proceso)
    {
        $deleteForm = $this->createDeleteForm($proceso);

        return $this->render('proceso/show.html.twig', array(
            'proceso' => $proceso,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing proceso entity.
     *
     * @Route("/{id}/edit", name="proceso_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Proceso $proceso)
    {
        $deleteForm = $this->createDeleteForm($proceso);
        $editForm = $this->createForm('ProcesoBundle\Form\ProcesoType', $proceso);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('proceso_edit', array('id' => $proceso->getId()));
        }

        return $this->render('proceso/edit.html.twig', array(
            'proceso' => $proceso,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a proceso entity.
     *
     * @Route("/{id}", name="proceso_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Proceso $proceso)
    {
        $form = $this->createDeleteForm($proceso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($proceso);
            $em->flush();
        }

        return $this->redirectToRoute('proceso_index');
    }

    /**
     * Creates a form to delete a proceso entity.
     *
     * @param Proceso $proceso The proceso entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Proceso $proceso)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('proceso_delete', array('id' => $proceso->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


    /** 
     * Guardar procesos.
     *
     * @Route("/proceso/proceso/guardar", name="proceso2")
     * @Method("GET")
     */
 public function guardarAction(Request $request)
    {
       
        $num = 0;
        $contador = $request->get('contador');
        $pla=$request->get('plan');
        for ($i=0; $i < $contador; $i++) { 
            $pla = $request->get('pla'.$num);
            $ries = $request->get('ries'.$num);
            $contr = $request->get('contr'.$num);
            

            $proceso = new Proceso();
            $proceso->setPlan($plan);
            $proceso->setRiesgo($ries);
            $proceso->setControl($contr);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($proceso);
            $em->flush();
            $num++;
        }
         return $this->redirectToRoute('proceso_index');
    }


    /**
     * Edición de procesos.
     *
     * @Route("/proceso/edicion", name="proceso")
     * @Method("GET")
     */
    public function editarAction(Request $request){


        $planid = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $proceso = $em->getRepository('ProcesoBundle:Proceso')->findOneBy(array('id'=> $planid));
        $plan = $request->get('plan');
        $ries = $request->get('riesS');
        $ame = $request->get('confSeleccionada');
        $contr = $request->get('controlSeleccionado');
        $contr = substr($contr, 1);

        $proceso->setPlan($pla);
        $proceso->setRiesgo($ries);
        $proceso->setControl($contr);
        $em->persist($proceso);
        $em->flush();

        //return new Response($rieid);

        return $this->redirectToRoute('proceso_index', array( 'id' => $planid ));


    }


     /**
     * Finds and displays a Plan_Tratamiento entity.
     *
     * @Route("/proceso/{id}", name="proceso_mostrar")
     * @Method("GET")
     */
    public function showAction2(Proceso $proceso)
    {
    
          $cont = new Control();
          $pla= new Plan_Tratamiento();
          $em = $this->getDoctrine()->getManager();
          $cont = $em->getRepository('ControlBundle:Control')->findAll();

        return $this->render('proceso/indexProceso.html.twig', array(
        'control'=>$cont, 'proceso'=>$proceso, 'plan_Tratamiento'=>$pla,
       
        ));
    }

    /**
    *
    * @Route("/tarea/opcion1", name="proceso_menu")
    * @Method("GET")
    */
    public function menuAction1()
    {
          
        return $this->render('proceso/asignarControles.html.twig');
    }








}
