<? session_start();?>
<? include("stdio.php"); ?>
<? include("connect.php"); ?>

<vxml version="2.1"
 xmlns="http://www.w3.org/2001/vxml">
<?
	$adress = $_REQUEST["userID"];
	
	//we get the data for the user - if it exists
	$resultat = mysql_query("SELECT * FROM `avxml_user` WHERE auto_login='$adress'");
	while ($raekke = mysql_fetch_array($resultat)) {
 	  extract($raekke);	
 	}
 	
 	//If the user doesn't have a autologin, the database will return "false"
 	//We can't know what the auto_login is, but if it is NOT false, it's there.
 	
 	if (isset($auto_login) && $auto_login!="false"){
 		
	 	$SESSION["user"]=$ID;
	 	$user = strtolower($user);
 	?>
 		
	<form id="welcome">
		<block> <!-- we welcoms the user... -->
			<audio src="<?php get_audio(10, "file") ?>">
				<?php get_audio(10, "message") ?>
			</audio>
			<audio> <!-- ...by name -->
				<?php echo $user; ?>
			</audio>
			<goto next="main_menu.php"/>
 		</block>
 	</form>
 	<?
 	}else{
?>

	<form id="form_Main"> 
		<block>
			<audio src="<?php get_audio(1, "file") ?>"> <!-- welcome -->
				<?php get_audio(1, "message") ?>
			</audio>
		</block>
	  <field name="user_ident" type="digits?length=1">
		  <prompt>
		  	<audio src="<?php get_audio(12, "file") ?>"> <!-- we ask for id-number -->
		  		<?php get_audio(12, "message") ?>
		  	</audio>
		  </prompt>
	  </field>
	
		<noinput>
			<audio src="<?php get_audio(14, "file") ?>">
				<?php get_audio(14, "message") ?>
			</audio>
			<reprompt />
		</noinput>
							
		<nomatch>
				<audio src="<?php get_audio(4, "file") ?>">
					<?php get_audio(4, "message") ?>
				</audio>
			<reprompt />
	</nomatch>

	  <field name="user_pass" type="digits?length=1"> 
	    <prompt>
	    	<audio src="<?php get_audio(8, "file") ?>"> <!-- thanks for the ID -->
	    		<?php get_audio(8, "message") ?>
	    	</audio>
	    </prompt>
	    
	    <prompt>
	    	<audio src="<?php get_audio(5, "file") ?>"><!--  - and for passcode -->
	    		<?php get_audio(5, "message") ?>
	    	</audio>
	    </prompt>
	  
	   	<filled>
        <submit next="validate.php" method="post" namelist="user_ident user_pass"/> 
  		</filled>
 	 </field>
	</form>
<? } ?>
</vxml>