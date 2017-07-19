<?php

namespace Apparto\BonobosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SocialController extends Controller
{
    public function indexAction()
    {
         return $this->render('BonobosBundle:Social:index.html.twig');
    }
    
}
