<?php

namespace PylifeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MisComprasController extends Controller
{
    public function indexAction()
    {
        return $this->render('PylifeBundle:MisCompras:index.html.twig', array(
            // ...
        ));
    }

    public function newAction()
    {
        return $this->render('PylifeBundle:MisCompras:new.html.twig', array(
            // ...
        ));
    }

}
