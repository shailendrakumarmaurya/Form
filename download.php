<?php

if(!empty($_GET['file'])){
    $fileName = basename($_GET['file']);
    $filePath = "resumes/" . $fileName;

    if(!empty($fileName) && file_exists($filePath)){
        header("Cache-control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attatchment; filename=$fileName");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");

        readfile($filePath);
        exit;
    }
    else{
        echo "File not exists.";
    }
}


?>