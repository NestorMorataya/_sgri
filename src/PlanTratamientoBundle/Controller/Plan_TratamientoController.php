<?php
namespace PlanTratamientoBundle\Controller;
use PlanTratamientoBundle\Entity\Plan_Tratamiento;
use RiesgoBundle\Entity\Riesgo;
use ControlBundle\Entity\Control;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
/**
 * Plan_tratamiento controller.
 *
 * @Route("plan_tratamiento")
 */
class Plan_TratamientoController extends Controller
{
    /**
     * Lists all plan_Tratamiento entities.
     *
     * @Route("/", name="plan_tratamiento_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $plan_Tratamientos = $em->getRepository('PlanTratamientoBundle:Plan_Tratamiento')->findAll();
        $riesgo=$em->getRepository('RiesgoBundle:Riesgo')->findAll();
        $activo=$em->getRepository('ActivoBundle:activo')->findAll();
        $amenaza=$em->getRepository('AmenazaBundle:Amenaza')->findAll();
        return $this->render('plan_tratamiento/index.html.twig', array(
            'plan_Tratamientos' => $plan_Tratamientos, 'riesgo'=> $riesgo, 'activo'=> $activo, 'amenaza' => $amenaza
        ));
    }
    /**
     * Lists all plan_Tratamiento entities para un riesgo.
     *
     * @Route("/planes_riesgo/{id}", name="planes_ries")
     * @Method("GET")
     */
    public function indexActionPlanRi(Riesgo $riesgo)
    {
        $em = $this->getDoctrine()->getManager();
        $plan_Tratamientos = $em->getRepository('PlanTratamientoBundle:Plan_Tratamiento')->findBy(array('riesgo'=>$riesgo->getId()));
        $riesgo=$em->getRepository('RiesgoBundle:Riesgo')->findAll();
        $activo=$em->getRepository('ActivoBundle:activo')->findAll();
        $amenaza=$em->getRepository('AmenazaBundle:Amenaza')->findAll();
        return $this->render('plan_tratamiento/indexRiesgo.html.twig', array(
            'plan_Tratamientos' => $plan_Tratamientos, 'riesgo'=> $riesgo, 'activo'=> $activo, 'amenaza' => $amenaza
        ));
    }
    /**
     * Creates a new plan_Tratamiento entity.
     *
     * @Route("/{id}/new", name="plan_tratamiento_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, Riesgo $riesgo)
    {
       // return new Response($riesgo->getId(). " " . $riesgo->getEstimacionRiesgo());
        $plan_Tratamiento = new Plan_tratamiento();
$em = $this->getDoctrine()->getManager();
$todosplanes = $em->getRepository('PlanTratamientoBundle:Plan_Tratamiento')->findOneBy(array('riesgo'=>$riesgo->getId()));
// $ee=$todosplanes->getId();
if($todosplanes == null){
   
 $form = $this->createForm('PlanTratamientoBundle\Form\Plan_TratamientoType', $plan_Tratamiento);
        $form->handleRequest($request);
 // if ($riesgo->getId() == $plan_Tratamiento->getRiesgo()){
        if ($form->isSubmitted() && $form->isValid()) {
            $plan_Tratamiento->setRiesgo($riesgo->getId());
            $em = $this->getDoctrine()->getManager();
            $em->persist($plan_Tratamiento);
            $em->flush();
            return $this->redirectToRoute('user_homepage');
            //return $this->redirectToRoute('plan_tratamiento_show', array('id' => $plan_Tratamiento->getId()));
        }
        
        return $this->render('plan_tratamiento/new.html.twig', array(
            'plan_Tratamiento' => $plan_Tratamiento, 'riesgo'=>$riesgo,'todosplanes'=>$todosplanes,
            'form' => $form->createView(),
        ));
    } else{
        return $this->redirectToRoute('planes_ries', array('id'=>$riesgo->getId()));
    }
         
    }
    /**
     * Finds and displays a plan_Tratamiento entity.
     *
     * @Route("/{id}", name="plan_tratamiento_show")
     * @Method("GET")
     */
    public function showAction(Plan_Tratamiento $plan_Tratamiento)
    {
        $deleteForm = $this->createDeleteForm($plan_Tratamiento);
        return $this->render('plan_tratamiento/show.html.twig', array(
            'plan_Tratamiento' => $plan_Tratamiento,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Displays a form to edit an existing plan_Tratamiento entity.
     *
     * @Route("/{id}/edit", name="plan_tratamiento_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Plan_Tratamiento $plan_Tratamiento)
    {
        $deleteForm = $this->createDeleteForm($plan_Tratamiento);
        $editForm = $this->createForm('PlanTratamientoBundle\Form\Plan_TratamientoType', $plan_Tratamiento);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('plan_tratamiento_edit', array('id' => $plan_Tratamiento->getId()));
        }
        return $this->render('plan_tratamiento/edit.html.twig', array(
            'plan_Tratamiento' => $plan_Tratamiento,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a plan_Tratamiento entity.
     *
     * @Route("/{id}", name="plan_tratamiento_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Plan_Tratamiento $plan_Tratamiento)
    {
        $form = $this->createDeleteForm($plan_Tratamiento);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($plan_Tratamiento);
            $em->flush();
        }
        return $this->redirectToRoute('plan_tratamiento_index');
    }
    /**
     * Creates a form to delete a plan_Tratamiento entity.
     *
     * @param Plan_Tratamiento $plan_Tratamiento The plan_Tratamiento entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Plan_Tratamiento $plan_Tratamiento)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('plan_tratamiento_delete', array('id' => $plan_Tratamiento->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
  /**
     * Finds and displays a Plan_Tratamiento entity.
     *
     * @Route("/plan/{id}", name="asignar_controles")
     * @Method("GET")
     */
    public function showAction2(Plan_Tratamiento $plan_Tratamiento)
    {
       
        $rie= new Riesgo();
          $cont = new Control();
        
          $em = $this->getDoctrine()->getManager();
         $rie = $em->getRepository('RiesgoBundle:Riesgo')->findOneBy(array('id'=> $plan_Tratamiento->getRiesgo()));
  // return new Response($rie->getId());
         $cont = $em->getRepository('ControlBundle:Control')->findAll();
        return $this->render('proceso/indexProceso.html.twig', array(
        'control'=>$cont, 'plan_Tratamiento'=>$plan_Tratamiento, 'rie'=>$rie,
       
        ));
    }
    
    /**
     * Lists all plan entities.
     *
     * @Route("/control/menuPlan", name="menu_plan_tratamiento")
     * @Method("GET")
     */
    public function menuAction()
    {
        return $this->render('menu/menuPlan.html.twig');
    }
}