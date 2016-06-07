<?php

namespace backBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use backBundle\Entity\Info;
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
    public function addAction(Request $request)
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
//            print_r($fileName);
//            
//            die;
//        }
   
        $typeInfoServ = $this->container->get('typeInfoService');
        $infoServ = $this->container->get('infoService');
        
        $typeInfo = $typeInfoServ->findAll();
        
        $info = new Info();
        $form = $this->createForm('backBundle\Form\InfoType', $info);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {   

            $info->setType($typeInfoServ->find($info->getTypeId()));
            
            $infoServ->saveOrUpdate($info);
            
            return $this->redirectToRoute('info_index');
        }

        return $this->render('backBundle:Info:add.html.twig', array(
            "types" => $typeInfo,
        ));
    }

    /**
     * @Route("/{id}", name="info_delete")
     * @Method("DELETE")
     */
    public function deleteAction()
    {
        return $this->render('backBundle:Info:delete.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/{id}", name="info_list")
     * @Method("GET")
     */
    public function showAction()
    {
        return $this->render('backBundle:Info:show.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/{id}/modifier", name="info_update")
     * @Method({"GET", "POST"})
     */
    public function updateAction()
    {
        return $this->render('backBundle:Info:update.html.twig', array(
            // ...
        ));
    }

    
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('info_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
