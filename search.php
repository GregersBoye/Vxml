<? session_start();?>
<? include("stdio.php"); ?>
<vxml version="2.1"
 xmlns="http://www.w3.org/2001/vxml">
	<form id="search">
		<field name="name">
		
			<grammar type="application/x-gsl" mode="voice">
 				<![CDATA[ <?php //the php is for the sake of my syntax-hightlighting ?> 
					[
						<?php //this chunk of code populates the grammar from the database
							include("connect.php");
								$resultat = mysql_query("SELECT name, ID FROM `avxml_entries` ");
								while ($raekke = mysql_fetch_array($resultat)) {
							 	  extract($raekke);	
							 	  $name =strtolower($name);
									echo  "[$name] {<name \"$ID\">}
									"; //vxml doesn't like \n, so I have to cheat to get well-formatted output.
							 	}
						 		mysql_close($conn);
						?>
					]			 	
				]]>
			</grammar>

			<prompt>
				<audio src="<?php get_audio(6, "file") ?>"> <!-- asks the user for the name to find -->
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

			<filled>
				<audio src="<?php get_audio(11, "file") ?>"> <!-- confirms we got the input -->
					<?php get_audio(11, "message") ?>
				</audio>
				<submit next="process.php?type=search" method="post" namelist="name"/> 
			</filled>
			
		</field>
	</form>
</vxml>