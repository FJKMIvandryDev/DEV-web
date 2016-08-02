<?php

namespace frontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

/**
 * Article controller.
 *
 * @Route("/front")
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
        ));
    }
}
