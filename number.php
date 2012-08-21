<? session_start();?>
<? include("stdio.php"); ?>
<vxml version="2.1"
 xmlns="http://www.w3.org/2001/vxml">
 
	<menu id="number_menu" dtmf="true">

	<prompt> <!-- We ask the user to choose an action, search, edit or add -->
			<audio src="<?php get_audio(9, "file") ?>"><?php get_audio(9, "message") ?></audio>
			<audio src="<?php get_audio(18, "file") ?>"><?php get_audio(18, "message") ?></audio>
		</prompt>
		<choice next="main_menu.php">back</choice>
 		<choice next="search.php">search</choice>
		<choice next="edit.php">edit</choice>
 		<choice next="add.php">add</choice>
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
			</audio>	<exit />
		</block>
	</form>
</vxml>