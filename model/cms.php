<?php

class cms extends model {

    var $query;

    function __construct($page) {

        parent::__construct();
        
        $this->query = $this->db->prepare("select * from cms where page='$page'");
    }

    function getTitle() {
        $this->query->execute();
        foreach ($this->query as $value) {
            echo $value['title'];
        }
    }

    function getPages() {
        $query = $this->db->prepare("select * from cms");
        $query->execute();
        $con = $query->fetchAll();
        return $con;
    }

    function getPageTitle($page) {
        $this->query = $this->db->prepare("select * from cms where page='$page'");
        $this->query->execute();
        foreach ($this->query as $value) {
            echo $value['title'];
        }
    }

    function getContents($data) {
        $this->query = $this->db->prepare("select * from cms where page='$data'");
        $this->query->execute();
        $con = $this->query->fetchAll();
        return $con;
    }

    function getWapps($page, $type) {

        $query = $this->db->prepare("select * from wapps where page='$page' and type='$type'");
        $query->execute();
        $con = $query->fetchAll();
        return $con;
    }
    


}

?>
