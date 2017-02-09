<?php

namespace frontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
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
    public function indexAction(Request $request)
    {
        $articleServ = $this->container->get('articleService');
        
        $toritenyCP = $request->query->get('toritenyCP');
        $samyhafaCP = $request->query->get('samyhafaCP');

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
        
        $isakAlahady = $articleServ->findAllByTypeLimit("toritenyalahady", ($toritenyCP-1)*8, 8);
        $samihafa = $articleServ->findAllByTypeLimit("fampianarana", ($samyhafaCP-1)*8, 8);
        $toritenyAlahadyCount = $articleServ->getCountByType("toritenyalahady");
        $samihafaCount = $articleServ->getCountByType("fampianarana");
        
        $pageToriteny = $toritenyAlahadyCount[0][1]/8;
        $pageSamihafa = $samihafaCount[0][1]/8;
        
        return $this->render('frontBundle:Fampianarana:index.html.twig', array(
            "isakAlahady" => $isakAlahady,
            "samihafa" => $samihafa,
            "toritenyAlahadyCount" => sizeof($isakAlahady) ,
            "samihafaCount" => sizeof($samihafa),
            "totalPageToriteny" => ceil($pageToriteny),
            "totalPageSamihafa" => ceil($pageSamihafa),
            "toritenyCP" => $toritenyCP,
            "samihafaCP" => $samyhafaCP,
            "isSess" => $isSess,
        ));
    }
}
