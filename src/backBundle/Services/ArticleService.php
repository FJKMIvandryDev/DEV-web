<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backBundle\Services;

use Doctrine\ORM\EntityManager;
use backBundle\Entity\Article;
use backBundle\Entity\Texte;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of articleService
 *
 * @author ptdr-Onja
 */
class ArticleService {
    
    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }
    
    public function findAll()
    {
        $article = $this->em->getRepository('backBundle:Article')->findAll();  
        
        return $article;
    }
    
    public function findById($id)
    {
        $article = $this->em->getRepository('backBundle:Article')->find($id);  
        
        return $article;
    }
    
    public function save(Request $request)
    { 
        $texte = new Texte();
        $texte->setContenu($request->request->get("contenu"));
        
        $this->em->persist($texte);
        
        
        $article = new Article(); 
        $article->setTitre($request->request->get("titre"));
        $article->setAuteur($request->request->get("auteur"));
        $article->setImageJacket($request->request->get("imageJacket"));
        $article->setType($request->request->get("type"));
        $article->setTexte($texte);
        
        $this->em->persist($article);
        
        $this->em->flush();
    }
    
    public function delete($id)
    {
        $article = $this->em->getRepository("backBundle:Article")->find($id);
        
        $this->em->remove($article);
        $this->em->flush();
    }
    
    public function update(Request $request)
    {
        $article = $this->em->getRepository("backBundle:Article")->find($request->request->get("id"));
        
        $texte = $article->getTexte(); 
        $texte->setContenu($request->request->get("contenu"));
        
        $this->em->merge($texte);

        
        $article->setTitre($request->request->get("titre"));
        $article->setAuteur($request->request->get("auteur"));
        $article->setImageJacket($request->request->get("imageJacket"));
        $article->setType($request->request->get("type"));
        
        $this->em->merge($article);
        $this->em->flush();
    }
    
}
