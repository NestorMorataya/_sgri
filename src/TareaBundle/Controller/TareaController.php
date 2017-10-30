<?php

namespace TareaBundle\Controller;

use TareaBundle\Entity\Tarea;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Tarea controller.
 *
 * @Route("tarea")
 */
class TareaController extends Controller
{
    /**
     * Lists all tarea entities.
     *
     * @Route("/index", name="tarea_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tareas = $em->getRepository('TareaBundle:Tarea')->findAll();

        return $this->render('tarea/index.html.twig', array(
            'tareas' => $tareas,
        ));
    }

    /**
     * Creates a new tarea entity.
     *
     * @Route("/new", name="tarea_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tarea = new Tarea();
        $form = $this->createForm('TareaBundle\Form\TareaType', $tarea);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tarea);
            $em->flush();

            return $this->redirectToRoute('tarea_show', array('id' => $tarea->getId()));
        }

        return $this->render('tarea/new.html.twig', array(
            'tarea' => $tarea,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tarea entity.
     *
     * @Route("/{id}", name="tarea_show")
     * @Method("GET")
     */
    public function showAction(Tarea $tarea)
    {
        $deleteForm = $this->createDeleteForm($tarea);

        return $this->render('tarea/show.html.twig', array(
            'tarea' => $tarea,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tarea entity.
     *
     * @Route("/{id}/edit", name="tarea_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Tarea $tarea)
    {
        $deleteForm = $this->createDeleteForm($tarea);
        $editForm = $this->createForm('TareaBundle\Form\TareaType', $tarea);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tarea_edit', array('id' => $tarea->getId()));
        }

        return $this->render('tarea/edit.html.twig', array(
            'tarea' => $tarea,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tarea entity.
     *
     * @Route("/{id}", name="tarea_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Tarea $tarea)
    {
        $form = $this->createDeleteForm($tarea);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tarea);
            $em->flush();
        }

        return $this->redirectToRoute('tarea_index');
    }

    /**
     * Creates a form to delete a tarea entity.
     *
     * @param Tarea $tarea The tarea entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Tarea $tarea)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tarea_delete', array('id' => $tarea->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


    /**
     * Lists all riesgo entities.
     *
     * @Route("/", name="menu_tarea")
     * @Method("GET")
     */
 public function menuAction()
    {
        return $this->render('menu/menuTarea.html.twig');
    }
}
