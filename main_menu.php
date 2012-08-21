<? session_start();?>
<? include("stdio.php"); ?>
<vxml version="2.1"
 xmlns="http://www.w3.org/2001/vxml">
 
	<menu id="main_menu" dtmf="true">
		<prompt> <!-- We ask the user to choose an action, search, edit or add -->
			<audio src="<?php get_audio(13, "file") ?>"><?php get_audio(13, "message") ?></audio>
			<audio src="<?php get_audio(3, "file") ?>"><?php get_audio(3, "message") ?></audio>
		</prompt>
		
 		<choice next="number.php">number</choice>
 		<choice next="user.php">user</choice>
 		<choice next="#exit">exit</choice>
 				
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
 	</menu> 

		
	<form id="exit"> 
		<block>
			<audio src="<?php get_audio(22, "file") ?>">
				<?php get_audio(22, "message") ?>
			</audio><exit />
		</block>
	</form>
</vxml>