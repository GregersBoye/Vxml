<?php 
// This file will function as despository for all my standard-functions, hence the name

function get_audio($audio_id, $type){
	include("connect.php");
	
	$resultat = mysql_query("SELECT $type, ID FROM `avxml_prompts` WHERE ID='$audio_id'");

	while ($raekke = mysql_fetch_array($resultat)) {
 	  extract($raekke);	
 	}

	if ($type=="file"){
		$path = "prompts/";
		echo $path.$file.".wav";
	}
	else{	//we'll want this to happen even if "file" or "message" should be misspelled
		echo $message; 
	}
	
	mysql_close($conn);
}

?>