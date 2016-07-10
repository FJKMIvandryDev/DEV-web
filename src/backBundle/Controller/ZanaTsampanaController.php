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
        $zanaTsampanaServ = $this->container->get('zanaTsampanaService');
        
        $list = $zanaTsampanaServ->findAll();
        
        return $this->render('backBundle:ZanaTsampana:index.html.twig', array(
            "list" => $list,
        ));
    }
    
    /**
     * @Route("/ajouter", name="zana_tsampana_add")
     * @Method({"GET", "POST"})
    */
    public function addAction(Request $request)
    {
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
        ));
    }
    
    /**
     * @Route("/modifier/{id}", name="zana_tsampana_update_view")
     * @Method("GET")
    */
    public function updateViewAction(Request $request, $id)
    {
        $sokajinAsaServ = $this->container->get('SokajinAsaService');
        $reninys = $sokajinAsaServ->findAll("sampana");
        
        $zanaTsampanaServ = $this->container->get('zanaTsampanaService');
        
        $membreServ = $this->container->get('membreBureauService');
        
        $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();
        
        $zanaTsampana = $zanaTsampanaServ->findById($id);
        
        return $this->render('backBundle:ZanaTsampana:update.html.twig', array(
            "zanaTsampana" => $zanaTsampana,
            "baseUrl" => $baseurl,
            "reninys" => $reninys,
            "membreBureau" => $membreServ->findByZanaTsampanaActif($id),
        ));
    }
    
    /**
     * @Route("/modifier", name="zana_tsampana_update")
     * @Method("POST")
    */
    public function updateAction(Request $request)
    {
        $zanaTsampanaServ = $this->container->get('zanaTsampanaService');
        
        $zanaTsampanaServ->update($request);
        
        return $this->redirectToRoute('zana_tsampana_index', array(
            
       ));
    }
    
    /**
     * @Route("/supprimer/{id}", name="zana_tsampana_delete")
     * @Method("GET")
    */
    public function deleteAction($id)
    {
       $zanaTsampanaServ = $this->container->get('zanaTsampanaService');
        
       $zanaTsampanaServ->delete($id);
        
       return $this->redirectToRoute('zana_tsampana_index', array(
       ));
    }
}
