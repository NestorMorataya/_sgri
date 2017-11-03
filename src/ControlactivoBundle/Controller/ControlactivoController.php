<?php

namespace ControlactivoBundle\Controller;

use ControlactivoBundle\Entity\Controlactivo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Controlactivo controller.
 *
 * @Route("controlactivo")
 */
class ControlactivoController extends Controller
{
    /**
     * Lists all controlactivo entities.
     *
     * @Route("/", name="controlactivo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $controlactivos = $em->getRepository('ControlactivoBundle:Controlactivo')->findAll();

        return $this->render('controlactivo/index.html.twig', array(
            'controlactivos' => $controlactivos,
        ));
    }

    /**
     * Creates a new controlactivo entity.
     *
     * @Route("/new", name="controlactivo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $controlactivo = new Controlactivo();
        $form = $this->createForm('ControlactivoBundle\Form\ControlactivoType', $controlactivo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($controlactivo);
            $em->flush();

            return $this->redirectToRoute('controlactivo_show', array('id' => $controlactivo->getId()));
        }

        return $this->render('controlactivo/new.html.twig', array(
            'controlactivo' => $controlactivo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a controlactivo entity.
     *
     * @Route("/{id}", name="controlactivo_show")
     * @Method("GET")
     */
    public function showAction(Controlactivo $controlactivo)
    {
        $deleteForm = $this->createDeleteForm($controlactivo);

        return $this->render('controlactivo/show.html.twig', array(
            'controlactivo' => $controlactivo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing controlactivo entity.
     *
     * @Route("/{id}/edit", name="controlactivo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Controlactivo $controlactivo)
    {
        $deleteForm = $this->createDeleteForm($controlactivo);
        $editForm = $this->createForm('ControlactivoBundle\Form\ControlactivoType', $controlactivo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('controlactivo_edit', array('id' => $controlactivo->getId()));
        }

        return $this->render('controlactivo/edit.html.twig', array(
            'controlactivo' => $controlactivo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a controlactivo entity.
     *
     * @Route("/{id}", name="controlactivo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Controlactivo $controlactivo)
    {
        $form = $this->createDeleteForm($controlactivo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($controlactivo);
            $em->flush();
        }

        return $this->redirectToRoute('controlactivo_index');
    }

    /**
     * Creates a form to delete a controlactivo entity.
     *
     * @param Controlactivo $controlactivo The controlactivo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Controlactivo $controlactivo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('controlactivo_delete', array('id' => $controlactivo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
