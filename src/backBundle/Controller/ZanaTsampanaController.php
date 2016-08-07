<?php

namespace backBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Article controller.
 *
 * @Route("/admin/zanaTsampana")
 */
class ZanaTsampanaController extends Controller
{
    /**
     * @Route("/", name="zana_tsampana_index")
     * @Method("GET")
    */
    public function indexAction()
    {
        $visiteServ = $this->container->get('visiteService');
        $visite = $visiteServ->findAll();
        $zanaTsampanaServ = $this->container->get('zanaTsampanaService');
        
        $list = $zanaTsampanaServ->findAll();
        
        return $this->render('backBundle:ZanaTsampana:index.html.twig', array(
            "list" => $list,
            "visite" => $visite,
        ));
    }
    
    /**
     * @Route("/ajouter", name="zana_tsampana_add")
     * @Method({"GET", "POST"})
    */
    public function addAction(Request $request)
    {
        $visiteServ = $this->container->get('visiteService');
        $visite = $visiteServ->findAll();
        if ($request->isMethod('POST'))
        {
            $zanaTsampanaServ = $this->container->get('zanaTsampanaService');
            
            $zanaTsampanaServ->save($request);
            
            return $this->redirectToRoute('zana_tsampana_index', array(
                
            ));
        }
        
        $sokajinAsaServ = $this->container->get('SokajinAsaService');
        
        $reninys = $sokajinAsaServ->findAll("sampana");
        
        $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();
        
        return $this->render('backBundle:ZanaTsampana:add.html.twig', array(
            "baseUrl" => $baseurl,
            "reninys" => $reninys,
            "visite" => $visite,
        ));
    }
    
    /**
     * @Route("/modifier/{id}", name="zana_tsampana_update_view")
     * @Method("GET")
    */
    public function updateViewAction(Request $request, $id)
    {
        $visiteServ = $this->container->get('visiteService');
        $visite = $visiteServ->findAll();
        $sokajinAsaServ = $this->container->get('SokajinAsaService');
        $reninys = $sokajinAsaServ->findAll("sampana");
        
        $zanaTsampanaServ = $this->container->get('zanaTsampanaService');
        
        $membreServ = $this->container->get('membreBureauService');
        
        $isaServ = $this->container->get('isaService');
        
        $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();
        
        $zanaTsampana = $zanaTsampanaServ->findById($id);
        
        
        $isas = $isaServ->findIsaZanany($id);
        
        $isa = new \backBundle\Entity\IsaSokajy();
        $isa->setIsa(0);
        
        if (sizeof($isas) > 0)
        {
            $isa = $isas[0];
        }
        
        return $this->render('backBundle:ZanaTsampana:update.html.twig', array(
            "zanaTsampana" => $zanaTsampana,
            "baseUrl" => $baseurl,
            "reninys" => $reninys,
            "membreBureau" => $membreServ->findByZanaTsampanaActif($id),
            "isa" => $isa,
            "visite" => $visite,
        ));
    }
    
    /**
     * @Route("/modifier", name="zana_tsampana_update")
     * @Method("POST")
    */
    public function updateAction(Request $request)
    {
        $visiteServ = $this->container->get('visiteService');
        $visite = $visiteServ->findAll();
        $zanaTsampanaServ = $this->container->get('zanaTsampanaService');
        
        $zanaTsampanaServ->update($request);
        
        return $this->redirectToRoute('zana_tsampana_index', array(
            "visite" => $visite,
       ));
    }
    
    /**
     * @Route("/supprimer/{id}", name="zana_tsampana_delete")
     * @Method("GET")
    */
    public function deleteAction($id)
    {
       $visiteServ = $this->container->get('visiteService');
       $visite = $visiteServ->findAll();
       $zanaTsampanaServ = $this->container->get('zanaTsampanaService');
        
       $zanaTsampanaServ->delete($id);
        
       return $this->redirectToRoute('zana_tsampana_index', array(
           "visite" => $visite,
       ));
    }
}
