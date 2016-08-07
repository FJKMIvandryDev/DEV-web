<?php

namespace backBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use \Symfony\Component\HttpFoundation\Response;
use backBundle\Entity\SokajinAsa;

/**
 * Sampana controller.
 *
 * @Route("/admin/sokajinAsa")
 */
class SokajinAsaController extends Controller
{
    
    /**
     * @Route("/{type}", name="sokajy_index")
     * @Method("GET")
     */
    public function indexAction($type)
    {
        $visiteServ = $this->container->get('visiteService');
        $visite = $visiteServ->findAll();
        $sokajyServ = $this->container->get('sokajinAsaService');
        
        $list = $sokajyServ->findAllByType($type);
        
        return $this->render('backBundle:SokajinAsa:index.html.twig', array(
            "type" => $type,
            "list" => $list,
            "visite" => $visite,
        ));
    }
    
    /**
     * @Route("/{type}/ajouter", name="sokajy_add")
     * @Method({"GET", "POST"})
     */
    public function addAction(Request $request, $type)
    {
        $visiteServ = $this->container->get('visiteService');
        $visite = $visiteServ->findAll();
        $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();
        
        if ($request->isMethod('POST'))
        {
            $sokajyServ = $this->container->get('sokajinAsaService');
            
            $sokajyServ->save($request);
            
            return $this->redirectToRoute('sokajy_index', array(
                "type" => $type,
                "visite" => $visite,
            ));
        }
        
        return $this->render('backBundle:SokajinAsa:add.html.twig', array(
            "type" => $type,
            "baseUrl" => $baseurl,
            "visite" => $visite,
        ));
    }
    
    /**
     * @Route("/{type}/modifier/{id}", name="sokajy_update_view")
     * @Method("GET")
     */
    public function updateViewAction(Request $request, $type, $id)
    {
        $visiteServ = $this->container->get('visiteService');
        $visite = $visiteServ->findAll();
        $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();
         
        $sokajyServ = $this->container->get('sokajinAsaService');
        
        $membreServ = $this->container->get('membreBureauService');
        
        $isaServ = $this->container->get('isaService');
        
        $sokajy = $sokajyServ->findById($id);
        
//        var_dump($membreServ->findBySokajinAsaActif($id));
//        die;
        
        $isas = $isaServ->findIsaSokajy($id);
        
        $isa = new \backBundle\Entity\IsaSokajy();
        $isa ->setIsa(0);
        
        if (sizeof($isas) > 0)
        {
            $isa = $isas[0];
        }
        
        return $this->render('backBundle:SokajinAsa:update.html.twig', array(
            "type" => $type,
            "sokajy" => $sokajy,
            "baseUrl" => $baseurl,
            "membreBureau" => $membreServ->findBySokajinAsaActif($id),
            "isa" => $isa,
            "visite" => $visite,
        ));
    }
    
    
    /**
     * @Route("/{type}/modifier", name="sokajy_update")
     * @Method("POST")
     */
    public function updateAction(Request $request, $type)
    {
        $visiteServ = $this->container->get('visiteService');
        $visite = $visiteServ->findAll();
        $sokajyServ = $this->container->get('sokajinAsaService');
        
        $sokajyServ->update($request);
        
        return $this->redirectToRoute('sokajy_index', array(
                "type" => $type,  
                "visite" => $visite,
        ));
    }
    
    
        /**
     * @Route("/{type}/supprimer/{id}", name="sokajy_delete")
     * @Method("GET")
     */
    public function deleteAction($type, $id)
    {
        $visiteServ = $this->container->get('visiteService');
        $visite = $visiteServ->findAll();
        $sokajyServ = $this->container->get('sokajinAsaService');
        
        $sokajyServ->delete($id);
        
        return $this->redirectToRoute('sokajy_index', array(
            "type" => $type,
            "visite" => $visite,
        ));
    }
    

}
