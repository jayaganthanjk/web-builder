<?php

class session extends model {

    function __construct() {
        parent::__construct();
    }

    function createSession() {
        @session_start();
    }

    function setSession($sname, $val) {
        $_SESSION[$sname] = $val;
    }

    function getSession($sname) {
        if (isset($_SESSION[$sname]))
            return $_SESSION[$sname];
        else {
            return FALSE;
        }
    }

    function destroySession() {
        session_destroy();
    }

    function getUserDetails() {
        $user = $this->getSession("user");
        if ($user) {
            $query = $this->db->prepare("select * from users where user='$user'");
            $query->execute();
            $res = $query->fetchAll();
            return $res[0];
        } else {
            return FALSE;
        }
    }

}

?>
