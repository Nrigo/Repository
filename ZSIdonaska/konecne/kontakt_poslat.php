<?php
$kodovani = 'utf-8';
$komu = "McGibson@zoznam.sk";
$predmet = "Správa z donášky Panci.";
$zprava = "Meno zákazníka:   " . $_POST['meno'] . "\r\n" .
"Priezvisko:        " . $_POST['priezvisko'] . "\r\n" ."\r\n" .
"Telefon:           " . $_POST['telefon'] . "\r\n" .
"E-mail:            " . $_POST['email'] . "\r\n" .
"Správa:         " . $_POST['sprava'] . "\r\n" ."\r\n" .
$od = $_POST['email'];
$hlavicky = "From: $od" . "\r\n";
$hlavicky .= "Content-Type: text/plain; charset=\"" . $kodovani . "\"\n\n";
mail($komu,$predmet,$zprava,$hlavicky);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Donášková Služba Panci</title>
<style type="text/css">
<!--
-->
</style>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/registracia.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="container">
  <div class="header"><a href="index.html"><img src="images/pizza-header.png" alt="Insert Logo Here" name="Insert_logo" width="800" height="200" id="Insert_logo" style="display:block;" /></a> 
    <!-- end .header --></div>
  <?php include_once 'sidebar.php';?>
  <div class="content">
    <h1>Ďakujeme za Váš záujem o Donášku Panci </h1>
   <p class="fltlft"> Zástupca Donášky Panci Vás bude čo najskôr kontaktovať.</p>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
      <!-- end .content -->
   
  </div>
  <div class="footer">
    <p class="fltrt">Copyright Panci Sasi a Majo</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
