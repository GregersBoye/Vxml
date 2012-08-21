<? session_start();?>
<?
$current_user = $_SESSION["user"];

?>
<? include("stdio.php"); ?>
<vxml version="2.1"
 xmlns="http://www.w3.org/2001/vxml">
 
	<menu id="number_menu" dtmf="true">
		<prompt> <!-- We ask the user to choose an action, search, edit or add -->
			<audio src="<?php get_audio(9, "file") ?>">
				<?php get_audio(9, "message") ?>
			</audio>
			<audio src="<?php get_audio(19, "file") ?>">
				<?php get_audio(19, "message") ?>
			</audio>
		</prompt>
		<choice next="main_menu.php">back</choice>
 		<choice next="#edit">change</choice>
 		<choice next="#auto">auto-login</choice>
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

	<form id="back">
		<block>	
			<goto next="main_menu.php" />
		</block>
	</form>
		
	<form id="edit">
		<field name="new_pass" type="digits?length=1">
		
			<prompt>
				<!-- This is a proof of concept feature, so we'll keep it simple --> 
				<audio src="<?php get_audio(20, "file") ?>">
					<?php get_audio(20, "message") ?>
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
				<audio src="<?php get_audio(8, "file") ?>">
						<?php get_audio(8, "message") ?>
				</audio>
				<submit next="new_pass.php" method="post" namelist="new_pass" enctype="application/x-www-form-urlencoded"/> 
			</filled>
		</field>
	</form>

	<form id="auto">
		<var name="userID" expr="session.connection.remote.uri" />
		<field name="enable_autoLogin" type="boolean">
			<prompt>
			<audio src="<?php get_audio(21, "file") ?>">
					<?php get_audio(21, "message") ?>
				</audio>
			</prompt>	
	
			<noinput>
				<audio src="<?php get_audio(14, "file") ?>"> <!-- we ask the user if autologin should be enabled -->
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
				<audio src="<?php get_audio(8, "file") ?>">
					<?php get_audio(8, "message") ?>
				</audio>
				<submit next="autologin.php" method="post" namelist="enable_autoLogin userID" />
			</filled>
		</field>
	</form>
	
	<form id="exit">
		<block>
			<audio src="<?php get_audio(22, "file") ?>">
				<?php get_audio(22, "message") ?>
			</audio>
			<exit />
		</block>
	</form>
</vxml>