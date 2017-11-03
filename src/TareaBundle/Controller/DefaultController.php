<?php

namespace TareaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    /* public function indexAction()
    {
    return $this->render('TareaBundle:Default:index.html.twig');
    }*/
/*
public function createTareaAction()
{
$Control = new Control();
$Control->setName('Main Tareas');

$Tarea = new Tarea();
$Tarea->setName('Foo');
$Tarea->setPrice(19.99);
// relaciona este Tarea con una categoría
$Tarea->setControl($Control);

$em = $this->getDoctrine()->getManager();
$em->persist($Control);
$em->persist($Tarea);
$em->flush();

return new Response(
'Created Tarea id: '.$Tarea->getId()
.' and Control id: '.$Control->getId()
);
}*/

}
