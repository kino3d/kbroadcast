<?php
	$file_name = $_GET["media"];    
    // $file_name = $_SERVER['PATH_INFO'];
    $file_ext = split(".", $file_name);
    $file = '/var/www/encoder/recording/' . $file_name;
    if (file_exists($file)) {
        header('Content-Type: ' . mime_content_type($file));
        header('Content-Disposition: attachment;filename="' . $file_name . '"');
        header('Content-Length: ' . filesize($file));
        readfile($file);
    } else {
        header('HTTP/1.1 404 Not Found');
    }
?>