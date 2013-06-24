<?php
include 'spojenie.php';
include 'class/Kosik.php';

$heslo_md5=md5($_POST["passwd"]);
$query  = "SELECT login FROM users WHERE login='$_POST[login]' AND password='$heslo_md5' ";
$result = mysql_query($query);
while($row = mysql_fetch_row($result)){
	   session_start();
	   $_SESSION["prihlaseny"]=1;                 // ak je 1 tak je prihlaseny, ak 0 tak je odhlaseny
	   $_SESSION["login"]=$_POST["login"];
	   $kosik = new Kosik();
	   $_SESSION['kosik'] = $kosik;
	   header("location:index.php"); 
}

echo "Zle meno alebo heslo";

?>
