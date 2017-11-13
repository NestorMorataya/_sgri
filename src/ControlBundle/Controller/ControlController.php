<?php

namespace ControlBundle\Controller;
use ControlBundle\Entity\Control;
use ActivoBundle\Entity\Activo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Control controller.
 *
 * @Route("control")
 */
class ControlController extends Controller
{
    /**
     * Lists all control entities.
     *
     * @Route("/index", name="control_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        //$query=$em->createQuery(


        $controls = $em->getRepository('ControlBundle:Control')->findAll();

        return $this->render('control/index.html.twig', array(
            'controls' => $controls,
            ));
    }

     public function index2Action()
    {
        $em = $this->getDoctrine()->getManager();
        //$query=$em->createQuery(


        $controls = $em->getRepository('ControlBundle:Control')->findAll();

        return $this->render('control/index2.html.twig', array(
            'controls' => $controls,
            ));
    }

    /**
     * Creates a new control entity.
     *
     * @Route("/new", name="control_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $control = new Control();
        $form = $this->createForm('ControlBundle\Form\ControlType', $control);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($control);
            $em->flush();

            return $this->redirectToRoute('control_show', array('id' => $control->getId()));
        }

        return $this->render('control/new.html.twig', array(
            'control' => $control,
            'form' => $form->createView(),
            ));
    }
 
    /**
     * Finds and displays a control entity.
     *
     * @Route("/{id}", name="control_show")
     * @Method("GET")
     */
    public function showAction(Control $control)
    {
        $deleteForm = $this->createDeleteForm($control);

        return $this->render('control/show.html.twig', array(
            'control' => $control,
            'delete_form' => $deleteForm->createView(),
            ));
    }

    /**
     * Displays a form to edit an existing control entity.
     *
     * @Route("/{id}/edit", name="control_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Control $control)
    {
        $deleteForm = $this->createDeleteForm($control);
        $editForm = $this->createForm('ControlBundle\Form\ControlType', $control);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('control_edit', array('id' => $control->getId()));
        }

        return $this->render('control/edit.html.twig', array(
            'control' => $control,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            ));
    }

    /**
     * Deletes a control entity.
     *
     * @Route("/{id}", name="control_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Control $control)
    {
        $form = $this->createDeleteForm($control);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($control);
            $em->flush();
        }

        return $this->redirectToRoute('control_index');
    }

    /**
     * Creates a form to delete a control entity.
     *
     * @param Control $control The control entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Control $control)
    {
        return $this->createFormBuilder()
        ->setAction($this->generateUrl('control_delete', array('id' => $control->getId())))
        ->setMethod('DELETE')
        ->getForm()
        ;
    }

     /**
     * Lists all control entities.
     *
     * @Route("/", name="menu_control")
     * @Method("GET")
     */
     public function menuAction()
     {
        return $this->render('menu/menuControles.twig');
    }

   /**
     * Lists all control entities.
     *
     * @Route("/control/asignarcontrol", name="menu_asignarcontrol")
     * @Method("GET")
     */
   public function menuAction2()
   {
    return $this->render('menu/asignarControles.html.twig');
}



}


