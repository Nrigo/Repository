<?php
$kodovanie = 'utf-8';
$predmet = "Potvrdenie objednavky z Donášky Panci";
$sprava = "Meno zákazníka:   " . $_POST['meno'] . "\r\n" .
"Priezvisko:        " . $_POST['priezvisko'] . "\r\n" ."\r\n" .
"Objednané pizze:   " . $_POST['pizze'] . "\r\n" .
"Celkova cena:      " . $_POST['cena'] . "\r\n" .
"Adresa:            " . $_POST['adresa'] . "\r\n" .
"Email:             " . $_POST['email'] . "\r\n" .
"Ďakujeme za prejavenú dvôveru v našu donášku.";
$komu = $_POST['email'];
$hlavicky = "From: $od" . "\r\n";
$hlavicky .= "Content-Type: text/plain; charset=\"" . $kodovanie . "\"\n\n";
mail($komu,$predmet,$sprava,$hlavicky);
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
    <h1>Ďakujeme za Vášu objednávku </h1>
    <p> Vaša objednávka bude realizovaná v čo najkratšom čase.<br><br>
    Na zadaný emial: <!-- tu moža prist email ktory zadal -->   vám bolo poslané potvrdenie objednávky.
    Prehľad objednávky:</p>
   
   <table cellpadding="0" cellspacing="1" class="registration">
              <tr>
                <th class="fltlft">Celková cena: <? echo $_GET["cena"]; ?> </th>
                <td>
                  <!-- vypisat cenu s koncoukou Eur --> 
                </td>
              </tr>
              <tr>
                <th class="fltlft">Na adresu:  <? echo $_GET["adresa"]; ?></th>
                <td>
                 <!-- adresa --> 
                </td>
              </tr>
               <tr>
                <th class="fltlft">Kontaktná osoba:  <? echo $_GET["osoba"]; ?></th>
                <td>
                 <!-- vypisat meno a priezvisko --> 
                </td>
              </tr>
           </table>
      <!-- end .content -->  </p>
  </div>
  <div class="footer">
    <p class="fltrt">Copyright Panci Sasi a Majo</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
