<?php

include_once 'spojenie.php';

if($_POST){
$id_objednavky=$_POST["id_uzivatela"];
mysql_query("DELETE FROM users WHERE id=$id_uzivatela");
}
header("Location:administracia.php?p=uzivatelia");
?>

