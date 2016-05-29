<?php

namespace backBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InfoController extends Controller
{
    public function listAction()
    {
        $serv = $this->container->get('testService');
        
        return $this->render('backBundle:Info:list.html.twig', array(
            "param" => $serv->test(),
        ));
    }

    public function addAction()
    {
        return $this->render('backBundle:Info:add.html.twig', array(
            // ...
        ));
    }

    public function updateAction()
    {
        return $this->render('backBundle:Info:update.html.twig', array(
            // ...
        ));
    }

    public function deleteAction()
    {
        return $this->render('backBundle:Info:delete.html.twig', array(
            // ...
        ));
    }

}
