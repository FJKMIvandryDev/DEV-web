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
 * @Route("/admin/article")
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
        
        $articles = $articleServ->findAllByType($type);
        
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
            $articleServ = $this->container->get('articleService');
            
            $articleServ->save($request);
            
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
    public function updateViewAction(Request $request, $type, $id)
    {
        $articleServ = $this->container->get('articleService');
        
        $article = $articleServ->findById($id);
        
        $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();
        
        return $this->render('backBundle:Article:update.html.twig', array(
            "type" => $type,
            "article" => $article,
            "baseUrl" => $baseurl,
        ));
    }

    /**
     * @Route("/{type}/modifier", name="article_update")
     * @Method("POST")
     */
    public function updateAction(Request $request, $type)
    {
        $articleServ = $this->container->get('articleService');
        
        $articleServ->update($request);
        
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
        $articleServ = $this->container->get('articleService');
        
        $articleServ->delete($id);
        
        return $this->redirectToRoute('article_index', array(
            "type" => $type,
        ));
    }
    
        /**
     * @Route("/{type}/afficher/{id}", name="article_show")
     * @Method("GET")
     */
    public function showAction($type, $id)
    {
        $articleServ = $this->container->get('articleService');
        
        $article = $articleServ->findById($id);
        
        return $this->render('backBundle:Article:show.html.twig', array(
            "type" => $type,
            "article" => $article,
        ));
    }
}
