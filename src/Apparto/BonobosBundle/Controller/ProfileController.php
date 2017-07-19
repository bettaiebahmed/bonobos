<?php

namespace Apparto\BonobosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Apparto\BonobosBundle\Entity\User;
use Apparto\BonobosBundle\Form\modifierUser;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ProfileController extends Controller
{
    /**
     * @Route("/profile")
     */
    public function ModifyAction()
    {
        
        $userContext = $this->get('security.token_storage')->getToken()->getUser();
         $id = $userContext->getId();
       
         $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('BonobosBundle:User')->findBy(array('id' => $id));
        $form = $this->createForm(new modifierUser(), $user);
        $request = $this->get('request_stack')->getCurrentRequest();
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->getRepository('BonobosBundle:User')->modify($id, ($form['age']->getData())
                    , ($form['famille']->getData()), ($form['race']->getData()), ($form['nouriture']->getData()));
            return $this->redirect($this->generateUrl('bonobos_social_page'));
        }
        
        
        
        return $this->render('BonobosBundle:Profile:modify.html.twig',  array('user' => $user, 'form' => $form->createView()
                        // ...
        ));    }
}
