<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


if ($prof = $session->getUserDetails()) {
    if ($prof['rank'] == "admin") {
        header('Location:god');
    }
    else
        echo $prof['user'] . " " . $prof['email'];
}
?>
