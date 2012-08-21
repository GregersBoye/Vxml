<? session_start(); ?>
<?

include("connect.php");
$current_user = $_SESSION["user"]; // get the user's ID
$new_pass =$_REQUEST["new_pass"]; // get the new passcode
$new_pass_enc = md5($new_pass); // get the MD5-hash of the new passcode for the database
$resultat = mysql_query("UPDATE `avxml_user` SET passcode = '$new_pass_enc' WHERE ID='$current_user'");


?>


<? include("stdio.php"); ?>
<vxml version="2.1"
 xmlns="http://www.w3.org/2001/vxml">
 
 <form id="pass_changed">
 	<block>
 		<audio>
 			Your passcode has been changed, it is now <? echo $new_pass; ?>
 		</audio>
 	<goto next="main_menu.php" />
 	</block>
 </form>
</vxml>