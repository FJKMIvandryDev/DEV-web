<?php

namespace frontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Session\Session;
/**
 * Article controller.
 *
 * @Route("")
 */
class FifandraisanaController extends Controller
{
    /**
     * @Route("/fifandraisana", name="fifandraisana_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $visiteServ = $this->container->get('visiteService');
        $session = new Session();
        $session->start();
        
        $sess =$session->get('sess');
        $isSess = 1;
        
        if ($sess == null)
        {
            $session->set("sess", "sess");
            $visiteServ->addVisite();
            $isSess = 0;
        }
        
        return $this->render('frontBundle:Fifandraisana:index.html.twig', array(
            "isSess" => $isSess,
        ));
    }
}
