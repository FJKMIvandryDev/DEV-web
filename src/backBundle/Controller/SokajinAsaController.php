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
 * @Route("/sokajinAsa")
 */
class SokajinAsaController extends Controller
{
    
    /**
     * @Route("/{type}", name="sokajy_index")
     * @Method("GET")
     */
    public function indexAction($type)
    {
        $sokajyServ = $this->container->get('sokajinAsaService');
        
        $list = $sokajyServ->findAll($type);
        
        return $this->render('backBundle:SokajinAsa:index.html.twig', array(
            "type" => $type,
            "list" => $list,
        ));
    }
    
    /**
     * @Route("/{type}/ajouter", name="sokajy_add")
     * @Method({"GET", "POST"})
     */
    public function addAction(Request $request, $type)
    {
        $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();
        
        if ($request->isMethod('POST'))
        {
            $sokajyServ = $this->container->get('sokajinAsaService');
            
            $sokajyServ->save($request);
            
            return $this->redirectToRoute('sokajy_index', array(
                "type" => $type,
                
            ));
        }
        
        return $this->render('backBundle:SokajinAsa:add.html.twig', array(
            "type" => $type,
            "baseUrl" => $baseurl,
        ));
    }
    
    /**
     * @Route("/{type}/modifier/{id}", name="sokajy_update_view")
     * @Method("GET")
     */
    public function updateViewAction(Request $request, $type, $id)
    {
        $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();
         
        $sokajyServ = $this->container->get('sokajinAsaService');
        
        $sokajy = $sokajyServ->findById($id);
 
        return $this->render('backBundle:SokajinAsa:update.html.twig', array(
            "type" => $type,
            "sokajy" => $sokajy,
            "baseUrl" => $baseurl,
        ));
    }
    
    
    /**
     * @Route("/{type}/modifier", name="sokajy_update")
     * @Method("POST")
     */
    public function updateAction(Request $request, $type)
    {
        $sokajyServ = $this->container->get('sokajinAsaService');
        
        $sokajyServ->update($request);
        
        return $this->redirectToRoute('sokajy_index', array(
                "type" => $type,     
        ));
    }
    
    
        /**
     * @Route("/{type}/supprimer/{id}", name="sokajy_delete")
     * @Method("GET")
     */
    public function deleteAction($type, $id)
    {
        $sokajyServ = $this->container->get('sokajinAsaService');
        
        $sokajyServ->delete($id);
        
        return $this->redirectToRoute('sokajy_index', array(
                "type" => $type,
        ));
    }
    

}
