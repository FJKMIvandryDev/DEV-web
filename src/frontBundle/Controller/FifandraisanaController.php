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
class FifandraisanaController extends Controller
{
    /**
     * @Route("/fifandraisana", name="fifandraisana_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        return $this->render('frontBundle:Fifandraisana:index.html.twig', array(
        ));
    }
}
