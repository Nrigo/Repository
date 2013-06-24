<?
include_once 'spojenie.php';
include_once 'class/Kosik.php';
include_once 'class/User.php';
session_start();

if(isset($_POST['pizza_id'])){
	$kosik->pridatDoKosika($_POST['pizza_id'],$_POST['pocet']);
	//echo $kosik->getSumarize();
}else if(isset($_POST['odobrat'])){
    $kosik->odobratZKosikaPodlaIndexu($_POST['odobrat']);
}else if(!isset($_SESSION['kosik'])){
    $kosik = new Kosik();
    $_SESSION['kosik'] = $kosik;
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
<script type="text/javascript" src="js/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/koment.js"></script>
</head>

<body>

<div class="container">
  <div class="header"><a href="#"><img src="images/pizza-header.png" alt="Insert Logo Here" name="Insert_logo" width="800" height="200" id="Insert_logo" style="display:block;" /></a> 
    <!-- end .header --></div>
  <?php include_once 'sidebar.php';?>
  <div class="content">
	<?
	if($_POST || $kosik->getSumarize()>0) {
		$user = $_SESSION['user'];
		//echo $user->getMeno();
		echo 	"<div id=\"celykosik\">
		<b>Výpis košíka:</b><br/>";
		echo $kosik->writeKosikDonaska();
		echo "<b>Cena spolu: "; echo $kosik->getSumarize();echo "€</b>";
		echo "<form method=\"post\" action=\"objednat.php\"><input type=\"submit\" value=\"objednat\"/></form></div>";
	}
	?>
    <h1>Menu</h1>
    <h2><img src="images/pizza1.jpg" alt="Olives" width="250" height="250" align="left" class="image" /></h2>
    <h2>&nbsp;</h2>
    <h3>Margeritta</h3>
<p> <strong>Zloženie</strong>: <em>paradajková omáčka, syr, cesnak, oregano</em></p>
    <p><strong>Množstvo</strong>: <em>600g</em></p>
    <p><strong>Cena</strong>: <em>5,00€</em></p>
    <form id="form1" name="form1" method="post" action="">
	<input type="hidden" name="pizza_id" value="15"/>
      <select name="vyber_pizza" id="vyber_pizza">
        <option value="margeritta" selected="selected">Margeritta 600g - 5,00€</option>
      </select>
    počet 
    <input name="pocet" type="text" class="pocet" value="1"  maxlength="2" /> ks <a id="pizza_15" href="#"><input type="image" class="kosikadd" src="images/kosik.gif" value="Vložiť do košíka" /></a>
    </form>
    <p>&nbsp;</p>
    <div class="clear"></div>  
     <h2><img src="images/pizza1.jpg" alt="Olives" width="250" height="250" align="left" class="image" /></h2>
    <h2>&nbsp;</h2>
    <h3>Funghi</h3>
<p> <strong>Zloženie</strong>: <em>paradajková omáčka, syr, cesnak, šampiony, oregano</em></p>
    <p><strong>Množstvo</strong>: <em>650g</em></p>
    <p><strong>Cena</strong>: <em>5,40€</em></p>
    <form id="form2" name="form2" method="post" action="">
	<input type="hidden" name="pizza_id" value="16"/>
      <select name="vyber_pizza" id="vyber_pizza">
        <option value="Funghi" selected="selected">Funghi 650g - 5,40€</option>
      </select>
    počet 
    <input name="pocet" type="text" class="pocet" value="1"  maxlength="2" /> ks <a id="pizza_16" href="#"><input type="image" class="kosikadd" src="images/kosik.gif" value="Vložiť do košíka" /></a>
    </form>
    <p>&nbsp;</p>
    <div class="clear"></div>  
     <h2><img src="images/pizza1.jpg" alt="Olives" width="250" height="250" align="left" class="image" /></h2>
    <h2>&nbsp;</h2>
    <h3>Prosciutto</h3>
<p> <strong>Zloženie</strong>: <em>paradajková omáčka, syr, cesnak, šunkový nárez, oregano</em></p>
    <p><strong>Množstvo</strong>: <em>650g</em></p>
    <p><strong>Cena</strong>: <em>5,40€</em></p>
    <form id="form1" name="form1" method="post" action="">
      <select name="vyber_pizza" id="vyber_pizza">
        <option value="Prosciutto">Prosciutto 650g - 5,40€</option>
      </select>
    počet 
    <input name="pocet" type="text" class="pocet" value="1" size="1" maxlength="2" /> ks <a id="pizza_17" href="#"><input type="image" class="kosikadd" src="images/kosik.gif" value="Vložiť do košíka" /></a>
    </form>
    <p>&nbsp;</p>
    <div class="clear"></div>  
     <h2><img src="images/pizza1.jpg" alt="Olives" width="250" height="250" align="left" class="image" /></h2>
    <h2>&nbsp;</h2>
    <h3>Panci</h3>
<p> <strong>Zloženie</strong>: <em>paradajková omáčka, syr, cesnak, šunkový nárez, kukurica, slanina, olivy, oregano</em></p>
    <p><strong>Množstvo</strong>: <em>720g</em></p>
    <p><strong>Cena</strong>: <em>6,40€</em></p>
    <form id="form1" name="form1" method="post" action="">
      <select name="vyber_pizza" id="vyber_pizza">
        <option value="Panci">Panci 720g - 6,40€</option>
      </select>
    počet 
    <input name="pocet" type="text" class="pocet" value="1" size="1" maxlength="2" /> ks <a id="pizza_18" href="#"><input type="image" class="kosikadd" src="images/kosik.gif" value="Vložiť do košíka" /></a>
    </form>
    <p>&nbsp;</p>
    <div class="clear"></div>  
    <p><br />
  </p>
    
    <!-- end .content --></div>
  <div class="footer">
    <p class="fltrt">Copyright Panci Sasi a Majo</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
