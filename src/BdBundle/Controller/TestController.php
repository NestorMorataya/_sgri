<?php

namespace BdBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ControlBundle\Entity\Control;
use TarealBundle\Entity\Tarea;
class TestController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	$query=$em->createQuery
    	(
    		'SELECT t.nombre, t.id_control, c.dominio, c.objetivo, c.control as control
    		FROM TareaBundle:Entity:Tarea t
    		JOIN ControlBundle:Entity:Control c WITH c.id=t.id'
        );

        print_r($datos);exit;
        $datos=$query->getResult();
        return $this->render('BdBundle:Test:index.html.twig');
    }
}
