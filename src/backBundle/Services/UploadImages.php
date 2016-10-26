<?php

namespace backBundle\Services;

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Description of test
 *
 * @author ptdr-Onja
 */
class UploadImages {
    
    private $targetDir;

    public function __construct($targetDir)
    {
        $this->targetDir = $targetDir;
    }
    
    public function upload($file, $albumName)
    {
        if(!is_null($file)) {
            $filename = uniqid() . "." . $file->getClientOriginalExtension();
            //$path = "/path/where/we/want-to-save-the-file";
            $path = "upload/" . $albumName;
            $file->move($path, $filename); // move the file to a path
            
            return $path . "/" . $filename;
        }
        
        return "";
    }
    
    public function delete($path, $baseUrl)
    {
        $path_replace = str_replace($baseUrl . "/web/","",$path);
        
        if (file_exists($path_replace)) {
            unlink($path_replace);
            
            return "success";
        }
        
        return "file not exist";
    }
    
}
