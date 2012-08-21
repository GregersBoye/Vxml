
<!-- opdatere -->

<?
$resultat = mysql_query("UPDATE `tabel` SET col = 'værdi' WHERE row='some'");
?>

<!-- indsætte -->

<?
$komand = "INSERT INTO `tabel` ( `col1` , `col2` ) 
VALUES ('værdi1', 'værdi2')";
mysql_query($komand);
?>

<!-- hente -->

<?
	$resultat = mysql_query("SELECT col FROM `tabel` WHERE row='some'");
	while ($raekke = mysql_fetch_array($resultat)) {
 	  extract($raekke);	
 	}
?>

<!-- slette -->

<?
	$resultatw = mysql_query("DELETE FROM	`tabel` WHERE row='some'");
	?>