<?php

namespace Apparto\BonobosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Form\Factory\FactoryInterface;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;


class DefaultController extends Controller
{
    public function indexAction()
    {
        
        if( $this->container->get('security.context')->isGranted('ROLE_USER') ){
                            return $this->redirect($this->generateUrl('bonobos_social_page'));
      
}
        
        
        
        
                $formFactory = $this->get('fos_user.registration.form.factory');
  /** @var $formFactory FactoryInterface */
        $formFactory = $this->get('fos_user.registration.form.factory');
        /** @var $userManager UserManagerInterface */
        $userManager = $this->get('fos_user.user_manager');
        /** @var $dispatcher EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');

        $user = $userManager->createUser();
        $user->setEnabled(true);

      

      

        $form = $formFactory->createForm();
        $form->setData($user);


        return $this->render('BonobosBundle:Default:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
