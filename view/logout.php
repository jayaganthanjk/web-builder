<?php
$session->destroySession();
header('Location:'.$_SERVER['HTTP_REFERER']);
?>
