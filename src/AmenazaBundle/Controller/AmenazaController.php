<?php

namespace AmenazaBundle\Controller;

use AmenazaBundle\Entity\Amenaza;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Amenaza controller.
 *
 * @Route("amenaza")
 */
class AmenazaController extends Controller
{
    /**
     * Lists all amenaza entities.
     *
     * @Route("/index", name="amenaza_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $amenazas = $em->getRepository('AmenazaBundle:Amenaza')->findAll();

        return $this->render('amenaza/index.html.twig', array(
            'amenazas' => $amenazas,
        ));
    }

    /**
     * Creates a new amenaza entity.
     *
     * @Route("/new", name="amenaza_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $amenaza = new Amenaza();
        $form = $this->createForm('AmenazaBundle\Form\AmenazaType', $amenaza);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($amenaza);
            $em->flush();

            return $this->redirectToRoute('amenaza_show', array('id' => $amenaza->getId()));
        }

        return $this->render('amenaza/new.html.twig', array(
            'amenaza' => $amenaza,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a amenaza entity.
     *
     * @Route("/{id}", name="amenaza_show")
     * @Method("GET")
     */
    public function showAction(Amenaza $amenaza)
    {
        $deleteForm = $this->createDeleteForm($amenaza);

        return $this->render('amenaza/show.html.twig', array(
            'amenaza' => $amenaza,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing amenaza entity.
     *
     * @Route("/{id}/edit", name="amenaza_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Amenaza $amenaza)
    {
        $deleteForm = $this->createDeleteForm($amenaza);
        $editForm = $this->createForm('AmenazaBundle\Form\AmenazaType', $amenaza);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('amenaza_edit', array('id' => $amenaza->getId()));
        }

        return $this->render('amenaza/edit.html.twig', array(
            'amenaza' => $amenaza,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a amenaza entity.
     *
     * @Route("/{id}", name="amenaza_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Amenaza $amenaza)
    {
        $form = $this->createDeleteForm($amenaza);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($amenaza);
            $em->flush();
        }

        return $this->redirectToRoute('amenaza_index');
    }

    /**
     * Creates a form to delete a amenaza entity.
     *
     * @param Amenaza $amenaza The amenaza entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Amenaza $amenaza)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('amenaza_delete', array('id' => $amenaza->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Lists all categoria entities.
     *
     * @Route("/", name="menu_amenaza")
     * @Method("GET")
     */
 public function menuAction()
    {
        return $this->render('menu/menuAmenaza.html.twig');
        //return new Response("hola");
    }

}
