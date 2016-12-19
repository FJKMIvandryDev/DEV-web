<?php

namespace frontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Article controller.
 *
 * @Route("")
 */
class AlbumController extends Controller
{
    
    /**
     * @Route("/album", name="front_album_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $albumServ = $this->container->get('albumService');
        
        $albums = $albumServ->findAll();
        
        return $this->render('frontBundle:Album:index.html.twig', array(
            "albums" => $albums,
        ));
    }
    
    /**
     * @Route("/album/{id}", name="front_album_show")
     * @Method("GET")
     */
    public function showAlbumAction($id)
    {
        $albumServ = $this->container->get('albumService');
        $images = $albumServ->getImages($id);
        
        return $this->render('frontBundle:Album:ShowAlbum.html.twig', array(
            "images" => $images,
        ));
    }
}
