<?php

namespace backBundle\Repository;

/**
 * InfoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class InfoRepository extends \Doctrine\ORM\EntityRepository
{
    
    public function getAllByType($type)
    {
        $em = $this->_em;
        $query = $em->createQuery(
            "SELECT info
            FROM backBundle:Info info
            WHERE info.type = '$type'
            "
        );

        $article = $query->getResult();
        
        return $article;
    }
    
}
