<?php

namespace backBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use backBundle\Entity\Info;
use backBundle\Entity\Type_info;
use backBundle\Form\InfoType;

/**
 * Info controller.
 *
 * @Route("/info")
 */
class InfoController extends Controller
{
    
    /**
     * @Route("/", name="info_index")
     * @Method("GET")
     */
    public function indexAction()
    {      
        $typeInfoServ = $this->container->get('typeInfoService');
        $infoServ = $this->container->get('infoService');
        
        $typeInfo = $typeInfoServ->findAll();
        
        if (count($typeInfo) <= 0)
        {
            $typeInfoServ->save("Fiantsoana");
            $typeInfoServ->save("Fahoriana");
        }
        
        $infos = $infoServ->findAll();
        
        return $this->render('backBundle:Info:index.html.twig', array(
            'infos' => $infos,
        ));
    }
    
    /**
     * @Route("/ajouter", name="info_add")
     * @Method({"GET", "POST"})
     */
    public function saveAction(Request $request)
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
        $typeInfoServ = $this->container->get('typeInfoService');
        $infoServ = $this->container->get('infoService');
        
        $typeInfo = $typeInfoServ->findAll();
        
        $info = new Info();
        $form = $this->createForm('backBundle\Form\InfoType', $info);
        $form->handleRequest($request);

        if ($form->isSubmitted()) 
        {
            $info->setDate(new \DateTime($request->request->get("info")["date"]));
            $info->setType($typeInfoServ->find($info->getTypeId()));
            
            $infoServ->save($info);
            
            return $this->redirectToRoute('info_index');
        }

        return $this->render('backBundle:Info:add.html.twig', array(
            "types" => $typeInfo,
        ));
    }

    
    /**
     * @Route("/{id}/supprimer", name="info_delete")
     * @Method("GET")
     */
    public function deleteAction($id)
    {
        $infoServ = $this->container->get('infoService');
        
        $infoServ->delete($id);
        
        return $this->redirectToRoute('info_index');
    }

    
    /**
     * @Route("/{id}/modifier", name="info_update_view")
     * @Method({"GET", "POST"})
     */
    public function updateViewAction($id)
    {
        $infoServ = $this->container->get('infoService');
        $info = $infoServ->findById($id);   
        
        $typeInfoServ = $this->container->get('typeInfoService');
        $typeInfo = $typeInfoServ->findAll();
        
        return $this->render('backBundle:Info:update.html.twig', array(
            "info" => $info,
            "types" => $typeInfo,
        ));
    }
    
    
    /**
     * @Route("/modifier", name="info_update")
     * @Method({"GET", "POST"})
     */
    public function updateAction(Request $request)
    {
        $typeInfoServ = $this->container->get('typeInfoService');
        $infoServ = $this->container->get('infoService');
        
        $typeInfo = $typeInfoServ->findAll();
        
        $info = new Info();
        $form = $this->createForm('backBundle\Form\InfoType', $info);
        $form->handleRequest($request);

        if ($form->isSubmitted()) 
        {
            $info->setDate(new \DateTime($request->request->get("info")["date"]));
            $info->setType($typeInfoServ->find($info->getTypeId()));
            
            $info->setId($request->request->get("info")["id"]);

            $infoServ->update($info);
            
            return $this->redirectToRoute('info_index');
        }
        
        return $this->redirectToRoute('info_update_view', array(
            "types" => $typeInfo,
            "info" => $infoServ->findById($id),
        ));
    }
    
       /**
     * @Route("/test", name="test")
     * @Method({"GET", "POST"})
     */
    public function test(Request $request)
    {
        $i = new Type_info();
        $i->setId(3);
        $i->setLibelle("m");
        
        $serializer = $this->get('serializer');
        
        $jsonContent = $serializer->serialize($i, 'json');
        
        return new \Symfony\Component\HttpFoundation\Response($jsonContent);
    }
}
