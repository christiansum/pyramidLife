<?php

namespace PylifeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PylifeBundle:Default:index.html.twig');
    }
}
