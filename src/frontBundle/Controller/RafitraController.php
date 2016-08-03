<?php

namespace frontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

/**
 * Article controller.
 *
 * @Route("/front")
 */
class RafitraController extends Controller
{
    /**
     * @Route("/rafitra", name="rafitra_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $sokajyServ = $this->container->get('sokajinAsaService');
        $membreServ = $this->container->get('membreBureauService');
        
        //birao fiangonana
        $biraoFiangonanas = $sokajyServ->findAllByType("biraompiangonana");
        $biraoFiangonana = new \backBundle\Entity\SokajinAsa();
        $biraoFiangonanaM = new \backBundle\Entity\MembreBureau();

        if (sizeof($biraoFiangonanas))
        {
            $biraoFiangonana = $biraoFiangonanas[0];
            $biraoFiangonanaM = $membreServ->findBySokajinAsaActif($biraoFiangonana->getId());
        }
        
        //sampana selon type
        $sampanas = $sokajyServ->findAllByType("sampana");
        
        $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();
        
        return $this->render('frontBundle:Rafitra:index.html.twig', array(
            "biraoFiangonana" => $biraoFiangonana,
            "biraoFiangonanaM" => $biraoFiangonanaM,
            "sampanas" => $sampanas,
            "baseUrl" => $baseurl,
        ));
    }
    
    /**
     * @Route("/rafitra/sampana/{idSampana}", name="rafitra_sampana_index")
     * @Method("GET")
     */
    public function sampanaAction($idSampana)
    {
        $sokajyServ = $this->container->get('sokajinAsaService');
        $membreServ = $this->container->get('membreBureauService');
        $articleServ = $this->container->get('articleService');
        $isaServ = $this->container->get('isaService');
        
        $sampana = $sokajyServ->findById($idSampana);
        $sampanaM = $membreServ->findBySokajinAsaActif($idSampana);
        $articles = $articleServ->findSokajyNotTsiahyLimit(0, 4, $idSampana);
        
        $isas = $isaServ->findIsaSokajy($idSampana);
        
        $isa = new \backBundle\Entity\IsaSokajy();
        $isa ->setIsa(0);
        
        if (sizeof($isas) > 0)
        {
            $isa = $isas[0];
        }
        
        return $this->render('frontBundle:Rafitra:sampanaOnglet.html.twig', array(
            "sampana" => $sampana,
            "sampanaM" => $sampanaM,
            "articles" => $articles,
            "isa" => $isa,
        ));
    }
}
