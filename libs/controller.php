<?php

class Controller {

    function __construct() {
        //    echo "\n".'Controller Initiated';
        //   echo "\n";
        $this->view = new View;
        
    }

    function loadModal($name) {
        require 'model/meta.php';
        require 'model/skeleton.php';
        
        require 'model/cms.php';
        require 'model/session.php';
       
        $this->view->skeleton = new skeleton();
        $this->view->cms = new cms($name);

        $file = 'model/' . $name . '.php';

        if (file_exists($file)) {

            require $file;
            $modal = $name;
            $this->modal = new $modal;
        }
    }

}

?>
