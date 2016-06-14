<?php

namespace backBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use \Symfony\Component\HttpFoundation\Response;

/**
 * Sampana controller.
 *
 * @Route("/sokajinAsa")
 */
class SokajinAsaController extends Controller
{
    
    /**
     * @Route("/{type}", name="sampana_index")
     * @Method("GET")
     */
    public function indexAction($type)
    {
        
        
        
        return $this->render('backBundle:SokajinAsa:index.html.twig', array(
            "type" => $type,
        ));
    }
    
}
