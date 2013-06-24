<?php

include_once 'spojenie.php';

if($_POST){
$id_objednavky=$_POST["id_uzivatela"];
mysql_query("DELETE FROM zamestnanci WHERE id=$id_zamestnanca");
}
header("Location:administracia.php?p=zamestnanci");
?>

