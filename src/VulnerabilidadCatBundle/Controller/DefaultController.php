<?php

namespace VulnerabilidadCatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('VulnerabilidadCatBundle:Default:index.html.twig');
    }
}
