<?php

namespace AmenazaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AmenazaBundle:Default:index.html.twig');
    }
}
