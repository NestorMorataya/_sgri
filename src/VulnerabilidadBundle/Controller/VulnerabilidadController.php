<?php

namespace VulnerabilidadBundle\Controller;

use VulnerabilidadBundle\Entity\Vulnerabilidad;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Vulnerabilidad controller.
 *
 * @Route("vulnerabilidad")
 */
class VulnerabilidadController extends Controller
{
    /**
     * Lists all vulnerabilidad entities.
     *
     * @Route("/index", name="vulnerabilidad_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vulnerabilidads = $em->getRepository('VulnerabilidadBundle:Vulnerabilidad')->findAll();

        return $this->render('vulnerabilidad/index.html.twig', array(
            'vulnerabilidades' => $vulnerabilidads,
        ));
    }

    /**
     * Creates a new vulnerabilidad entity.
     *
     * @Route("/new", name="vulnerabilidad_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $vulnerabilidad = new Vulnerabilidad();
        $form = $this->createForm('VulnerabilidadBundle\Form\VulnerabilidadType', $vulnerabilidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vulnerabilidad);
            $em->flush();

            return $this->redirectToRoute('vulnerabilidad_index');
        }

        return $this->render('vulnerabilidad/new.html.twig', array(
            'vulnerabilidad' => $vulnerabilidad,
            'form' => $form->createView(),
        ));
    }



    /**
     * Displays a form to edit an existing vulnerabilidad entity.
     *
     * @Route("/{id}/edit", name="vulnerabilidad_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Vulnerabilidad $vulnerabilidad)
    {
        $deleteForm = $this->createDeleteForm($vulnerabilidad);
        $editForm = $this->createForm('VulnerabilidadBundle\Form\VulnerabilidadType', $vulnerabilidad);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vulnerabilidad_edit', array('id' => $vulnerabilidad->getId()));
        }

        return $this->render('vulnerabilidad/edit.html.twig', array(
            'vulnerabilidad' => $vulnerabilidad,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vulnerabilidad entity.
     *
     * @Route("/{id}", name="vulnerabilidad_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Vulnerabilidad $vulnerabilidad)
    {
        $form = $this->createDeleteForm($vulnerabilidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vulnerabilidad);
            $em->flush();
        }

        return $this->redirectToRoute('vulnerabilidad_index');
    }

    /**
     * Creates a form to delete a vulnerabilidad entity.
     *
     * @param Vulnerabilidad $vulnerabilidad The vulnerabilidad entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Vulnerabilidad $vulnerabilidad)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vulnerabilidad_delete', array('id' => $vulnerabilidad->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    /**
     * Lists all categoria entities.
     *
     * @Route("/menu", name="menu_vulnerabilidad")
     * @Method("GET")
     */

    public function menuAction()
    {

        return $this->render('menu/menuVulnerabilidad.html.twig');
    }
}
