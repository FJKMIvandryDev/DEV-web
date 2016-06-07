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
    
    public function upload(UploadedFile $file)
    {
        $fileName = md5(uniqid()).'.'.$file->guessExtension();

        $file->move($this->targetDir, $fileName);

        return $fileName;
    }
    
}
