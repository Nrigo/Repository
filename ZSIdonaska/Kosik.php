
<?php
include  'spojenie.php';
include  'Pizza.php';

class Kosik{
private $sumarize;
private $maxIndexPizza;
private $pocetPizza;
private $pizza=array();

function __construct(){
  $this->sumarize=0;
  $this->maxIndexPizza=0;
  $this->pocetPizza=0;
}

function pridatDoKosika($idPizza,$pocet){
  
  
  $query  = "SELECT pizzaObj,id FROM pizza WHERE id=$idPizza";
  $result = mysql_query($query);
  while($row = mysql_fetch_row($result))
  { 
    $dbsPizza = unserialize($row[0]);
	
	/*for($i=0;$i<$this->maxIndexPizza;$i++){               // zistenie, ci sa takato pizza nahodou uz nenachadza v kosiku;
     if($this->pizza[$i]!=null && $this->pizza[$i]->getId()==$dbsPizza->getId()){
	   echo "pizza s id $idPizza sa v kosiku uz nachadza, ukoncenie funkcie <br>";
	   // taka pizza sa v kosiku uz nachadza, ukoncenie funkcie
	   return 0;
	 }
    }*/
	
	for($j=0;$j<$pocet;$j++){
	$log_prem=0;
	for($i=0;$i<$this->maxIndexPizza;$i++){                     // zistenie ci sa v kosiku nachadza pizza s null referenciou ( vznika ak nejaku pizzu odstranime )
	  
	   if(!is_object($this->pizza[$i]) && $log_prem==0){
	    $this->pizza[$i]=$dbsPizza;
		$this->pizza[$i]->setId($row[1]);
		$this->sumarize+=$dbsPizza->getCena();
		$this->pizza[$i]->setIndex($i);
		$this->pocetPizza++;
		$maxindx=$this->maxIndexPizza;
		//echo " Pridalo pizzu s id $idPizza a indexom $i a maxIndexPizza $maxindx cez for <br>" ;
		$log_prem=1;
	  }
	}
	if($log_prem==0){
	   $this->pizza[$this->maxIndexPizza]=$dbsPizza;
	   $this->pizza[$this->maxIndexPizza]->setId($row[1]);
	   $this->sumarize+=$dbsPizza->getCena();
	   $this->pizza[$i]->setIndex($i);
	   $this->maxIndexPizza++;
	   $this->pocetPizza++;
	   //echo " Pridalo pizzu s id $idPizza cez bez foru <br>" ;
	}
	}
  } 
}

function odobratZKosika($idPizza){
  for($i=0;$i<$this->maxIndexPizza;$i++){               // zistenie, ci sa takato pizza nachadza v kosiku (mala by sa)
     if($this->pizza[$i]!=null && $this->pizza[$i]->getId()==$idPizza){
	   $this->sumarize-=$this->pizza[$i]->getCena();
       $this->pizza[$i]=null;
       $this->pocetPizza--;
	   echo "Pizza s id $idPizza sa odobrala z kosika<br>";
	   return;                                          // odobrate z kosika, funkcia moze skoncit
	 }
  }
  echo "Odobrat pizzu sa nepodarilo, pretoze Pizza s id $idPizza sa v kosiku nenachadza<br>" ;        
  
}

function odobratZKosikaPodlaIndexu($index){
  if($this->pizza[$index]!=null) { 
     $this->sumarize-=$this->pizza[$index]->getCena(); 
     $this->pocetPizza--;
     $this->pizza[$index]=null; 
  }
 
  
}



function writeKosik(){
  $pocet=$this->getPocetPizza();
  echo "Pizze spolu: $pocet";
  echo "<br>";
  //echo $this->pizza[0]->getNazov();
  for($i=0;$i<$this->maxIndexPizza;$i++){
     if($this->pizza[$i]!=null){
	   echo "Nazov: ".$this->pizza[$i]->getNazov()." ";
	   echo "Cena: ".$this->pizza[$i]->getCena(). "€ ";
	   echo "<hr><br>";
	 }
  }
}

function writeKosikDonaska(){
  echo "<form name=\"kosik\" method=\"post\" action=\"\">";
  $pocet=$this->getPocetPizza();
  echo "Pizze spolu: $pocet";
  echo "<br>";
  //echo $this->pizza[0]->getNazov();
  for($i=0;$i<$this->maxIndexPizza;$i++){
     if($this->pizza[$i]!=null){
	   echo "Nazov: ".$this->pizza[$i]->getNazov()." ";
	   echo "Cena: ".$this->pizza[$i]->getCena(). "€ ";
	   $index=$this->pizza[$i]->getIndex();
	   echo "<input type=\"hidden\" name=\"odobrat\" value=\"$index\">";
	   echo "<input type=\"submit\" value=\"Odober\">";
	   echo "<hr><br>";
	 }
  }
  echo "</form>";
}

function getPizzaStringg(){
	$string = "";
	for($i=0;$i<$this->maxIndexPizza;$i++){
	   if($this->pizza[$i]!=null){
		$newstr = $this->pizza[$i]->getId();
		$string = $string . ', ' . $newstr;
	   }
	}
	return $string;
}

function getPocetPizza(){
  return $this->pocetPizza;
}

function getSumarize(){
  return $this->sumarize;
}

}


?>
