<?php

namespace PlanTratamientoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PlanTratamientoBundle:Default:index.html.twig');
    }
}
