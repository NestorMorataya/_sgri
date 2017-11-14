<?php

namespace UserBundle\Controller;

use UserBundle\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use EmpresaBundle\Entity\Empresa;
use Symfony\Component\HttpFoundation\Response;

/**
 * Usuario controller.
 *
 * @Route("usuario")
 */
class UsuarioController extends Controller
{
    
    /**
     * Pantalla de inicio del sistema
     *
     * @Route("/home", name="user_homepage")
     * @Method("GET")
     */

    public function homeAction()
    {
        return $this->render('home/home.html.twig');
    }
    /**
     * Lists all usuario entities.
     *
     * @Route("/index", name="usuario_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $usuarios = $em->getRepository('UserBundle:Usuario')->findAll();

        return $this->render('usuario/index.html.twig', array(
            'usuarios' => $usuarios,
        ));
    }

    /**
     * Creates a new usuario entity.
     *
     * @Route("/new", name="usuario_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $usuario = new Usuario();
        $form = $this->createForm('UserBundle\Form\UsuarioType', $usuario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $password = $form ->get('password')->getData();

            $encoder = $this->container->get('security.password_encoder');
            $encoded = $encoder->encodePassword($usuario,$password);
            $usuario->setPassword($encoded);

$role=$request->get('role');
//return new Response($role);
$usuario->setRole($role);
            $em = $this->getDoctrine()->getManager();

            $emp = $em->getRepository('EmpresaBundle:Empresa')->findOneBy(array(),array('id' => 'DESC'));

            //return new Response($emp->getId());
            $usuario->setEmpresa($emp->getId());

            $em->persist($usuario);
            $em->flush();

            return $this->redirectToRoute('user_login');
        }

        return $this->render('usuario/new.html.twig', array(
            'usuario' => $usuario, 'role',
            'form' => $form->createView(),
        ));
    }




     /**
     * Creates a new usuario entity.
     *
     * @Route("/new2", name="usuario_new2")
     * @Method({"GET", "POST"})
     */
    public function newAction2(Request $request)
    {
// return new Response('<html><body>Hello booo</body></html>');
        $usuario = new Usuario();
    $user = $this->getUser();

        $form = $this->createForm('UserBundle\Form\UsuarioType', $usuario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

$role=$request->get('role');
//return new Response($role);
$usuario->setRole($role);

            $password = $form ->get('password')->getData();

            $encoder = $this->container->get('security.password_encoder');
            $encoded = $encoder->encodePassword($usuario,$password);
            $usuario->setPassword($encoded);
    $usuario->setEmpresa($user->getEmpresa());
    // $usuario->setEmpresa($emp->getId());

  
            $em = $this->getDoctrine()->getManager();



            $em->persist($usuario);
            $em->flush();

          //  return $this->redirectToRoute('user_login');
        }

        return $this->render('usuario/newusu.html.twig', array(
            'usuario' => $usuario,
            'form' => $form->createView(),

  
        ));
    }



 /**
     * Finds and displays a usuario entity.
     *
     * @Route("/{id}", name="usuario_show")
     * @Method("GET")
     */

    public function showAction(Usuario $usuario)
    {
        $deleteForm = $this->createDeleteForm($usuario);

        return $this->render('usuario/show.html.twig', array(
            'usuario' => $usuario,
            'delete_form' => $deleteForm->createView(),
        ));
    }

   

    /**
     * Displays a form to edit an existing usuario entity.
     *
     * @Route("/{id}/edit", name="usuario_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Usuario $usu)
    {   

       // $id = $request->get('id');
        return new Response($usu->getId(). " " .$usu->getUsername(). " " . $usu->getFirstName());


        $deleteForm = $this->createDeleteForm($usuario);
        $editForm = $this->createForm('UserBundle\Form\UsuarioType', $usuario);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('usuario_edit', array('id' => $usuario->getId()));
        }

        return $this->render('usuario/edit.html.twig', array(
            'usuario' => $usuario,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a usuario entity.
     *
     * @Route("/{id}", name="usuario_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Usuario $usuario)
    {
        $form = $this->createDeleteForm($usuario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($usuario);
            $em->flush();
        }

        return $this->redirectToRoute('usuario_index');
    }

    /**
     * Creates a form to delete a usuario entity.
     *
     * @param Usuario $usuario The usuario entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Usuario $usuario)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('usuario_delete', array('id' => $usuario->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
