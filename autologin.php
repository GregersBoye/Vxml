<? session_start();?>
<? $current_user = $_SESSION["user"]; ?>
<? include("stdio.php"); ?>
<? include("connect.php"); ?>
<vxml version="2.1"
 xmlns="http://www.w3.org/2001/vxml">
 
 <?
	$status = $_REQUEST["enable_autoLogin"];
	
	if ($status=="true"){
 		$adress = $_REQUEST["userID"];
		$resultat = mysql_query("UPDATE `avxml_user` SET auto_login = '$adress' WHERE ID='$current_user'");
		$status = "enabled";
	}
	else{
		$resultat = mysql_query("UPDATE `avxml_user` SET auto_login = '' WHERE ID='$current_user'");
		$status="disabled";
 }
 
 
 ?>
 <!-- we'll tell the user the outcome -->
	<form>
 		<block>
 			<audio>
 				autologin is <? echo $status; ?> 
 			</audio>
 			<goto next="user.php" />
 		</block>
	</form>
</vxml>