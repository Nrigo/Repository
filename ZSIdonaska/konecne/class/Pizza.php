<?php
class Pizza {
private $id;
private $nazov;
private $cena;
private $zlozenie;
private $gramaz;
private $foto;
private $index;

function __construct($nazov = "", $cena = "", $gramaz = "", $zlozenie = "", $foto = ""){
	$this->nazov=$nazov;
	$this->cena=$cena;
	$this->gramaz=$gramaz;
	$this->zlozenie=$zlozenie;
	$this->foto=$foto;
}

public function getId(){
  return $this->id;
}

public function getNazov(){
return $this->nazov;
}

public function getCena(){
return $this->cena;
}

public function getZlozenie(){
return $this->zlozenie;
}

public function getGramaz(){
return $this->gramaz;
}

public function getFoto(){
return $this->foto;
}

public function setId($id){
  $this->id=$id;
}

public function setNazov($nazov){
  $this->nazov=$nazov;
}

public function setCena($cena){
  $this->cena=$cena;
}

public function setZlozenie($zlozenie){
  $this->zlozenie=$zlozenie;
}

public function setGramaz($gramaz){
  $this->gramaz=$gramaz;
}

public function setFoto($foto){
  $this->foto=$foto;
}

public function setIndex($index){
  $this->index=$index;
}

public function getIndex(){
  return $this->index;
}

}

?>
