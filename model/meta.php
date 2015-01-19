<?php
class meta extends model {

    function __construct() {
        parent::__construct();   
        }
       function getmeta($page){
            $query=$this->db->prepare("select * from meta where page='$page'");
        $query->execute();
        $meta=$query->fetchAll();
        return $meta;
       }

}
?>
