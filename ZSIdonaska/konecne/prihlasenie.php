<?php
include_once 'spojenie.php';
include_once 'class/User.php';
include_once 'class/Kosik.php';

$heslo_md5=md5($_POST["passwd"]);
$query  = "SELECT * FROM users WHERE login='$_POST[login]' AND password='$heslo_md5' ";
$result = mysql_query($query);
while($row = mysql_fetch_row($result)){
	   session_start();
	   $_SESSION["prihlaseny"]=1;                 // ak je 1 tak je prihlaseny, ak 0 tak je odhlaseny
	   $_SESSION["login"]=$_POST["login"];
	   $_SESSION['kosik'] = new Kosik();
	   $_SESSION['user'] = new User($row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$_POST['login']);
	   header("location:index.php"); 
}

echo "Zle meno alebo heslo";

?>
