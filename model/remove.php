<?php
class remove extends model {

    function __construct() {
        parent::__construct();
        }
        function exec($sql) {
            $query=$this->db->prepare($sql);
            $query->execute();
        }   
         function getTypes($page) {
     
        $query = $this->db->prepare("select * from wapps where page='$page'");
        $query->execute();
        $con = $query->fetchAll();
        return $con;
    }
}
$page=@$_GET['page'];
$wapps=@$_GET['wapps'];
$remove=@$_GET['remove'];
$delete=@$_GET['delete'];
$del=@$_GET['delete_page'];
$fil=@$_GET['file'];

$val=new remove();
if(isset($page)&&isset($remove)){
    $sql1="update cms set flag=0 where page='$page'";
$val->exec($sql1);
}
if(isset($page)&&isset($delete)){
    $sql1="delete from cms where page='$page'";
$val->exec($sql1);
}
if(isset($remove))
{
$sql1="update wapps set flag=0 where page='$page' and type='$wapps'";
$val->exec($sql1);
}
if(isset($delete))
{
    $sql1="delete from wapps where page='$page' and type='$wapps'";
    $val->exec($sql1);
}
if(isset($del))
{
    unlink("wapps/".$fil.".php");
}
?>
