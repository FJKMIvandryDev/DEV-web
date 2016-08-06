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
     * @Route("/rafitra/{type}", name="rafitra_index")
     * @Method("GET")
     */
    public function indexAction(Request $request, $type)
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
        $sampanas = $sokajyServ->findAllByType("$type");
        
        $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();
        
        return $this->render('frontBundle:Rafitra:index.html.twig', array(
            "biraoFiangonana" => $biraoFiangonana,
            "biraoFiangonanaM" => $biraoFiangonanaM,
            "sampanas" => $sampanas,
            "baseUrl" => $baseurl,
            "type" => strtoupper($type),
        ));
    }
    
    /**
     * @Route("/rafitra/sampana/zana-tsampana", name="rafitra_zanany_index")
     * @Method("GET")
     */
    public function indexZananyAction(Request $request)
    {
        $sokajyServ = $this->container->get('sokajinAsaService');
        $zananyServ = $this->container->get('zanaTsampanaService');
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
        
        $sampanas = $zananyServ->findAll();
        
        $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();
        
        return $this->render('frontBundle:Rafitra:index.html.twig', array(
            "biraoFiangonana" => $biraoFiangonana,
            "biraoFiangonanaM" => $biraoFiangonanaM,
            "sampanas" => $sampanas,
            "baseUrl" => $baseurl,
            "type" => "ZANA-TSAMPANA",
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
    
    /**
     * @Route("/rafitra/zana-tsampana/{idSampana}", name="rafitra_zana_tsampana_index")
     * @Method("GET")
     */
    public function zanaTsampanaAction($idSampana)
    {
        $sokajyServ = $this->container->get('zanaTsampanaService');
        $membreServ = $this->container->get('membreBureauService');
        $articleServ = $this->container->get('articleService');
        $isaServ = $this->container->get('isaService');
        
        $sampana = $sokajyServ->findById($idSampana);
        $sampanaM = $membreServ->findByZanaTsampanaActif($idSampana);
        $articles = $articleServ->findZananyNotTsiahyLimit(0, 4, $idSampana);
        
        $isas = $isaServ->findIsaZanany($idSampana);
        
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
