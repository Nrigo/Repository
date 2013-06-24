<?php include_once 'spojenie.php';
      include_once 'class/Pizza.php';
	 
	  if(isset($_POST["pizza_pridat"])){
	     $pizza=serialize(new Pizza($_POST["pizza_nazov"],$_POST["pizza_cena"],$_POST["pizza_gramaz"],$_POST["zlozenie"]));
		 if(!mysql_query("INSERT INTO pizza(pizzaObj) VALUES('$pizza')")) die('Invalid query: ' . mysql_error());
	  }
	  else if($_POST){
	    $id=$_POST["pizza_vyber"];
	    if(!mysql_query("DELETE FROM pizza WHERE id=$id")) die('Invalid query: ' . mysql_error());
	  }
	  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Donaska Panci - Administracia</title>
<style type="text/css"></style>
<link href="css/administracia.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function getPermission(form){
    if(confirm("Vymazat pizzu?")){
        form.submit();
    }
}
</script> 
</head>

<body>
  <p>
  <form action="" method="post" class="vyber" onSubmit="return false;">
    <label for="pizza_vyber2">Vyber pizze: </label>
      <select name="pizza_vyber" id="pizza_vyber2">
	    <?php 
	     $query  = "SELECT pizzaObj,id FROM pizza";
         $result = mysql_query($query);
         while($row = mysql_fetch_row($result)){
		     $pizza=unserialize($row[0]);
			 $nazov=$pizza->getNazov();
			 $id=$row[1];
			 echo " <option value=\"$id\">$nazov</option> ";
		 }
	  ?>
    </select>
      <input type="submit" name="pizza_vymazat" id="pizza_vymazat" value="Vymazat" onClick="getPermission(this.form)" />
  </form>
   </p>
  <div class="clear"></div>
  <form action="administracia.php?p=pizza" method="POST" class="administracia">
    <fieldset>
      <legend><strong>Pridať pizzu</strong></legend>
<table width="327" cellpadding="0" cellspacing="1" class="registration">
                <tr>
                  <th width="63">Názov:</th>
                  <td width="255">
                    <input type="text" name="pizza_nazov" value="" />
                  </td>
                </tr>
                <tr>
                  <th>Cena:</th>
                  <td>
                    <input type="text" name="pizza_cena" value="" />
                  </td>
                </tr>
                <tr>
                  <th>Gramaž:</th>
                  <td>
                    <input type="text" name="pizza_gramaz" value="" />
                  </td>
                </tr>
                <tr>
                  <th>Zloženie:</th>
                  <td>
                    <textarea name="zlozenie" cols="40" rows="3" id="zlozenie"></textarea>
                  </td>
                </tr>
      </table>
   
             <input type="submit" name="pizza_pridat" id="pizza_pridat" value="Pridat" />
    </fieldset>
  </form> 
  <p>&nbsp;</p>
</body>
</html>
