<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class skeleton extends model {

    function __construct() {
        parent::__construct();
        }
        
        function getSkeleton($page) {
             $query=$this->db->prepare("select * from skeleton where page='$page'");      
             $query->execute();
             return $query->fetchAll();
        }
        
        function getWappcontent($page,$req) {
              $query=$this->db->prepare("select * from wapps where page='$page' and type='$req'");      
             $query->execute();
             $exe= $query->fetchAll();
             if(empty($exe[0])){
                 $page="index";
             $query=$this->db->prepare("select * from wapps where page='$page' and type='$req'");      
             $query->execute();
             $exe= $query->fetchAll();
                 
             }
             return $exe;
        }
}


?>
