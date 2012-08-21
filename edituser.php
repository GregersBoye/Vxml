<? session_start(); ?>
<vxml version="2.1" xmlns="http://www.w3.org/2001/vxml">
	<?
		include("connect.php");
		include("stdio.php");

 		$user_edit = $_REQUEST["edit_user"]; 
 		$new_number = $_REQUEST["new_number"];
 		
 		
 		//Firstly we update the database with the new number, and then we fetches it.
		$resultt = mysql_query("UPDATE `avxml_entries` SET phone = '$new_number' WHERE ID='$user_edit'");
		$resultat = mysql_query("SELECT  ID, phone, name FROM `avxml_entries` WHERE ID='$user_edit'");
		while ($raekke = mysql_fetch_array($resultat)) {
		  extract($raekke);	
	   
		}
		mysql_close($conn);
		
	?>
	
		
	<menu id="postedit">
		<audio>The new number on <? echo $name; ?> is <? echo $phone; ?></audio>
		<prompt>
			<audio src="<?php get_audio(16, "file") ?>"> <!-- we present the user with some options -->
				<?php get_audio(16, "message") ?>
			</audio>
			<audio src="<?php get_audio(17, "file") ?>">
				<?php get_audio(17, "message") ?>
			</audio>
		</prompt>	
		<choice next="number.php">back</choice>
		<choice next="edit.php">edit</choice>
		<choice next="main_menu.php">main menu</choice>
		<choice next="#exit">exit</choice>	
	</menu>
			
	<form id="exit">
		<block>
			<audio src="<?php get_audio(22, "file") ?>">
				<?php get_audio(22, "message") ?>
			</audio><exit />
		</block>
	</form>
</vxml>