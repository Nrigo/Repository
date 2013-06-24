<?
include_once 'spojenie.php';
include_once 'class/Kosik.php';
include_once 'class/Objednavka.php';
include_once 'class/User.php';
session_start();
$user = $_SESSION['user'];
$kosik = $_SESSION['kosik'];

if($_SESSION['prihlaseny']==1){
	$meno = $user->getMeno();
	$priezvisko = $user->getPriezvisko();
	$ulica = $user->getUlica();
	$mesto = $user->getMesto();
	$telc = $user->getTelcislo();
	$email = $user->getEmail();
}

if($_POST){
$kosik = $_SESSION['kosik'];
	$objed = new Objednavka($kosik,$kosik->getSumarize(),$_POST['meno'],$_POST['priezvisko'],$_POST['ulica'],$_POST['mesto'],$_POST['telefon'],$_POST['email'],$_POST['poznamka']);
	$objed->addObjednavka($objed);
	$cena=$kosik->getSumarize();
	$adresa=$_POST['ulica']." ".$_POST['mesto'];
	$osoba=$_POST['meno']." ".$_POST['priezvisko'];
	
	header("Location:potvrdenie_objednavky.php?cena=$cena&adresa=$adresa&osoba=$osoba");
}

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
  <div class="header"><a href="#"><img src="images/pizza-header.png" alt="Insert Logo Here" name="Insert_logo" width="800" height="200" id="Insert_logo" style="display:block;" /></a> 
    <!-- end .header --></div>
  <?php include 'sidebar.php';?> 
  <div class="content">
    <h1>Potvrdenie objednávky</h1>
    <p >No ta davaj <br />
    </p>
    <p >Klikaj het</p>
    <p>&nbsp;</p>
	<p>V košíku mátie tieto pizze:</p>
	<p><? echo $kosik->writeKosik(); ?></p><p><center><b>Cena spolu: <? echo $kosik->getSumarize(); ?>€</b></p><p><? echo $kosik->getPizzaStringg(); ?></p>
    
         
         <form method="post" action="objednat.php" class="registration">
             <div class="registration">
            <table cellpadding="0" cellspacing="1" class="registration">
              <tr>
                <th>*
                    Meno</th>
                <td>
                  <input type="text" name="meno" value="<? echo $meno; ?>" />
                </td>
              </tr>
              <tr>
                <th>*
                    Priezvisko</th>
                <td>
                  <input type="text" name="priezvisko" value="<? echo $priezvisko; ?>" />
                </td>
              </tr>
              <tr>
                <th>*
                    Ulica, číslo</th>
                <td>
                  <input type="text" name="ulica" value="<? echo $ulica; ?>" />
                </td>
              </tr>
              <tr>
                <th>*
                    Mesto</th>
                <td>
                  <input type="text" name="mesto" value="<? echo $mesto; ?>" />
                </td>
              </tr>
              <tr>
                <th class="separator">*
                    Telefón</th>
                <td class="separator">
                  <input type="text" name="telefon" value="<? echo $telc; ?>" />
                </td>
              </tr>
              <tr>
                <th>*
                    E-mail</th>
                <td>
                  <input type="text" name="email" value="<? echo $email ?>" />
                </td>
              </tr>
              <tr>
                <th>Poznámka</th>
                <td>
                  <textarea name="poznamka" cols="30" rows="5"></textarea>
                </td>
              </tr>
              <tr>
                <td colspan="2" class="info">Údaje označené * sú povinné</td>
              </tr>
            </table>
</div>
          <div class="submit">
            <input type="submit" class="send" value="Objednať" />
          </div>
        </form>
        
    <!-- end .content --></div>
  <div class="footer">
    <p class="fltrt">Copyright Panci Sasi a Majo</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
