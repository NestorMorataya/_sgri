<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Core\SecurityContext;

class SecurityController extends Controller
{
	public function loginAction()
	{
		$authenticationUtils = $this->get('security.authentication_utils');
		$error = $authenticationUtils->getLastAuthenticationError();
		$lastUsername = $authenticationUtils->getLastUsername();//si usu se autentica de manera eeronea este recupera el ultimo nombre de usu qe se soloco en el formulario
	
		return $this->render('UserBundle:Security:login.html.twig', array('last_username'=>$lastUsername,'error'=> $error));
	}

	public function loginCheckAction(){

	}
}
