<?php
$p = $_GET['p'];
switch($p) {

case "objednavka":
$content = "objednavka.php";
break;

case "pizza":
$content = "pizza.php";
break; 

case "uzivatelia":
$content = "uzivatelia.php";
break;

case "zamestnanci":
$content = "zamestnanci.php";
break;

default:
$content = "objednavka.php";
break;
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Donaska Panci - Administracia</title>
<style type="text/css"></style>
<link href="css/administracia.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div id="content">
<img src="images/logo_admin.jpg" alt="logo_admin" width="250" height="80" align="left" />
  <ul class="menu">
    <li><a href="administracia.php?p=objednavka">Objednavky</a></li>
     <li><a href="administracia.php?p=pizza">Pizza</a></li>
     <li><a href="administracia.php?p=uzivatelia">Uzivatelia</a></li>	
     <li><a href="administracia.php?p=zamestnanci">Zamestnanci  </a></li>
   </ul>
  <div class="odhlasit"><input type="submit" name="pizza_vymazat" id="pizza_vymazat" value="Odhlasit" /></div> 
  
  <div class="clear"></div>
 <? include ($content); ?>
</div>
</body>
</html>
