<?php
// pridavam komentar z compu
include_once 'spojenie.php';
include_once 'Pizza.php';
include_once 'Kosik.php';

class Objednavka {
private $idPizzaString;
private $obj_meno;
private $obj_priezvisko;
private $obj_ulica;
private $obj_ulica_cislo;
private $obj_mesto;
private $obj_tel_cislo;
private $obj_email;
private $obj_suma;
private $obj_poznamka;

function __construct(Kosik $kosik, $suma, $meno, $priezvisko, $ulica, $mesto, $tel_cislo, $email, $poznamka){
	$this->idPizzaString = $kosik->getPizzaStringg(); //string s ID pizz ktore su v objednavke
	$this->obj_suma = $kosik->getSumarize();
	$this->obj_meno = $meno;
	$this->obj_priezvisko = $priezvisko;
	$this->obj_ulica = $ulica;
	$this->obj_mesto = $mesto;
	$this->obj_tel_cislo = $tel_cislo;
	$this->obj_email = $email;
	$this->obj_poznamka = $poznamka;
	
}

public function getPizzaString(){
  return $this->idPizzaString;
}

public function getMeno(){
  return $this->obj_meno;
}

public function getPriezvisko(){
return $this->obj_priezvisko;
}

public function getUlica(){
return $this->obj_ulica;
}

public function getUlicaCislo(){
return $this->obj_ulica_cislo;
}

public function getMesto(){
return $this->obj_mesto;
}

public function getTelCislo(){
return $this->obj_tel_cislo;
}

public function getEmail(){
return $this->obj_email;
}

public function getSuma(){
return $this->obj_suma;
}
public function getPoznamka(){
return $this->obj_poznamka;
}

public function addObjednavka($obj){
	if (!mysql_query("INSERT INTO objednavky VALUES('0','".$obj->getPizzaString()."','".$obj->getSuma()."','".$obj->getMeno()."','".$obj->getPriezvisko()."','".$obj->getUlica()."','".$obj->getUlicaCislo()."','".$obj->getMesto()."','".$obj->getTelCislo()."','".$obj->getEmail()."','".$obj->getPoznamka()."')")) {
                           die('Invalid query: ' . mysql_error());
    }
}

}
?>
