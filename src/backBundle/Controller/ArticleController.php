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
        
        $visiteServ = $this->container->get('visiteService');
        $visite = $visiteServ->findAll();
        
        $articles = $articleServ->findAllByType($type);
        
        return $this->render('backBundle:Article:index.html.twig', array(
            "type" => $type,
            "articles" => $articles,
            "visite" => $visite,
        ));
    }

    /**
     * @Route("/{type}/ajouter", name="article_add")
     * @Method({"GET","POST"})
     */
    public function addAction(Request $request, $type)
    {
        $visiteServ = $this->container->get('visiteService');
        $visite = $visiteServ->findAll();
        if ($request->isMethod('POST'))
        {
            $articleServ = $this->container->get('articleService');
            
            $articleServ->save($request);
            
            return $this->redirectToRoute('article_index', array(
                "type" => $type,
                "visite" => $visite,
            ));
        }
        
        $sokajyServ = $this->container->get('sokajinAsaService');
        $zanaTsampanaServ = $this->container->get('zanaTsampanaService');
        
        $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();
        
        return $this->render('backBundle:Article:add.html.twig', array(
            "type" => $type,
            "baseUrl" => $baseurl,
            "sokajy" => $sokajyServ->findAll(),
            "zanaTsampana" => $zanaTsampanaServ->findAll(),
            "visite" => $visite,
        ));
    }

    /**
     * @Route("/{type}/modifier/{id}", name="article_update_view")
     * @Method("GET")
     */
    public function updateViewAction(Request $request, $type, $id)
    {
        $visiteServ = $this->container->get('visiteService');
        $visite = $visiteServ->findAll();
        $articleServ = $this->container->get('articleService');
        
        $article = $articleServ->findById($id);
        
        $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();
        
        $sokajyServ = $this->container->get('sokajinAsaService');
        $zanaTsampanaServ = $this->container->get('zanaTsampanaService');
        
        return $this->render('backBundle:Article:update.html.twig', array(
            "type" => $type,
            "article" => $article,
            "baseUrl" => $baseurl,
            "sokajy" => $sokajyServ->findAll(),
            "zanaTsampana" => $zanaTsampanaServ->findAll(),
            "visite" => $visite,
        ));
    }

    /**
     * @Route("/{type}/modifier", name="article_update")
     * @Method("POST")
     */
    public function updateAction(Request $request, $type)
    {
        $visiteServ = $this->container->get('visiteService');
        $visite = $visiteServ->findAll();
        $articleServ = $this->container->get('articleService');
        
        $articleServ->update($request);
        
        return $this->redirectToRoute('article_index', array(
            "type" => $type,
            "visite" => $visite,
        ));
    }

    /**
     * @Route("/{type}/supprimer/{id}", name="article_delete")
     * @Method({"GET","POST"})
     */
    public function deleteAction($type, $id)
    {
        $visiteServ = $this->container->get('visiteService');
        $visite = $visiteServ->findAll();
        $articleServ = $this->container->get('articleService');
        
        $articleServ->delete($id);
        
        return $this->redirectToRoute('article_index', array(
            "type" => $type,
            "visite" => $visite,
        ));
    }
    
        /**
     * @Route("/{type}/afficher/{id}", name="article_show")
     * @Method("GET")
     */
    public function showAction($type, $id)
    {
        $visiteServ = $this->container->get('visiteService');
        $visite = $visiteServ->findAll();
        $articleServ = $this->container->get('articleService');
        
        $article = $articleServ->findById($id);
        
        return $this->render('backBundle:Article:show.html.twig', array(
            "type" => $type,
            "article" => $article,
            "visite" => $visite,
        ));
    }
}
