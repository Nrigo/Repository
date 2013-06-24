<?php
class User {
private $id;
private $meno;
private $priezvisko;
private $email;
private $ulica;
private $mesto;
private $login;
private $password;
private $tel_cislo;

function __construct($meno = "", $priezvisko = "", $ulica = "", $mesto = "", $tel_cislo = "", $email = "", $login = ""){
	$this->meno=$meno;
	$this->priezvisko=$priezvisko;
	$this->email=$email;
	$this->login=$login;
	$this->priezvisko=$priezvisko;
	$this->ulica=$ulica;
	$this->mesto =$mesto;
	$this->tel_cislo=$tel_cislo;
}

public function getId(){
  return $this->id;
}

public function getMeno(){
return $this->meno;
}

public function getPriezvisko(){
return $this->priezvisko;
}

public function getEmail(){
return $this->email;
}

public function getUlica(){
return $this->ulica;
}

public function getLogin(){
return $this->login;
}

public function getMesto(){
return $this->mesto;
}

public function getTelcislo(){
	return $this->tel_cislo;
}

public function setMeno($meno){
  $this->meno=$meno;
}

public function setPriezvisko($priezvisko){
  $this->priezvisko=$priezvisko;
}

public function setEmail($email){
  $this->email=$email;
}

public function setUlica($ulica){
  $this->ulica=$ulica;
}
}

?>