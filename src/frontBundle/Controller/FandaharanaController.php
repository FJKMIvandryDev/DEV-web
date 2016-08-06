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
class FandaharanaController extends Controller
{
    /**
     * @Route("/fandaharana", name="fandaharana_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $infoServ = $this->container->get('infoService');
        
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
            "isSess" => $isSess,
        ));
    }
}
