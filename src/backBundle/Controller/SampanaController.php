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
 * @Route("/sampana")
 */
class SampanaController extends Controller
{
    
    /**
     * @Route("/", name="sampana_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        
        
        
        return $this->render('backBundle:Sampana:index.html.twig', array(

        ));
    }
    
}
