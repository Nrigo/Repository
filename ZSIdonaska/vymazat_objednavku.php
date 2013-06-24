<?php

include_once 'spojenie.php';

if($_POST){
$id_objednavky=$_POST["id_objednavky"];
mysql_query("DELETE FROM objednavky WHERE id=$id_objednavky");
}
header("Location:administracia.php?p=objednavka");
?>

