

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
  <?php include 'sidebar.php';?> 
  <div class="content">
    <h1>Registrácia</h1>
    <p >Korekným vyplnením následného formulára sa zaevidujete medzi našich stálych klientov. Po registrácii Vám bude zaslaný informatívny e-mail, na uvedenú adresu, o realizovanej registrácii. <br />
    </p>
    <p >Svojou registráciou vyjadrujete súhlas s prevádzkovými pravidlami webu a s <strong>obchodnými podmienkami</strong>, vrátane uznesenia o ochrane osobných údajov. Ďakujeme za pochopenie.</p>
    <p>&nbsp;</p>
    
         
         <form method="post" action=" " class="registration">
             <div class="registration">
			<?php
   include 'spojenie.php';
   include 'class/Kosik.php';
   if($_POST){
     $platnost=1;
	 $query  = "SELECT login FROM users";
     $result = mysql_query($query);
     while($row = mysql_fetch_row($result)){
	    if(strcmp($row[0],$_POST["login"])==0) { echo "Taketo prihlasovacie meno uz existuje, musite zvolit ine<br>"; $platnost=0;}
	 }
     if(strcmp("",$_POST["meno"])==0) { echo "Nevyplnene meno<br>"; $platnost=0; } 
	 if(strcmp("",$_POST["priezvisko"])==0) { echo "Nevyplnene priezvisko<br>";$platnost=0; } 
	 if(strcmp("",$_POST["ulica"])==0) { echo "Nevyplnena ulica<br>";$platnost=0; } 
	 if(strcmp("",$_POST["mesto"])==0) { echo "Nevyplnene mesto<br>";$platnost=0; } 
	 if(strcmp("",$_POST["login"])==0) { echo "Nevyplneny login<br>";$platnost=0; } 
	 if(strcmp("",$_POST["passwd"])==0 || strcmp("",$_POST["passwd_retype"])==0) { echo "Musite vyplnit heslo<br>";$platnost=0; } 
	 if(strcmp($_POST["passwd"],$_POST["passwd_retype"])!=0) { echo "Hesla sa nezhodnuju<br>";$platnost=0; } 
	 if(strcmp("",$_POST["telefon"])==0) { echo "Nevyplneny telefon<br>";$platnost=0; } 
	 if(strcmp("",$_POST["email"])==0) { echo "Nevyplneny email<br>";$platnost=0; } 
	 if($_POST["suhlasim_s_podmienkami"]==0) echo "Musite suhlasit s podmienkami<br>";
	 if($_POST["send_mailinglist"]==0) $mailing="nie"; else $mailing="ano";
	 
	 if($platnost==1){
	   $heslo_md5=md5($_POST["passwd"]);
	   if (!mysql_query("INSERT INTO users(meno,priezvisko,ulica,mesto,tel_cislo,email,login,password,send_mailinglist,poznamka) VALUES('$_POST[meno]','$_POST[priezvisko]','$_POST[ulica]','$_POST[mesto]','$_POST[telefon]','$_POST[email]','$_POST[login]','$heslo_md5','$mailing','$_POST[poznamka]')")) {
           die('Invalid query: ' . mysql_error());
       }
	   session_start();
	   $_SESSION["prihlaseny"]=1;                 // ak je 1 tak je prihlaseny, ak 0 tak je odhlaseny
	   $_SESSION["login"]=$_POST["login"];
	   $kosik = new Kosik();
	   $_SESSION['kosik'] = $kosik;
	   header("location:index.php");
	 }
	 
	 
	 
   }
?>
            <table cellpadding="0" cellspacing="1" class="registration">
              <tr>
                <th>*
                    Meno</th>
                <td>
                  <input type="text" name="meno" value="" />
                </td>
              </tr>
              <tr>
                <th>*
                    Priezvisko</th>
                <td>
                  <input type="text" name="priezvisko" value="" />
                </td>
              </tr>
              <tr>
                <th>*
                    Ulica, číslo</th>
                <td>
                  <input type="text" name="ulica" value="" />
                </td>
              </tr>
              <tr>
                <th>*
                    Mesto</th>
                <td>
                  <input type="text" name="mesto" value="" />
                </td>
              </tr>
              <tr>
                <th class="separator">*
                            Prihlasovacie meno</th>
                <td class="separator">
                  <input type="text" name="login" value="" />
                </td>
              </tr>
              <tr>
                <th>*
                            Prihlasovacie heslo</th>
                <td><input type="password" name="passwd" value="" />
                </td>
              </tr>
              <tr>
                <th>*
                            Potvrdenie hesla</th>
                <td>
                  <input type="password" name="passwd_retype" value="" />
                </td>
              </tr>
              <tr>
                <th class="separator">*
                    Telefón</th>
                <td class="separator">
                  <input type="text" name="telefon" value="" />
                </td>
              </tr>
              <tr>
                <th>*
                    E-mail</th>
                <td>
                  <input type="text" name="email" value="" />
                </td>
              </tr>
              <tr>
                <th>Zasielať mailinglist</th>
                <td>
                  <input type="checkbox" name="send_mailinglist" value="1" style="width:auto;" />
                </td>
              </tr>
              <tr>
                <th>Poznámka</th>
                <td>
                  <textarea name="poznamka" cols="30" rows="5"></textarea>
                </td>
              </tr>
              <tr>
                <td colspan="2" class="obchodne_podmienky">
                  <strong>Obchodné podmienky</strong>
                  <div>

  <p><strong>Dodacie podmienky<br /></strong></p>

  <p align="justify">Dodávky predmetu plnenia (objednaného tovaru) budú podľa objednaných produktov a prevádzkových možností predávajúceho realizované v čo najkratšom termíne. Dodanie avizujeme telefonicky, alebo e-mailom pri potvrdení objednávky. Pri doručení zásielky je povinné uviesť do adresy doručenia telefónne číslo ( doporučujeme priamo vo formulári záväznej objednávky), aby sa vedel náš pracovník s vami dohodnúť v prípade nejasností pri objednávke. Taktiež doporučujeme uviesť k adrese , na ktorej sa zdržujete, aj doplňujúce údaje ako č. dverí a iné nakoľko donášku spravidla chceme vybaviť čo v najkratšom&nbsp; čase. Miesto odberu a spôsob dodania je stanovené na základe objednávky kupujúceho. Za splnenie dodávky sa považuje dodanie predmetu plnenia na uvedené miesto. Dopravu na adresu určenia zaisťuje predávajúci. Zásielka s tovarom vždy obsahuje daňový doklad. Kupujúci sa zaväzuje prevziať objednaný tovar.</p>

  <p align="justify"><strong>Predávajúci nenesie zodpovednosť</strong>:</p>

  <ul>

    <li>za oneskorené dodanie objednaného tovaru zavinené objednávateľom , zadaním chybných objednávacích údajov, prípadne doplňujúcich údajov o objednanom jedle.<br /></li>

  </ul>

  <p><strong>Poplatky za dopravu</strong> </p>

  <p align="justify">Pri objednávke v rámci Košíc ako aj obce, Krásna nad Hor., Košická N.Ves, Ťahanovce, Myslava, Pereš, Barca,&nbsp; Šebastovce , neúčtujeme žiadne poplatky za dopravu. Ďalšie možnosti dopravy tovaru na iné vzdialenejšie miesta je potrebné dohodnúť osobne kedy Vás bude kontaktovať náš pracovník. Cena za&nbsp; 1 km je 0,50 € /15,06- SK ktorá je účtovaná iba cestou k Vám.</p>

  <p align="justify"><strong>Záruky, reklamácie</strong><br /></p>

  <p align="justify">&nbsp;Reklamáciu si zákazník môže uplatniť:</p>

  <ul>

    <li>okamžite pri preberaní objednávky<br /></li>

    <li>telefonicky po začatí konzumácie , no nesmie z objednaného tovaru chýbať viac ako 1/4<br /></li>

  </ul>

  <div align="justify">Reklamovaný tovar je potrebné uchovať do príchodu nášho pracovníka .<br /></div>

  <p>&nbsp;</p>

  <p><strong>Storno objednávky zo strany kupujúceho</strong></p>

  <p align="justify"><strong></strong>Kupujúci má právo stornovať objednávku bez udania dôvodu kedykoľvek pred jej záväzným potvrdením. Po záväznom potvrdení objednávky však iba v prípade, že predávajúci nesplní dohodnuté podmienky dodania. V prípade stornovania potvrdenej objednávky je kupujúci povinný uhradiť predávajúcemu škodu vzniknutú takýmto jednaním. Predávajúci uplatní právo na úhradu škody hlavne v prípade nákupu tovaru &quot;na objednávku&quot;, ktoré bolo nutné zaobstarať alebo v prípade, že v súvislosti so zaistením tovaru došlo už k vynaloženiu preukázateľných nákladov.</p>

  <p><strong>Storno objednávky zo strany predávajúceho</strong> </p>

  <p>Predávajúci si vyhradzuje právo zrušiť záväznú objednávku alebo jej časť v nasledovných prípadoch:</p>

  <ul>

    <li>vyskytnú sa neočakávané udalosti ktoré bránia v zrealizovaní dodania tovaru /štátny prevrat, .../ </li>

    <li>bez udania dôvodu </li>

    <li>tovar sa už nevyrába, pripadne nedodáva alebo sa výrazným spôsobom zmenila cena dodávateľa tovaru.<br /></li>

  </ul>

  <p align="justify">V prípade, že táto situácia nastane, predávajúci bude okamžite kontaktovať kupujúceho za účelom dohody o ďalšom postupe. <br /></p>

  <p><strong>Dodatky a zmeny obchodných podmienok</strong></p>

  <p align="justify">Svoje pripomienky na ďalšie skvalitnenie služieb, prípadne iných návrhov na vylepšenie nákupného systému môžete využívať FAQ , Diskusné fórum alebo e-mail. Pokiaľ sa zmenia pravidlá v internetovom obchode, zverejníme zmenené pravidlá na tejto stránke. Zaregistrovaných užívateľov budeme informovať e-mailom. Nové zmenené pravidlá vstúpia do platnosti automaticky po zverejnení na týchto stránkach. Inak sa pravidlá nemôžu meniť s výnimkou, keď sa obidve strany vzájomne dohodnú vopred, spravidla písomnou formou. Vaše ďalšie používanie služieb po zverejnení zmenených pravidiel na tejto stránke potvrdzuje Váš súhlas s novými pravidlami.</p></div>
                  <label for="i13">
                    <strong>* súhlasím s obchodnými podmienkami</strong>
                  </label>
                  <input id="i13" type="checkbox" name="suhlasim_s_podmienkami" value="1" />
                </td>
              </tr>
              <tr>
                <td colspan="2" class="info">Údaje označené * sú povinné</td>
              </tr>
            </table>
</div>
          <div class="submit">
            <input type="submit" class="send" value="Registrovať" />
          </div>
        </form>
        
    <!-- end .content --></div>
  <div class="footer">
    <p class="fltrt">Copyright Panci Sasi a Majo</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
