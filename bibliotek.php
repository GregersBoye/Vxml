
<!-- opdatere -->

<?
$resultat = mysql_query("UPDATE `tabel` SET col = 'v�rdi' WHERE row='some'");
?>

<!-- inds�tte -->

<?
$komand = "INSERT INTO `tabel` ( `col1` , `col2` ) 
VALUES ('v�rdi1', 'v�rdi2')";
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