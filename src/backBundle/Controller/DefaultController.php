<?php

namespace backBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $visiteServ = $this->container->get('visiteService');
        $visite = $visiteServ->findAll();
        
        return $this->redirectToRoute('info_index', array(
            "type" => "filazanasamihafa",
            "visite" => $visite,
        ));
    }
}
