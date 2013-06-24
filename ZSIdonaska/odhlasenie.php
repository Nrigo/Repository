<?php
session_start();
$_SESSION["prihlaseny"]=0;
session_destroy();
header("location:index.php");
?>
