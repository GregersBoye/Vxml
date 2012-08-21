<? session_start(); ?>
<vxml version="2.1" xmlns="http://www.w3.org/2001/vxml">
	<?
		include("connect.php");
		include("stdio.php");
		
			$name = $_REQUEST["name"]; 
			// we get the data for the user we searched for
			$resultat = mysql_query("SELECT name, ID, phone FROM `avxml_entries` WHERE ID='$name'");


		while ($raekke = mysql_fetch_array($resultat)) {

 			  extract($raekke);	
				if (strlen($phone) ==10){  //we'll format the number to xxx-xxx-xxxx
 				  for ($i=0;$i<3;$i++){
 						$phone_split = $phone_split.substr($phone,$i,1)." ";
 	  		  }
 	  		  	$phone_split = $phone_split.". ";
 	  		   for ($i=3;$i<6;$i++){
 						$phone_split = $phone_split.substr($phone,$i,1)." ";
 	  		  }
 	  		  	$phone_split = $phone_split.". ";
 	  		   for ($i=6;$i<10;$i++){
 						$phone_split = $phone_split.substr($phone,$i,1)." ";
 	  		  }
 	  		  	}
 	  	  if (strlen($phone) ==11){ //if a corporate-number we'll format to x-xxx-xxx-xxx-xxxx
 	  	  	$phone_split = $phone_split.substr($phone,0,1)." ".substr($phone,1,3).", ";
 	 		   	
 	 		   		$phone_split = $phone_split.". ";
 	  		   for ($i=4;$i<7;$i++){
 						$phone_split = $phone_split.substr($phone,$i,1)." ";
 	  		  }
 	  		  	$phone_split = $phone_split.". ";
 	  		   for ($i=7;$i<11;$i++){
 						$phone_split = $phone_split.substr($phone,$i,1)." ";
 	  		  }
 	  	  }
				$name = strtolower($name);
			}
			mysql_close($conn);
	 ?>
 	<menu id="postnumber" dtmf="true">
		<prompt> <!-- we now ask the user what he/she wants to do -->
		 	<audio>
		 		<? echo $name;?> has the number <? echo $phone_split; ?>. 
		 	</audio> 
			<audio src="<?php get_audio(16, "file") ?>"> <!-- get ready for options -->
				<?php get_audio(16, "message") ?>
			</audio>
			<audio src="<?php get_audio(15, "file") ?>"> <!-- more options after the number has been found -->
				<?php get_audio(15, "message") ?>
			</audio>
		</prompt>

		<nomatch>
			<audio src="<?php get_audio(4, "file") ?>">
				<?php get_audio(4, "message") ?>
			</audio>
			<reprompt />
		</nomatch>
		
		<noinput>
			<audio src="<?php get_audio(14, "file") ?>">
				<?php get_audio(14, "message") ?>
			</audio>
			<reprompt />
		</noinput>
		<choice next="main_menu.php">main menu</choice>
		<choice next="search.php">search</choice>
		<choice next="#postnumber">repeat</choice>
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

 

 

 

 

 

 

 

 

 

 

 