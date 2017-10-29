<?php

namespace RiesgoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RiesgoBundle:Default:index.html.twig');
    }
}
