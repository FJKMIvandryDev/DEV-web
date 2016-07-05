<?php

namespace backBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Info controller.
 *
 * @Route("/admin/info")
 */
class InfoController extends Controller
{
    
    /**
     * @Route("/{type}", name="info_index")
     * @Method("GET")
     */
    public function indexAction($type)
    {      
        $infoServ = $this->container->get('infoService');

        $infos = $infoServ->findAllByType($type);
        
        return $this->render('backBundle:info:index.html.twig', array(
            'infos' => $infos,
            "type" => $type,
        ));
    }
    
    /**
     * @Route("/{type}/ajouter", name="info_add")
     * @Method({"GET", "POST"})
     */
    public function saveAction(Request $request, $type)
    {
//        ajouter dans me form : enctype="multipart/form-data"
//        
//        if ($request->getMethod() == 'POST')
//        {
//            $image = $request->files->get("fileToUpload");
//            
//            $fileName = $this->container->get('imageUploader')->upload($image);
//            
////            $image->move($this->container->getParameter('uploadDirectory'), "test.jpg");
//            
//        }

        if ($request->isMethod('POST')) 
        {
            $infoServ = $this->container->get('infoService');
            
            $infoServ->save($request);
            
            return $this->redirectToRoute('info_index', array(
                "type" => $type,
            ));
        }

        return $this->render('backBundle:Info:add.html.twig', array(
            "type" => $type,
        ));
    }

    
    /**
     * @Route("/{type}/supprimer/{id}", name="info_delete")
     * @Method("GET")
     */
    public function deleteAction($type, $id)
    {
        $infoServ = $this->container->get('infoService');
        
        $infoServ->delete($id);
        
        return $this->redirectToRoute('info_index', array(
            "type" => $type,
        ));
    }

    
    /**
     * @Route("/{type}/modifier/{id}", name="info_update_view")
     * @Method({"GET", "POST"})
     */
    public function updateViewAction($type, $id)
    {
        $infoServ = $this->container->get('infoService');
        $info = $infoServ->findById($id);   
        
        
        return $this->render('backBundle:Info:update.html.twig', array(
            "info" => $info,
            "type" => $type,
        ));
    }
    
    
    /**
     * @Route("/{type}/modifier", name="info_update")
     * @Method("POST")
     */
    public function updateAction(Request $request, $type)
    {
         $infoServ = $this->container->get('infoService');
        
        $infoServ->update($request);
        
        return $this->redirectToRoute('info_index', array(
            "type" => $type,
        ));
    }
    
//    /**
//     * @Route("/testAPI", name="testAPI")
//     * @Method({"GET", "POST"})
//     */
//    public function testAPI(Request $request)
//    {
//        $infoServ = $this->container->get('infoService');
//        $infos = $infoServ->findAll();
//        
//        $infoFact = array();
//
//        foreach ($infos as &$value) 
//        {        
//            $infoFact[] = new \backBundle\DataTable\InfoFactory($value);
//        }
//        
//        $data = new \backBundle\DataTable\DTresponse();
//        
//        $data->setDraw(1);
//        $data->setRecordsFiltered(10);
//        $data->setRecordsTotal(10);
//        $data->setData($infoFact);
//        
//        $serializer = $this->get('serializer');
//        
//        $jsonContent = $serializer->serialize($data, 'json');
//        
//        $response = new Response($jsonContent);
//        $response->headers->set('Content-Type', 'application/json');
//        
//        return $response;
//    }
//    
//    /**
//     * @Route("/test", name="test")
//     * @Method({"GET", "POST"})
//     */
//    public function test(Request $request)
//    {
//        $i = new Type_info();
//        $i->setId(3);
//        $i->setLibelle("m");
//        
//        $serializer = $this->get('serializer');
//        
//        $jsonContent = $serializer->serialize($i, 'json');
//        
//        return $this->render('backBundle:Info:test.html.twig', array());
//    }
}
