<?php

namespace AmenazaCatBundle\Controller;

use AmenazaCatBundle\Entity\Cat_Amenaza;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cat_amenaza controller.
 *
 * @Route("cat_amenaza")
 */
class Cat_AmenazaController extends Controller
{
    /**
     * Lists all cat_Amenaza entities.
     *
     * @Route("/index", name="cat_amenaza_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cat_Amenazas = $em->getRepository('AmenazaCatBundle:Cat_Amenaza')->findAll();

        return $this->render('cat_amenaza/index.html.twig', array(
            'cat_Amenazas' => $cat_Amenazas,
        ));
    }

    /**
     * Creates a new cat_Amenaza entity.
     *
     * @Route("/new", name="cat_amenaza_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cat_Amenaza = new Cat_amenaza();
        $form = $this->createForm('AmenazaCatBundle\Form\Cat_AmenazaType', $cat_Amenaza);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cat_Amenaza);
            $em->flush();

            return $this->redirectToRoute('cat_amenaza_show', array('id' => $cat_Amenaza->getId()));
        }

        return $this->render('cat_amenaza/new.html.twig', array(
            'cat_Amenaza' => $cat_Amenaza,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cat_Amenaza entity.
     *
     * @Route("/{id}", name="cat_amenaza_show")
     * @Method("GET")
     */
    public function showAction(Cat_Amenaza $cat_Amenaza)
    {
        $deleteForm = $this->createDeleteForm($cat_Amenaza);

        return $this->render('cat_amenaza/show.html.twig', array(
            'cat_Amenaza' => $cat_Amenaza,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cat_Amenaza entity.
     *
     * @Route("/{id}/edit", name="cat_amenaza_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cat_Amenaza $cat_Amenaza)
    {
        $deleteForm = $this->createDeleteForm($cat_Amenaza);
        $editForm = $this->createForm('AmenazaCatBundle\Form\Cat_AmenazaType', $cat_Amenaza);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cat_amenaza_edit', array('id' => $cat_Amenaza->getId()));
        }

        return $this->render('cat_amenaza/edit.html.twig', array(
            'cat_Amenaza' => $cat_Amenaza,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cat_Amenaza entity.
     *
     * @Route("/{id}", name="cat_amenaza_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Cat_Amenaza $cat_Amenaza)
    {
        $form = $this->createDeleteForm($cat_Amenaza);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cat_Amenaza);
            $em->flush();
        }

        return $this->redirectToRoute('cat_amenaza_index');
    }

    /**
     * Creates a form to delete a cat_Amenaza entity.
     *
     * @param Cat_Amenaza $cat_Amenaza The cat_Amenaza entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cat_Amenaza $cat_Amenaza)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cat_amenaza_delete', array('id' => $cat_Amenaza->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

     /**
     * Lists all categoria entities.
     *
     * @Route("/", name="menu_catamenaza")
     * @Method("GET")
     */
 public function menuAction()
    {
        return $this->render('menu/menuCatAmenaza.html.twig');
        //return new Response("hola");
    }
}
