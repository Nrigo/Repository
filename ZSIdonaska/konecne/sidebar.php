<div class="sidebar1">
    <ul class="nav">
      <li><a href="index.php">Domov</a></li>
      <li><a href="donaska.php">Donáška</a></li>
      <li><a href="kontakt.php">Kontakt</a></li>
	  <?php if($_SESSION["prihlaseny"]==1){ ?>
	  <li><a href="odhlasenie.php">Odhlásenie</a></li>
	  <?php } else { ?>
	  <li><a href="registracia.php">Registrácia</a></li>
	  <?php }; ?>
    </ul>
	<?php if($_SESSION["prihlaseny"]!=1){ ?>
    <div class="prihlasenie">
	 
      <h4>Prihlásenie </h4>
        <form action="prihlasenie.php" method="post">
            <p><strong>Meno: </strong>
              <input type="text" name="login" size="8" />
              <br />
              <strong>Heslo: </strong>
              <input type="password" name="passwd" size="8" />
              <br />
              <input class="button" type="submit" value="prihlásiť sa" />
            </p>
         </form>
     </div>
	 <?php };  ?>
	 
</div> <!-- end .sidebar1 -->
