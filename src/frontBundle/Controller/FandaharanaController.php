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
class FandaharanaController extends Controller
{
    /**
     * @Route("/fandaharana", name="fandaharana_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $infoServ = $this->container->get('infoService');
        
        $fandaharana = $infoServ->getLastByType("fandaharana ");
        $fivoriana = $infoServ->getLastByType("fivoriana");
        $filazanamanjo = $infoServ->getLastByType("filazanamanjo");
        $famangiana = $infoServ->getLastByType("famangiana");
        $filazanasamihafa = $infoServ->getLastByType("filazanasamihafa");
        $tatitra = $infoServ->getLastByType("tatitra");
        
        return $this->render('frontBundle:Fandaharana:index.html.twig', array(
            "fivoriana" => $fivoriana,
            "filazanaManjo" => $filazanamanjo,
            "famangiana" => $famangiana,
            "filazanaSamihafa" => $filazanasamihafa,
            "tatitra" => $tatitra,
            "fandaharana" => $fandaharana,

        ));
    }
}
