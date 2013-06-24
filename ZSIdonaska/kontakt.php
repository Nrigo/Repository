<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Donášková Služba Panci</title>
<style type="text/css">
<!--
-->
</style>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/registracia.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="container">
  <div class="header"><a href="#"><img src="images/pizza-header.png" alt="Insert Logo Here" name="Insert_logo" width="800" height="200" id="Insert_logo" style="display:block;" /></a> 
    <!-- end .header --></div>
    
 <?php 
   session_start();
   include_once 'sidebar.php';?>
 
  <div class="content">
    <h1>Kontakt</h1>
    <p>V prípade že nás chcete kontaktovať vyplnťe prosím nasledujúci formulár. Tento formulár neslúži pre objednanie pizze. Pre objednanie pizze využite ponuku v Donaške.</p>
    
    
         <form method="post" action=" kontakt_poslat.php" class="registration">
             <div class="registration">
            <table cellpadding="0" cellspacing="1" class="registration">
              <tr>
                <th>*
                    Meno</th>
                <td>
                  <input type="text" name="meno"  id="meno"  />
                </td>
              </tr>
              <tr>
                <th>*
                    Priezvisko</th>
                <td>
                  <input type="text" name="priezvisko" id="priezvisko" />
                </td>
              </tr>
              <tr>
                <th class="separator">*
                    Telefón</th>
                <td class="separator">
                  <input type="text" name="telefon" id="telefon"/>
                </td>
              </tr>
              <tr>
                <th>*
                    E-mail</th>
                <td>
                  <input type="text" name="email" id="email" />
                </td>
              </tr>
              <tr>
                <th>Správa</th>
                <td>
                  <textarea name="sprava" id="sprava" cols="30" rows="5"></textarea>
                </td>
              </tr>
            </table>
</div>
          <div class="submit">
            <input type="submit" class="send" value="Poslať" />
          </div>
        </form>
        
    <!-- end .content --></div>
  <div class="footer">
    <p class="fltrt">Copyright Panci Sasi a Majo</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
