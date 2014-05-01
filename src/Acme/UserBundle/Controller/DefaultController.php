<?php

namespace Acme\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Acme\UserBundle\Entity\User;
use Symfony\Component\Security\Core\SecurityContext;
use Acme\UserBundle\Entity\Role;
use Acme\UserBundle\Form\FormUser;

class DefaultController extends Controller
{
    
    
    
    public function indexAction(Request $request)
    {
	$user = new User();
	$form = $this->createForm(new FormUser(), $user);
	
	
	$form->handleRequest($request);
 
	// If form is valid and has been sent from user, it's true
        if ($form->isValid()){
	    
            // Array data form
            $data = $form->getData();
	    
	    // Signup user with form data
            $this->registro();
            return $this->redirect($this->generateUrl('acme_home'));
	    
        }
	
	
	
	
	
	
	$session = $request->getSession();
        
        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR
            );
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }
 
        return $this->render(
            'AcmeUserBundle:Default:index.html.twig',
            array(
                // last username entered by the user
                'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                'error'         => $error,     
		'form'		=> $form->createView()
            )
        );
	
    }
    
    public function registro()
    {
	
	/*
	 *  ROLES DE LA APP
	 * 
	 * INSERT INTO acme_role (role) values ('ROLE_ADMIN'),('ROLE_USER'),('ROLE_TEACHER');
	 * 
	*/
	
	$role = $this->getDoctrine()->getRepository('AcmeUserBundle:Role')->findOneByRole('ROLE_USER');
	$user = new User();
	
	
	$factory = $this->get('security.encoder_factory');
	$encoder = $factory->getEncoder($user); 
	
	$user->setSalt(md5(time()));
	
	$pass = $encoder->encodePassword('emilio', $user->getSalt()); 
	
	$user->setUsername('emilio');
	$user->setPassword($pass);
	$user->setEmail('emilio@correo.es');
	$user->addRoles($role);
	
	
	
	
	
	
	$em = $this->getDoctrine()->getManager();
	$em->persist($user);
	$em->flush();
	
	
        return $this->redirect($this->generateUrl('acme_home'));
    }
    
    public function validadoAction()
    {
        return new \Symfony\Component\HttpFoundation\Response("<html><head><title>ENHORABUENA</title></head><body>USUARIO VALIDADO</body></html>");
    }
    
    
    
}
