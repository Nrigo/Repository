<?php

include_once 'spojenie.php';

mysql_query("DELETE FROM objednavky WHERE id= '".mysql_real_escape_string($_GET["objednavka_vymazat"]."'");

?>

