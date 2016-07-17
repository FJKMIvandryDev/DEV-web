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
     * @Route("/rafitra/{idSampana}", name="rafitra_index")
     * @Method("GET")
     */
    public function indexAction(Request $request, $idSampana)
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
        $sampana = $sokajyServ->findById($idSampana);
        $sampanaM = $membreServ->findBySokajinAsaActif($idSampana);
        
        $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();
        
        return $this->render('frontBundle:Rafitra:index.html.twig', array(
            "biraoFiangonana" => $biraoFiangonana,
            "biraoFiangonanaM" => $biraoFiangonanaM,
            "sampana" => $sampana,
            "sampanaM" => $sampanaM,
            "sampanas" => $sampanas,
            "baseUrl" => $baseurl,
            "id" => $idSampana,
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
        
        $sampana = $sokajyServ->findById($idSampana);
        $sampanaM = $membreServ->findBySokajinAsaActif($idSampana);
        $articles = $articleServ->findSokajyNotTsiahyLimit(0, 4, $idSampana);
        
        return $this->render('frontBundle:Rafitra:sampanaOnglet.html.twig', array(
            "sampana" => $sampana,
            "sampanaM" => $sampanaM,
            "articles" => $articles,
            
        ));
    }
}
