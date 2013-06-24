<?php

include_once 'spojenie.php';

mysql_query("DELETE FROM objednavky WHERE id=$_GET[\"objednavka_vymazat\"]");

?>

