<?php include_once 'spojenie.php';
	  
	  if(isset($_POST['zam_pridat'])){
	  $meno = $_POST['zam_meno'];
	  $priezv = $_POST['zam_priezvisko'];
	  $ulica = $_POST['zam_ulica'];
	  $mesto = $_POST['zam_mesto'];
	  $tel = $_POST['zam_tel'];
	  $email = $_POST['zam_email'];
		 if(!mysql_query("INSERT INTO zamestnanci VALUES(0,'$meno','$priezv','$ulica','$mesto','$tel','$email')")) die('Invalid query: ' . mysql_error());
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
    if(confirm("Skutocne vymazat zamestnanca?")){
        form.submit();
    }
}
</script> 
</head>

<body>
<form action="administracia.php?p=zamestnanci" method="POST" class="administracia">
    <fieldset>
      <legend><strong>Pridať zamestnanca</strong></legend>
<table width="327" cellpadding="0" cellspacing="1" class="registration">
                <tr>
                  <th width="63">Meno:</th>
                  <td width="255">
                    <input type="text" name="zam_meno" value="" />
                  </td>
                </tr>
                <tr>
                  <th>Priezvisko:</th>
                  <td>
                    <input type="text" name="zam_priezvisko" value="" />
                  </td>
                </tr>
                <tr>
                  <th>Ulica:</th>
                  <td>
                    <input type="text" name="zam_ulica" value="" />
                  </td>
                </tr>
                <tr>
                  <th>Mesto:</th>
                  <td>
                    <input type="text" name="zam_mesto" value="" />
                  </td>
                </tr>
               <tr>
                 <th>Tel. číslo:</th>
                 <td>
                   <input type="text" name="zam_tel" value="" />
                 </td>
				</tr>
				<tr>
                  <th>Email:</th>
                  <td>
                    <input type="text" name="zam_email" value="" />
                  </td>
                </tr>
      </table>
   
             <input type="submit" name="zam_pridat" id="zam_pridat" value="Pridat" />
    </fieldset>
  </form> 
  <table width="90%" border="0" class="tabulka"><caption>Prehľad zamestnancov</caption>
    <tr>
      <th class="id">id</th>
      <th class="width110">Meno</th>
      <th class="width110">Priezvisko</th>
      <th class="width110">Ulica</th>
      <th class="width110">Mesto</th>
      <th class="width110">Tel_cislo</th>
      <th class="width110">Email</th>
      <th class="width110">Akcia</th>
    </tr>
    <?php 
    $query  = "SELECT id,meno,priezvisko,ulica,mesto,tel_cislo,email FROM zamestnanci";
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
	   echo "<td>
	         <form action=\"vymazat_zamestnanca.php\" method=\"POST\" onSubmit=\"return false;\">
			 <input type=hidden name=id_zamestnanca value=\"$row[0]\" />
	         <input type=\"submit\" name=\"zamestnanec_vymazat\" id=\"$row[0]\" value=\"Vymazat\" onClick=\"getPermission(this.form)\" />
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
