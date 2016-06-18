<?php

namespace backBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use \Symfony\Component\HttpFoundation\Response;

/**
 * Article controller.
 *
 * @Route("/article")
 */
class ArticleController extends Controller
{
    /**
     * @Route("/{type}", name="article_index")
     * @Method("GET")
     */
    public function indexAction($type)
    {
        $articleServ = $this->container->get('articleService');
        
        $articles = $articleServ->findAll();
        
        return $this->render('backBundle:Article:index.html.twig', array(
            "type" => $type,
            "articles" => $articles,
        ));
    }

    /**
     * @Route("/{type}/ajouter", name="article_add")
     * @Method({"GET","POST"})
     */
    public function addAction(Request $request, $type)
    {
        if ($request->isMethod('POST'))
        {
            
            
            return $this->redirectToRoute('article_index', array(
                "type" => $type,
            ));
        }
        
        $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();
        
        return $this->render('backBundle:Article:add.html.twig', array(
            "type" => $type,
            "baseUrl" => $baseurl,
        ));
    }

    /**
     * @Route("/{type}/modifier/{id}", name="article_update_view")
     * @Method("GET")
     */
    public function updateViewAction($type, $id)
    {
        
        
        
        return $this->render('backBundle:Article:update.html.twig', array(
            "type" => $type,
            "id" => $id,
        ));
    }

    /**
     * @Route("/{type}/modifier", name="article_update")
     * @Method("POST")
     */
    public function updateAction(Request $request, $type)
    {
        
        
        return $this->redirectToRoute('article_index', array(
            "type" => $type,
        ));
    }

    /**
     * @Route("/{type}/supprimer/{id}", name="article_delete")
     * @Method({"GET","POST"})
     */
    public function deleteAction($type, $id)
    {
        return $this->redirectToRoute('article_index', array(
            "type" => $type,
        ));
    }

}
