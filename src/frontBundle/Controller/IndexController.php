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
        $lohahevitras = $infoServ->getLohahevitra();
        $lohahevitra = new \backBundle\Entity\Info();
        
        if (sizeof($lohahevitras) > 0)
        {
            $lohahevitra = $lohahevitras[0];
        }
        
        return $this->render('frontBundle:Index:index.html.twig', array(
            "vaovao" => $vaovao,
            "perikopa" => $perikopa,
            "lohahevitra" => $lohahevitra,
        ));
    }
}
