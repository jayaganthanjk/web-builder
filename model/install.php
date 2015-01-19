<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class install extends model {

    function __construct() {
        
        parent::__construct();
    }
    function isEmpty() {
        $query=  $this->db->prepare("select * from website");
        $query->execute();
        $row=$query->fetchAll();
        if(empty($row)){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
}

?>