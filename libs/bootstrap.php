<?php

class bootstrap {

    function __construct() {
        //$url = isset($_GET['url']) ? $_GET['url'] : "index";
        echo $url;
        $url=$_GET['url'];
        $url = rtrim($url);
        $base_url=$url;
        $url = explode('/', $url);
        
      
        $file = "controller/index.php";
    //    echo $file."\n";
        if(file_exists($file)){
           
           require $file;
            $controller = new index;
            $controller->loadModal($url[0]);
            $controller->index($url[0]); 
            
           
        }
        else {
           
        require 'controller/error.php';
        $controller = new error;
  //      $controller->index();
        return FALSE;
       } 
      
        
      
    }

 /*   function error() {
        require 'controller/error.php';
        $controller = new error;
       $controller->index();
        return FALSE;
    }
*/
}

?>
