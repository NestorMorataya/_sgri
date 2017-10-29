<?php

namespace AmenazaCatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AmenazaCatBundle:Default:index.html.twig');
    }
}
