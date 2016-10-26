<?php

namespace backBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * Article controller.
 *
 * @Route("/album")
 */
class AlbumController extends Controller
{
    /**
     * @Route("/", name="album_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        return $this->render('backBundle:Album:index.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/", name="album_upload_file")
     * @Method("POST")
     */
    public function uploadAction(Request $request)
    {
        $albumServ = $this->container->get('imageUploader');
        
        $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();
        
        $files = $request->files->get('fileImage');
        
        $path = "";
        
//        $path = $albumServ->upload($file, "test");
        
        
        if (sizeof($files)==1)
        {
            foreach ($files as $value){
                $path = $albumServ->upload($value, "test");
            }
            
            $status = array(
                'status' => "success",
                'path' => $baseurl . "/web/" . $path
            );
            
            return new JsonResponse($status);
        }
        
//        $path = $albumServ->upload($file, "test");
        
        $status = array(
            'status' => "error",
            'path' => ""
        );
        
        return new JsonResponse($status);
    }
    
    /**
     * @Route("/delete", name="album_delete_file")
     * @Method("POST")
     */
    public function deleteAction(Request $request)
    {
        $albumServ = $this->container->get('imageUploader');
        
        $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();
        
        $filepath = $request->request->get("filepath");
                
        $result = $albumServ->delete($filepath, $baseurl);
        
        $status = array(
            'status' => $result,
            'path' => $filepath
        );
        
        return new JsonResponse($status);
    }
    
}
