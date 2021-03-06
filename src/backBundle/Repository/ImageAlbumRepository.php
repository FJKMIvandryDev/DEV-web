<?php

namespace backBundle\Repository;

/**
 * ImageAlbumRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ImageAlbumRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByAlbum($idAlbum)
    {
        $em = $this->_em;
        $query = $em->createQuery(
            "SELECT image
            FROM backBundle:ImageAlbum image
            WHERE image.albumId = '$idAlbum'
            "
        );

        $image = $query->getResult();
        
        return $image;
    }
    
    public function findByUrl($url)
    {
        $em = $this->_em;
        $query = $em->createQuery(
            "SELECT image
            FROM backBundle:ImageAlbum image
            WHERE image.url = '$url'
            "
        );

        $image = $query->getResult();

        return $image;
    }
}
