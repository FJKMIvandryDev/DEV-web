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
class ArticleController extends Controller
{
    /**
     * @Route("/article", name="front_article_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $idArticle = $request->query->get('id');
        $typeArticle = $request->query->get('type');
        
        $articleServ = $this->container->get('articleService');
        
        $visiteServ = $this->container->get('visiteService');
        $session = new Session();
        $session->start();
        
        $sess =$session->get('sess');
        $isSess = 1;
        
        if ($sess == null)
        {
            $session->set("sess", "sess");
            $visiteServ->addVisite();
            $isSess = 0;
        }
        
        $article = $articleServ->findById($idArticle);
        $others = $articleServ->findAllByTypeLimit($typeArticle, 0, 4);
        
        for ($i = 0; $i < sizeof($others); $i++)
        {
            if ($others[$i]->getId() == $idArticle)
            {
                unset($others[$i]);
            }
        }

        return $this->render('frontBundle:Article:index.html.twig', array(
            "article" => $article,
            "others" => $others,
            "isSess" => $isSess,
        ));
    }
}
