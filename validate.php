<? session_start();?>
<vxml version="2.1"
 xmlns="http://www.w3.org/2001/vxml">
 
<?php 
  include("connect.php");
	include("stdio.php");


	//It's a good idea to make sure the data is there to get.
  if (isset($_REQUEST["user_ident"]) && isset($_REQUEST["user_pass"])) 
  {  
  
  	//picks up the data entered
	  $user_given = $_REQUEST["user_ident"];
	  $pass_given = $_REQUEST["user_pass"];
  
		//fetches the correct password, username and userID from the database	
		$resultset = mysql_query("SELECT ID, passcode, user FROM `avxml_user` WHERE ID='$user_given'");
		while ($rows = mysql_fetch_array($resultset)) 
		{ 
		
		extract($rows);	//With this I can refer directly to the data instead of using it from an array
		
		}
 		
 		mysql_close($conn); //Closing our connection
		
		//The passcode is encrypted in the database, so we encrypt the passwod the user entered to compare
		$pass_encr = md5($pass_given);

		//If everything is a-ok, $access is 1, otherwhise it's 0. Besides, we set a session-variable with the userid.
 		if ($pass_encr == $passcode){
 		$access=1;
 		$_SESSION["user"]=$user_given;
 		}else{
 		$access=0;
 		
 		
 		}
 		echo "<var name=\"access\" expr=\"$access\" />";
		
  }
?>
 
 
  <form>  
	  <block> 
	  	<if cond="access=='1'" >
				<audio src="<?php get_audio(10, "file") ?>">
					<?php get_audio(10, "message") ?>
				</audio>
				<audio>
					<?php echo $user; ?>
				</audio>
				<goto next="main_menu.php"/>
			<elseif cond="access=='0'" />
				<audio src="<?php get_audio(2, "file") ?>">
					<?php get_audio(2, "message") ?>
				</audio>	
				<goto next="index.php"/>
			</if>
	  </block>
	</form>
</vxml>