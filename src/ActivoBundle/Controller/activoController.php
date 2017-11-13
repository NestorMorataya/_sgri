<?php

namespace ActivoBundle\Controller;

use ActivoBundle\Entity\activo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use CategoriaBundle\Entity\categoria;
use Symfony\Component\HttpFoundation\Response;

/**
 * Activo controller.
 *
 * @Route("activo")
 */
class activoController extends Controller
{
    /**
     * Lists all activo entities.
     *
     * @Route("/index", name="activo_index")
     * @Method("GET")
     */
    public function indexAction()
    {

        $user = $this->getUser(); //Devuelve el usario que esta en sesion
        $em = $this->getDoctrine()->getManager();


        $activos = $em->getRepository('ActivoBundle:activo')->findBy(array('empresaId' => $user->getEmpresa())); //Filtramos los activos en base al empresa Id

        return $this->render('activo/index.html.twig', array(
            'activos' => $activos,
        ));
    }

    public function index2Action()
    {

        $user = $this->getUser(); //Devuelve el usario que esta en sesion
        $em = $this->getDoctrine()->getManager();


        $activos = $em->getRepository('ActivoBundle:activo')->findBy(array('empresaId' => $user->getEmpresa())); //Filtramos los activos en base al empresa Id

        return $this->render('activo/index2.html.twig', array(
            'activos' => $activos,
        ));
    }

    /**
     * Creates a new activo entity.
     *
     * @Route("/new", name="activo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $activo = new Activo();
        $cat = new Categoria();
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $cat = $em->getRepository('CategoriaBundle:categoria')->findAll();

        $form = $this->createForm('ActivoBundle\Form\activoType', $activo );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categoria = $request->get('categoria');
            $activo->setCategoria($categoria);
            $activo->setEmpresa($user->getEmpresa());
            $em = $this->getDoctrine()->getManager();
            $em->persist($activo);
            $em->flush();

            return $this->redirectToRoute('activo_index');
        }

        return $this->render('activo/new.html.twig', array(
            'activo' => $activo,
            'form' => $form->createView(),
            'categoria' => $cat
        ));
    }

    /**
     * Finds and displays a activo entity.
     *
     * @Route("/{id}", name="activo_show")
     * @Method("GET")
     */
    public function showAction(activo $activo)
    {
        $deleteForm = $this->createDeleteForm($activo);

        return $this->render('activo/show.html.twig', array(
            'activo' => $activo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing activo entity.
     *
     * @Route("/{id}/edit", name="activo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, activo $activo)
    {
        $deleteForm = $this->createDeleteForm($activo);
        $editForm = $this->createForm('ActivoBundle\Form\activoType', $activo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('activo_edit', array('id' => $activo->getId()));
        }

        return $this->render('activo/edit.html.twig', array(
            'activo' => $activo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a activo entity.
     *
     * @Route("/{id}", name="activo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, activo $activo)
    {
        $form = $this->createDeleteForm($activo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($activo);
            $em->flush();
        }

        return $this->redirectToRoute('activo_index');
    }

    /**
     * Creates a form to delete a activo entity.
     *
     * @param activo $activo The activo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(activo $activo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('activo_delete', array('id' => $activo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
       /**
     * Lists all activo entities.
     *
     * @Route("/", name="menu_activo")
     * @Method("GET")
     */
 public function menuAction()
    {
        return $this->render('menu/menu.html.twig');
    }
}
