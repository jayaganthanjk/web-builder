<?php

class index extends Controller {

    function __construct() {
        parent::__construct();
      //  echo "Welcome to wabsters";
       // print "\n";
    }
    function index($url){
       
        $this->view->render($url);  
        
    }
    function index_with_levels($url,$level){
        echo $url;
        $this->view->render($url,$level);  
    }

}
?>
