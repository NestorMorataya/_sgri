<?php

namespace CategoriaPlanBundle\Controller;

use CategoriaPlanBundle\Entity\Categoria_Plan;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Categoria_plan controller.
 *
 * @Route("categoria_plan")
 */
class Categoria_PlanController extends Controller
{
    /**
     * Lists all categoria_Plan entities.
     *
     * @Route("/index", name="categoria_plan_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categoria_Plans = $em->getRepository('CategoriaPlanBundle:Categoria_Plan')->findAll();

        return $this->render('categoria_plan/index.html.twig', array(
            'categoria_Plans' => $categoria_Plans,
        ));
    }

    /**
     * Creates a new categoria_Plan entity.
     *
     * @Route("/new", name="categoria_plan_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $categoria_Plan = new Categoria_plan();
        $form = $this->createForm('CategoriaPlanBundle\Form\Categoria_PlanType', $categoria_Plan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categoria_Plan);
            $em->flush();

            return $this->redirectToRoute('categoria_plan_show', array('id' => $categoria_Plan->getId()));
        }

        return $this->render('categoria_plan/new.html.twig', array(
            'categoria_Plan' => $categoria_Plan,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a categoria_Plan entity.
     *
     * @Route("/{id}", name="categoria_plan_show")
     * @Method("GET")
     */
    public function showAction(Categoria_Plan $categoria_Plan)
    {
        $deleteForm = $this->createDeleteForm($categoria_Plan);

        return $this->render('categoria_plan/show.html.twig', array(
            'categoria_Plan' => $categoria_Plan,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing categoria_Plan entity.
     *
     * @Route("/{id}/edit", name="categoria_plan_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Categoria_Plan $categoria_Plan)
    {
        $deleteForm = $this->createDeleteForm($categoria_Plan);
        $editForm = $this->createForm('CategoriaPlanBundle\Form\Categoria_PlanType', $categoria_Plan);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categoria_plan_edit', array('id' => $categoria_Plan->getId()));
        }

        return $this->render('categoria_plan/edit.html.twig', array(
            'categoria_Plan' => $categoria_Plan,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a categoria_Plan entity.
     *
     * @Route("/{id}", name="categoria_plan_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Categoria_Plan $categoria_Plan)
    {
        $form = $this->createDeleteForm($categoria_Plan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($categoria_Plan);
            $em->flush();
        }

        return $this->redirectToRoute('categoria_plan_index');
    }

    /**
     * Creates a form to delete a categoria_Plan entity.
     *
     * @param Categoria_Plan $categoria_Plan The categoria_Plan entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Categoria_Plan $categoria_Plan)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('categoria_plan_delete', array('id' => $categoria_Plan->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Lists all categoria entities.
     *
     * @Route("/control/menuPlan/menuCatPlan", name="menu_cat_plan")
     * @Method("GET")
     */
 public function menuAction()
    {
        return $this->render('menu/menuCatPlan.html.twig');
    }
}
