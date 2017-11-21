<?php

namespace VulnerabilidadCatBundle\Controller;

use VulnerabilidadCatBundle\Entity\Cat_Vulnerabilidad;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cat_vulnerabilidad controller.
 *
 * @Route("cat_vulnerabilidad")
 */
class Cat_VulnerabilidadController extends Controller
{
    /**
     * Lists all cat_Vulnerabilidad entities.
     *
     * @Route("/index", name="cat_vulnerabilidad_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cat_Vulnerabilidads = $em->getRepository('VulnerabilidadCatBundle:Cat_Vulnerabilidad')->findAll();

        return $this->render('cat_vulnerabilidad/index.html.twig', array(
            'cat_Vulnerabilidads' => $cat_Vulnerabilidads,
        ));
    }

    /**
     * Creates a new cat_Vulnerabilidad entity.
     *
     * @Route("/new", name="cat_vulnerabilidad_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cat_Vulnerabilidad = new Cat_vulnerabilidad();
        $form = $this->createForm('VulnerabilidadCatBundle\Form\Cat_VulnerabilidadType', $cat_Vulnerabilidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cat_Vulnerabilidad);
            $em->flush();

            return $this->redirectToRoute('cat_vulnerabilidad_show', array('id' => $cat_Vulnerabilidad->getId()));
        }

        return $this->render('cat_vulnerabilidad/new.html.twig', array(
            'cat_Vulnerabilidad' => $cat_Vulnerabilidad,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cat_Vulnerabilidad entity.
     *
     * @Route("/{id}", name="cat_vulnerabilidad_show")
     * @Method("GET")
     */
    public function showAction(Cat_Vulnerabilidad $cat_Vulnerabilidad)
    {
        $deleteForm = $this->createDeleteForm($cat_Vulnerabilidad);

        return $this->render('cat_vulnerabilidad/show.html.twig', array(
            'cat_Vulnerabilidad' => $cat_Vulnerabilidad,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cat_Vulnerabilidad entity.
     *
     * @Route("/{id}/edit", name="cat_vulnerabilidad_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cat_Vulnerabilidad $cat_Vulnerabilidad)
    {
        $deleteForm = $this->createDeleteForm($cat_Vulnerabilidad);
        $editForm = $this->createForm('VulnerabilidadCatBundle\Form\Cat_VulnerabilidadType', $cat_Vulnerabilidad);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cat_vulnerabilidad_edit', array('id' => $cat_Vulnerabilidad->getId()));
        }

        return $this->render('cat_vulnerabilidad/edit.html.twig', array(
            'cat_Vulnerabilidad' => $cat_Vulnerabilidad,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cat_Vulnerabilidad entity.
     *
     * @Route("/{id}", name="cat_vulnerabilidad_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Cat_Vulnerabilidad $cat_Vulnerabilidad)
    {
        $form = $this->createDeleteForm($cat_Vulnerabilidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cat_Vulnerabilidad);
            $em->flush();
        }

        return $this->redirectToRoute('cat_vulnerabilidad_index');
    }

    /**
     * Creates a form to delete a cat_Vulnerabilidad entity.
     *
     * @param Cat_Vulnerabilidad $cat_Vulnerabilidad The cat_Vulnerabilidad entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cat_Vulnerabilidad $cat_Vulnerabilidad)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cat_vulnerabilidad_delete', array('id' => $cat_Vulnerabilidad->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }



     /**
     * Lists all categoria entities.
     *
     * @Route("/menu/catvu", name="menu_catvulnerabilidad")
     * @Method("GET")
     */
     public function menuAction()
    {

        return $this->render('menu/menuCatVulnerabilidad.html.twig');
    }
}
