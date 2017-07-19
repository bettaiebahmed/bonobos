<?php

namespace Apparto\BonobosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SocialController extends Controller
{
    public function indexAction()
    { 
          $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('BonobosBundle:User')->findAll();
         return $this->render('BonobosBundle:Social:index.html.twig',array('users' => $users));
    }
    public function addFriendAction($id)
    {
              $em = $this->getDoctrine()->getManager();
              $userToAdd = $em->getRepository('BonobosBundle:User')->findOneBy(array('id' => $id));
              
               $userContext = $this->get('security.token_storage')->getToken()->getUser();
               $currentUserid = $userContext->getId();
               $currentUser = $em->getRepository('BonobosBundle:User')->findOneBy(array('id' => $currentUserid));

               $currentUser->setAmis($userToAdd);
               $em->persist($currentUser);
                $em->flush();


                
              
              
return $this->redirect($this->generateUrl('bonobos_social_page'));
    }
    public function deleteFriendAction($id)
    {
              $em = $this->getDoctrine()->getManager();
              $userToAdd = $em->getRepository('BonobosBundle:User')->findOneBy(array('id' => $id));
              
               $userContext = $this->get('security.token_storage')->getToken()->getUser();
               $currentUserid = $userContext->getId();
               $currentUser = $em->getRepository('BonobosBundle:User')->findOneBy(array('id' => $currentUserid));

               $currentUser->deleteAmis($userToAdd);
               $em->persist($currentUser);
                $em->flush();


                
              
              
return $this->redirect($this->generateUrl('bonobos_social_page'));
    }
    
}
