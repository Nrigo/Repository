<?$pripoj = mysql_connect("88.86.103.241", "yw_donaskovasluz", "martinmarianmichal");
if(!$pripoj):
   echo "Chyba 1 - chyba pocas pripojovania do db";
else:
   $seldb = MySQL_Select_DB("yw_donaskovasluzba");
   if(!$seldb):
      echo "Chyba 2 - chyba vyberu databazy";
   endif;
endif;
mysql_query("SET NAMES 'utf8'");
?>