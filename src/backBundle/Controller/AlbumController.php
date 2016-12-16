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
    public function indexAction()
    {
        $albumServ = $this->container->get('albumService');
        
        $visiteServ = $this->container->get('visiteService');
        $visite = $visiteServ->findAll();
        
        $album = $albumServ->findAll();
        
        return $this->render('backBundle:Album:index.html.twig', array(
            "visite" => $visite,
            "albums" => $album,
        ));
    }

    /**
     * @Route("/image/id/{id}", name="album_upload_file")
     * @Method("POST")
     */
    public function uploadAction(Request $request, $id)
    {
        $albumServ = $this->container->get('imageUploader');
        
        $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();
        
        $files = $request->files->get('fileImage');
        $albumId = $id;

        $path = "";
        
        if (sizeof($files)==1)
        {
            foreach ($files as $value){
                $path = $albumServ->upload($value, $albumId);
            }
            
            $status = array(
                'status' => "success",
                'path' => $baseurl . "/web/" . $path,
                'album' => $albumId
            );
            
            return new JsonResponse($status);
        }
        
        $status = array(
            'status' => "error",
            'path' => "",
            'album' => $albumId
        );
        
        return new JsonResponse($status);
    }
    
    /**
     * @Route("/delete-image", name="album_delete_file")
     * @Method("POST")
     */
    public function deleteImageAction(Request $request)
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
    
    /**
     * @Route("/ajout", name="album_add")
     * @Method({"GET","POST"})
    */
    public function addAction(Request $request)
    {
        $visiteServ = $this->container->get('visiteService');
        $visite = $visiteServ->findAll();
        
        if ($request->isMethod('POST'))
        {
            $albumServ = $this->container->get('albumService');
            
            $albumServ->save($request);
            
            return $this->redirectToRoute('album_index', array(
                "visite" => $visite,
            ));
        }
        
        $sokajyServ = $this->container->get('sokajinAsaService');
        $zanaTsampanaServ = $this->container->get('zanaTsampanaService');
        
        $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();
        
        return $this->render('backBundle:Album:add.html.twig', array(
            "baseUrl" => $baseurl,
            "sokajy" => $sokajyServ->findAll(),
            "zanaTsampana" => $zanaTsampanaServ->findAll(),
            "visite" => $visite,
        ));
    }
    
        /**
     * @Route("/supprimer/{id}", name="album_delete")
     * @Method({"GET","POST"})
     */
    public function deleteAction($id)
    {
        $visiteServ = $this->container->get('visiteService');
        $visite = $visiteServ->findAll();
        $articleServ = $this->container->get('albumService');
        
        $articleServ->delete($id);
        
        return $this->redirectToRoute('album_index', array(
            "visite" => $visite,
        ));
    }
    
    /**
     * @Route("/modifier/{id}", name="album_update_view")
     * @Method("GET")
     */
    public function updateViewAction(Request $request, $id)
    {
        $visiteServ = $this->container->get('visiteService');
        $visite = $visiteServ->findAll();
        $albumServ = $this->container->get('albumService');
        
        $album = $albumServ->findById($id);
        
        $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();
        
        $sokajyServ = $this->container->get('sokajinAsaService');
        $zanaTsampanaServ = $this->container->get('zanaTsampanaService');
        
        return $this->render('backBundle:Album:update.html.twig', array(
            "album" => $album,
            "baseUrl" => $baseurl,
            "sokajy" => $sokajyServ->findAll(),
            "zanaTsampana" => $zanaTsampanaServ->findAll(),
            "visite" => $visite,
        ));
    }
    
    /**
     * @Route("/modifier", name="album_update")
     * @Method("POST")
     */
    public function updateAction(Request $request)
    {
        $visiteServ = $this->container->get('visiteService');
        $visite = $visiteServ->findAll();
        $aalbumServ = $this->container->get('albumService');
        
        $aalbumServ->update($request);
        
        return $this->redirectToRoute('album_index', array(
            "visite" => $visite,
        ));
    }
    
    /**
     * @Route("/afficher/{id}", name="album_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $visiteServ = $this->container->get('visiteService');
        $visite = $visiteServ->findAll();
        $albumServ = $this->container->get('albumService');
        
        $album = $albumServ->findById($id);
        $images = $albumServ->getImages($id);
//        
//        var_dump($images);
//        die;
//        
        return $this->render('backBundle:Album:show.html.twig', array(
            "album" => $album,
            "visite" => $visite,
            "images" => $images,
        ));
    }
}
