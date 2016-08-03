<?php

namespace frontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Article controller.
 *
 * @Route("/front")
 */
class TsiahyController extends Controller
{
    /**
     * @Route("/tsiahy", name="tsiahy_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        
        return $this->render('frontBundle:Tsiahy:index.html.twig', array(
        ));
    }
}
