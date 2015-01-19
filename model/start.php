<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class start extends model {

    function __construct() {
        parent::__construct();
    }

  
    

    function updateContent($page,$title, $content) {
        //   echo $content;
        $query = $this->db->prepare("update cms set content='$content',title='$title' where page='$page'") or die("Error");
        $query->execute();
    }

    function createPage($page,$title, $content) {
        $query = $this->db->prepare("insert into cms values ('$page','$title','$content',1,1,1)") or die("Error");
        $query->execute();
    }

    function getWapps($page, $type) {
      
        $query = $this->db->prepare("select * from wapps where page='$page' and type='$type'");
        $query->execute();
        $con = $query->fetchAll();
        return $con;
    }
    
    function getTypes($page) {
     
        $query = $this->db->prepare("select * from wapps where page='$page'");
        $query->execute();
        $con = $query->fetchAll();
        return $con;
    }
    function updateWapp($page,$type,$content) {
           $query = $this->db->prepare("update wapps set content='$content' where page='$page' and type='$type'") or die("Error");
        $query->execute();
    }
     function updateLogin($page,$val) {
       
        $query = $this->db->prepare("update cms set login='$val' where page='$page'") or die("Error");

        $query->execute();
    }
    function islogged($name){
        
        $query = $this->db->prepare("select login from cms where page='$name'") or die("Error");
        $query->execute();
        $val=$query->fetchAll();
        if($val[0]['login'])
            return TRUE;
        else
            return FALSE;
    }
    
    function isMenu($name){
        
        $query = $this->db->prepare("select menu from cms where page='$name'") or die("Error");
        $query->execute();
        $val=$query->fetchAll();
        if($val[0]['menu'])
            return TRUE;
        else
            return FALSE;
    }
    function updateMenu($page,$val) {
       
        $query = $this->db->prepare("update cms set menu='$val' where page='$page'") or die("Error");

        $query->execute();
    }

    function setBar($page, $width, $type) {
        $content="";
        if ($this->getWapps($page, $type)) {
            $query = $this->db->prepare("update wapps set width='$width',flag=1 where page='$page' and type='$type'") or die("Error");
            $query->execute();
        } else {
            $query = $this->db->prepare("insert into wapps values ('$page','$type','$content','$width',1)") or die("Error");
            $query->execute();
        }
    }

}

$pname = @$_POST['pname'];
$wapp=@$_POST['wapps'];
$title= @$_POST['title'];
$con = @$_POST['elm1'];
$lbar = @$_POST['lcheck'];
$rbar = @$_POST['rcheck'];
$lwidth = @$_POST['lwidth'];
$rwidth = @$_POST['rwidth'];
$login= @$_POST['login'];
$menu= @$_POST['menu'];

if (isset($pname)) {

    $page = new cms($pname);
    $send = $page->getContents($pname);
    $do = new start();
  if(empty($wapp)){
      
    if (!empty($send))
        $do->updateContent($pname,$title, $con);
    else {
        $do->createPage($pname,$title, $con);
    }
    if(!isset($menu)){
        //$do->islogged($pname);
        $do->updateMenu($pname,0);
    }
    else{
        $do->updateMenu($pname,1);
    }
     if(!isset($login)){
        //$do->islogged($pname);
        $do->updateLogin($pname,0);
    }
    else{
        $do->updateLogin($pname,1);
    }
    
    
    if (isset($lbar)) {
        $do->setBar($pname, $lwidth, "leftbar");
    }
    if (isset($rbar)) {
        $rwidth=4-$rwidth;
        $do->setBar($pname, $rwidth, "rightbar");
    }
  }
  else{
      $do->updateWapp($pname, $wapp, $con);
  }
}
?>
