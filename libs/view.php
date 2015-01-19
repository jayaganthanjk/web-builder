<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class view {

    function __construct() {
         
    }
    function render($url){
        $name=$url;
        $cms = $this->cms;
        $skeleton =  $this->skeleton;
        
        $this->js = @scandir('js/' . $name) or "";
        $this->css = @scandir('css/' . $name) or "";
        require 'view/web!gnore.php';
        if(!file_exists('view/'.$url.'.php'))
            require 'view/layout.php';
        else{
            require 'view/'.$url.'.php';  
        }
        require 'view/end.php';
        
    }

}
?>
