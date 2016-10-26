<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of UploadImage
 *
 * @author ptdr-Onja
 */
class UploadImage {
    
    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }
    
    public function uploadFile($file, $albumName)
    {
//        $file = $request->files->get('fileImage');
        if(!is_null($file)) {
            $filename = uniqid() . "." . $file->getClientOriginalExtension();
            //$path = "/path/where/we/want-to-save-the-file";
            $path = "uploads/" . $albumName;
            $file->move($path, $filename); // move the file to a path
        }
        
        return $path . "/" . $filename;
    }
}
