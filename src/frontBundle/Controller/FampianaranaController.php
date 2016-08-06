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
class FampianaranaController extends Controller
{
    /**
     * @Route("/fampianarana", name="fampianarana_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $infoServ = $this->container->get('articleService');
        
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
        
        $isakAlahady = $infoServ->findAllByTypeLimit("toritenyalahady", 0, 8);
        $samihafa = $infoServ->findAllByTypeLimit("fampianarana", 0, 8);
        $toritenyAlahadyCount = $infoServ->getCountByType("toritenyalahady");
        $samihafaCount = $infoServ->getCountByType("fampianarana");
        
        return $this->render('frontBundle:Fampianarana:index.html.twig', array(
            "isakAlahady" => $isakAlahady,
            "samihafa" => $samihafa,
            "toritenyAlahadyCount" => $toritenyAlahadyCount,
            "samihafaCount" => $samihafaCount,
            "isSess" => $isSess,
        ));
    }
}
