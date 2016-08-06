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
class IndexController extends Controller
{
    
    /**
     * @Route("/", name="index_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $infoServ = $this->container->get('infoService');
        $articleServ = $this->container->get('articleService');
        
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

        $perikopa = $infoServ->getLastByType("perikopa");
        $vaovao = $infoServ->getLastNews();
        $lohahevitra = $infoServ->getLohahevitra();
        $zioga = $infoServ->getLastOneInfoByType('zioga');
        $vanimpotoana = $infoServ->getLastOneInfoByType('vanimpotoana');
        
        $toriteny = $articleServ->findAllByTypeLimit("toritenyalahady ", 0, 1);
        if (sizeof($toriteny)>0)
        {
            $toriteny = $toriteny[0];
        }
        else
        {
            $toriteny = null;
        }
        
        $isamBolana = $articleServ->findAllByTypeLimit("fampianaranaisambolana  ", 0, 1);
        if (sizeof($isamBolana)>0)
        {
            $isamBolana = $isamBolana[0];
        }
        else
        {
            $isamBolana = null;
        }
        
        $sekolyAlahady = $articleServ->findAllByTypeLimit("dimyminitra  ", 0, 1);
        if (sizeof($sekolyAlahady)>0)
        {
            $sekolyAlahady = $sekolyAlahady[0];
        }
        else
        {
            $sekolyAlahady = null;
        }
        
        $samihafa = $articleServ->findSamyHafaLimit(0, 1);
        if (sizeof($samihafa)>0)
        {
            $samihafa = $samihafa[0];
        }
        else
        {
            $samihafa = null;
        }
        
        return $this->render('frontBundle:Index:index.html.twig', array(
            "vaovao" => $vaovao,
            "perikopa" => $perikopa,
            "lohahevitra" => $lohahevitra,
            "zioga" => $zioga,
            "vanimpotoana" => $vanimpotoana,
            "toriteny" => $toriteny,
            "isambolana" => $isamBolana,
            "dimy" => $sekolyAlahady,
            "samihafa" => $samihafa,
            "isSess" => $isSess,
        ));
    }
}
