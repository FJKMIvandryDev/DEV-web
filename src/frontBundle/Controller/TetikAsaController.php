<?php

namespace frontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Article controller.
 *
 * @Route("")
 */
class TetikAsaController extends Controller
{
    
    /**
     * @Route("/tetik-asa", name="tetik_asa_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $articleServ = $this->container->get('articleService');
        
        $ivelany = $articleServ->findAllByTypeLimit("tetikasaivelany", 0, 6);
        $anatiny = $articleServ->findAllByTypeLimit("tetikasaanatiny", 0, 6);
        
        return $this->render('frontBundle:TetikAsa:index.html.twig', array(
            "ivelany" => $ivelany,
            "anatiny" => $anatiny,
        ));
    }
}
