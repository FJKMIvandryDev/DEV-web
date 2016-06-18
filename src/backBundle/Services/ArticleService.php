<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backBundle\Services;

use Doctrine\ORM\EntityManager;

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
    
}
