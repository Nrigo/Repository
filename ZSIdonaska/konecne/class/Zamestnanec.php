<?php
require("User.php");
include 'spojenie.php';
include_once("Pizza.php");
class Zamestnanec extends User {
private $pozicia;

public function addPizza($nazov,$cena,$gramaz,$zlozenie,$foto){
  $nova_pizza = new Pizza($nazov,$cena,$gramaz,$zlozenie,$foto);
  $this_serial = serialize($nova_pizza);
                
                  if (!mysql_query("INSERT INTO pizza(id,pizzaObj) VALUES('','$this_serial')")) {
                           die('Invalid query: ' . mysql_error());
                  }
}

public function removePizza($id){
	$query  = "delete from pizza where id = '$id'";
	$result = mysql_query($query);
}
}



?>