<?php

namespace Apparto\BonobosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BonobosBundle:Default:index.html.twig');
    }
}
