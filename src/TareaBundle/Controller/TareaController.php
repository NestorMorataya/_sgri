<?php
namespace TareaBundle\Controller;
use ControlBundle\Entity\Control;
use TareaBundle\Entity\Tarea;
use ProcesoBundle\Entity\Proceso;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
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

    public function index2Action(Request $request)
    {

        $tarea = new Tarea();
        $control = new Control();
        $form = $this->createForm('TareaBundle\Form\TareaType', $tarea);
        $em = $this->getDoctrine()->getManager();
        $controles = $em->getRepository('ControlBundle:Control')->findAll();
        $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()) {
            $tarea = $request->get('tarea');
            $tarea->setControl($control);
            $em = $this->getDoctrine()->getManager();}
            $tareas = $em->getRepository('TareaBundle:Tarea')->findAll();
            return $this->render('tarea/index2.html.twig', array(
            'tareas' => $tareas, 'controles'=> $control, 'form' => $form->createView(),
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
    *
    * @Route("/", name="tarea_menu")
    * @Method("GET")
    */
    public function menuAction()
    {
        return $this->render('menu/menuTarea.twig');
    }

    /**
    *
    * @Route("/tarea/tarea/opcion1", name="asignar_control")
    * @Method("GET")
    */
    public function menuAction1()
    {
          
        return $this->render('tarea/asignarControles.html.twig');
    }

    /**
    *
    * @Route("/tarea/tarea/opcion2", name="tareas_control")
    * @Method("GET")
    */
    public function menuAction2()
    {
        return $this->render('tarea/controlTareas.html.twig');
    }

    /**
    *
    * @Route("/control/control/asignarcontrol/opcion3", name="tabla_control")
    * @Method("GET")
    */
    public function menuAction3() 
    {
        return $this->render('tarea/tablaControles.twig'); 
    }


    /**
     * Finds and displays a tarea entity.
     *
     * @Route("/tarea/{id}", name="tarea_mostrar")
     * @Method("GET")
     */
     public function showAction2(proceso $proceso)
    {
          $tarea = new Tarea();
          $em = $this->getDoctrine()->getManager();
          $tarea = $em->getRepository('TareaBundle:Tarea')->findAll();
      
        return $this->render('tarea/indexAsignarTareas.html.twig', array(
           'proceso' => $proceso, 'tarea' => $tarea,
        
        ));
    }

    
    /**
     * Finds and displays a tarea entity.
     *
     * @Route("/tarea/seguimiento/{id}", name="tarea_seguimiento")
     * @Method("GET")
     */
     public function showAction3(proceso $proceso)
    {
          $tr=new Tarea();
          $em = $this->getDoctrine()->getManager();
          //$pro = $em->getRepository('ProcesoBundle:Proceso')->findAll();
          $tr = $em->getRepository('TareaBundle:Tarea')->findBy(array('proceso' => $proceso->getId()));
      
        return $this->render('tarea/index1.html.twig', array(
           'proceso' => $proceso, 'tarea' =>$tr,
        
        ));
    }



     /**
     * Lists all tarea entities.
     *
     * @Route("/guardar/tarea", name="guardar2")
     * @Method("GET")
     */
    public function guardarAction(Request $request)
    {
       
        $num = 0;
        $contador = $request->get('contador');
        $idproceso=$request->get('proceso');
        for ($i=0; $i < $contador; $i++) { 
            $plan = $request->get('plan'.$num);
            $nom = $request->get('nom'.$num);
            $control = $request->get('cont'.$num);

            $tarea = new tarea();
            $tarea->setProceso($idproceso);
            $tarea->setPlan($plan);
            $tarea->setNombre($nom);
            $tarea->setPlan($control);
            
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($tarea);
            $em->flush();
            $num++;
        }
         return $this->redirectToRoute('proceso_index');
    }
     /**
     * Lists all tarea entities.
     *
     * @Route("/guardar/proceso/control", name="dar_seguimiento")
     * @Method("GET")
     */
     public function darSeguimiento(Request $request){

        $id_plan = $request->get('plann');
       // return new Response($id_plan);
        $contador = $request->get('counter'); //cuantas tareas hay para el control
        $proceso = $request->get('proceso');
        
        for ($i=0; $i < $contador; $i++) {
            $id = $request->get('id'.$i);
            $check = $request->get('check'.$i);

            if ($check == true) {
                 $tarea = new Tarea();
                 $em = $this->getDoctrine()->getManager();
                 $tarea =$em->getRepository('TareaBundle:Tarea')->findOneBy(array('id' => $id));
                 $tarea->setHecha($check);
                 $em->persist($tarea);
                 $em->flush();
            }
            else{
                  $tarea = new Tarea();
                 $em = $this->getDoctrine()->getManager();
                 $tarea =$em->getRepository('TareaBundle:Tarea')->findOneBy(array('id' => $id));
                 $tarea->setHecha(false);
                 $em->persist($tarea);
                 $em->flush();
            }
        }

       return $this->redirectToRoute('actualizar_proceso', array('id' => $proceso, 'plan'=>$id_plan));

     }


     /** 
     * Guardar tareas.
     *
     * @Route("/proceso/tarea/guardar", name="proceso3") 
     * @Method("GET")
     */
     public function guardarAction2(Request $request)
    {
       
        $num = 0;
        $contador = $request->get('contador'); 

        for ($i=0; $i < $contador; $i++) { 
            $proc= new Proceso();
            $idproceso= $request->get('proce'.$num);

            $em=$this->getDoctrine()->getManager();
            $nombre = $request->get('nombr'.$num);
            $proc=$em->getRepository('ProcesoBundle:Proceso')
            ->findOneBy(array('id'=>$idproceso));
            
            $tarea= new Tarea();
            $tarea->setNombre($nombre);
            $tarea->setProceso($proc);
            $tarea->setHecha(false);

            $em->persist($tarea);
            $em->flush();
            $num++;
        }

        return $this->redirectToRoute('plan_tratamiento_index');

    }
     
}

