<? session_start();?>
<? include("stdio.php"); ?>
<vxml version="2.1"
 xmlns="http://www.w3.org/2001/vxml">

	<form id="edit">
		<field name="edit_user">
			<grammar type="application/x-gsl" mode="voice">
 				<![CDATA[ <?php //the php is for the sake of my syntax-hightlighting ?> 
					[
						<?php //this chunk of code populates the grammar from the database
							include("connect.php");
							$resultat = mysql_query("SELECT name, ID FROM `avxml_entries` ");
								while ($raekke = mysql_fetch_array($resultat)) {
							 	  extract($raekke);	
							 	  $name =strtolower($name);
									echo  "[$name] {<edit_user \"$ID\">}
									"; //vxml doesn't like \n, so I have to cheat to get well-formatted output.
							 	}
						 		mysql_close($conn);
						?>
					]			 	
				]]>
			</grammar >
			
			<prompt> <!-- we tell the user to search for a name -->
				<audio src="<?php get_audio(6, "file") ?>">
					<?php get_audio(6, "message") ?>
				</audio>
			</prompt>
			
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
	</field>
	
		<field name="new_number" type="digits?length=10"> <!-- we ask for the new number -->
			<prompt>
				<audio src="<?php get_audio(23, "file") ?>">
					<?php get_audio(23, "message") ?>
				</audio>
			</prompt>
			<filled> 
		    <submit next="edituser.php" method="post" namelist="edit_user new_number" enctype="application/x-www-form-urlencoded"/> 
			</filled>
		</field>
	</form>
</vxml>