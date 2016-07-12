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
class IndexController extends Controller
{
    /**
     * @Route("/", name="index_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $infoServ = $this->container->get('infoService');
        
        $perikopa = $infoServ->getLastByType("perikopa");
        $vaovao = $infoServ->getLastNews();
        
        return $this->render('frontBundle:Index:index.html.twig', array(
            "vaovao" => $vaovao,
            "perikopa" => $perikopa,
        ));
    }
}
