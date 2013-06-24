<?php include_once 'spojenie.php' ?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Donaska Panci - Administracia</title>
<style type="text/css"></style>
<link href="css/administracia.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function getPermission(form){
    if(confirm("Skutocne vymazat uzivatela?")){
        form.submit();
    }
}
</script> 
</head>

<body>
  <table width="90%" border="0" class="tabulka"><caption>Prehľad registrovaných užívateľov</caption>
    <tr>
      <th class="id">id</th>
      <th class="width110">Meno</th>
      <th class="width110">Priezvisko</th>
      <th class="width110">Ulica</th>
      <th class="width110">Mesto</th>
      <th class="width110">Tel_cislo</th>
      <th class="width110">Email</th>
      <th class="width110">Login</th>
      <th class="width110">Akcia</th>
    </tr>
   <?php 
    $query  = "SELECT id,meno,priezvisko,ulica,mesto,tel_cislo,email,login FROM users";
    $result = mysql_query($query);
    while($row = mysql_fetch_row($result)){
	   echo "<tr>";
	   echo "<td class=\"id\">$row[0]</td>";
	   echo "<td >$row[1]</td>";
	   echo "<td >$row[2]</td>";
	   echo "<td >$row[3]</td>";
	   echo "<td >$row[4]</td>";
	   echo "<td >$row[5]</td>";
	   echo "<td >$row[6]</td>";
	   echo "<td >$row[7]</td>";
	   echo "<td>
	         <form action=\"vymazat_uzivatela.php\" method=\"POST\" onSubmit=\"return false;\>
			 <input type=hidden name=id_uzivatela value=\"$row[0]\" />
	         <input type=\"submit\" name=\"uzivatel_vymazat\" id=\"$row[9]\" value=\"Vymazat\" onClick=\"getPermission(this.form)\" />
			 </form>
			 </td>";
	   echo "</tr>";
	   
	         
	   }
?>
  </table>
  <div class="clear"></div> 
  <p>&nbsp;</p>
</body>
</html>
