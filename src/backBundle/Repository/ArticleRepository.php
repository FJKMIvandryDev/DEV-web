<?php

namespace backBundle\Repository;

/**
 * ArticleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ArticleRepository extends \Doctrine\ORM\EntityRepository
{
    public function getAllByType($type)
    {
        $em = $this->_em;
        $query = $em->createQuery(
            "SELECT article
            FROM backBundle:Article article
            WHERE article.type = '$type'
            "
        );

        $article = $query->getResult();
        
        return $article;
    }
    
    public function findAllByTypeLimit($type, $begin, $limit)
    {
        $em = $this->_em;
        $dql = "SELECT article
                FROM backBundle:Article article
            WHERE article.type = '$type'
                order by DATE_DIFF( article.date, CURRENT_DATE()) asc
            ";
        $query = $em->createQuery($dql)
                        ->setFirstResult($begin)
                        ->setMaxResults($limit);

        $article = $query->getResult();
        
        return $article;
    }
    
    public function findSokajyNotTsiahyLimit($begin, $limit, $idSokajy)
    {
        $em = $this->_em;
        $dql = "SELECT article
                FROM backBundle:Article article
            WHERE article.type != 'tsiahy' and article.sokajinAsaId=$idSokajy
                order by DATE_DIFF( article.date, CURRENT_DATE()) asc
            ";
        $query = $em->createQuery($dql)
                        ->setFirstResult($begin)
                        ->setMaxResults($limit);

        $article = $query->getResult();
        
        return $article;
    }
    
    public function findSamyHafaLimit($begin, $limit)
    {
        $em = $this->_em;
        $dql = "SELECT article
                FROM backBundle:Article article
            WHERE article.type = 'fampianarana' or article.type = 'samihafa'
                order by DATE_DIFF( article.date, CURRENT_DATE()) asc
            ";
        $query = $em->createQuery($dql)
                        ->setFirstResult($begin)
                        ->setMaxResults($limit);

        $article = $query->getResult();
        
        return $article;
    }
    
    public function getCountByType($type)
    {
        $em = $this->_em;
        $dql = "SELECT COUNT(article)
                FROM backBundle:Article article
            WHERE article.type = '$type'";
        $query = $em->createQuery($dql);

        $count = $query->getOneOrNullResult();
        
        return $count;
    }
}
