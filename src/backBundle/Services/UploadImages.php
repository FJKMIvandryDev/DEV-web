<?php

namespace backBundle\Services;

use Doctrine\ORM\EntityManager;
use \backBundle\Entity\ImageAlbum;
use \backBundle\Entity\Album;
/**
 * Description of test
 *
 * @author ptdr-Onja
 */
class UploadImages {
    
    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }
    
    public function upload($file, $idAlbum, $rootPath)
    {
        if(!is_null($file)) {
            $filename = uniqid() . "." . $file->getClientOriginalExtension();
//            $path = "/path/where/we/want-to-save-the-file";
            $albumDAO = $this->em->getRepository("backBundle:Album");
            $currentAlbum = $albumDAO->find($idAlbum);
            $path = "upload/" . $currentAlbum->getName();
            
            $file->move($path, $filename); // move the file to a path

            $img = new ImageAlbum();
            $img->setAlbum($currentAlbum);
            $img->setUrl($rootPath . "/web/" . $path . "/" . $filename);
            $img->setOriginalName($file->getClientOriginalName());
            
            $this->em->persist($img);
            $this->em->flush();
            
            return $path . "/" . $filename;
        }
        
        return "";
    }
    
    public function delete($path, $baseUrl)
    {
        $path_partiel = str_replace($baseUrl . "/web/","",$path);
        $images = $this->em->getRepository('backBundle:ImageAlbum')->findByUrl($path);

        if (file_exists($path_partiel)) {
            unlink($path_partiel);
            
            foreach ($images as $image)
            {
                $this->em->remove($image);
                $this->em->flush();
            }
            
            return "success";
        }
        
        return $path_partiel;
    }
    
}
