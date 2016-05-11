<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of ArticleController
 *
 * @author ptdr-Onja
 */
class ArticleController extends Controller
{
    public function indexAction()
    {
//        $article = new \frontBundle\Entity\Article();
//        $image = new \frontBundle\Entity\Image();
//        $texte = new \frontBundle\Entity\Texte();
//        
//        //image set
//        $image->setUrl("bundles/framework/images/fjkm-site_rafitra.jpg");
//        
//        $texte->setContenu("teste de texte io e");
//        
//        $article->addImage($image);  
//        $article->setAuteur("auteur 1");       
//        $article->setImageJacket($image);       
//        $article->setTexte($texte);
//        $article->setTitre("titre 1");
//        
//        $em = $this->getDoctrine()->getManager();
//        
//        $em->persist($article);
//        
//        $em->flush();
        
        $em = $this->getDoctrine()->getManager();

        // On récupère l'annonce $id
        $emArticle = $em->getRepository('frontBundle:Article');
        
        $article = $emArticle->find(1);
        
        return $this->render('frontBundle:template:test.html.twig', array(
            'article' => $article,
            'test' => "qdfqsdf",
        ));
    }
}
