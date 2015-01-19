<?php

class login extends model {

    function __construct() {
        parent::__construct();
    }

    function check($user, $pass) {
        $query = $this->db->prepare("select * from users where user='$user' and pass=md5('$pass') ");
        $query->execute();
        $res = $query->fetchAll();
        if (!empty($res)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    function getDetails($user) {
          $query = $this->db->prepare("select * from users where user='$user'");
        $query->execute();
        $res=$query->fetchAll();
        return $res[0];
    }

}

$user = @$_POST['user'];
$pass = @$_POST['pass'];
$make=new login();
if(isset($user)&&isset($pass)){
    
if($make->check($user,$pass)){
    
    $session=new session();
    $session->setSession("user", $user);
    $cand=$make->getDetails($user);
    $session->setSession("id", $cand['id']);
}
else{
    echo 'Oops';
}
}
?>


