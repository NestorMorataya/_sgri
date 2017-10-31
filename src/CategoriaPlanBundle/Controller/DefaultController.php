<?php

namespace CategoriaPlanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CategoriaPlanBundle:Default:index.html.twig');
    }
}
