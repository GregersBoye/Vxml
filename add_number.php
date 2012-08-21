<? session_start();?>
<? include("stdio.php"); ?>
<? include("connect.php"); ?>

<vxml version="2.1"
 xmlns="http://www.w3.org/2001/vxml">
 
	 <form id="add_user">
		 <block>
			 <audio> This is the add number menu.</audio>
			 <audio></audio>
		 </block>
  <field name="new_number" type="digits?length=10">
	  <prompt> 
		  	<audio>
		  		Please enter or say the number you wish to add
		  	</audio>
		  </prompt>
	  </field>
		<field name="spelled" >
				<? /* 	<grammar type="application/x-gsl" mode="voice">
 			<![CDATA[ 
					[
						[a] {<spelled "a">
						[b] {<spelled "b">
						[c] {<spelled "c">
						[d] {<spelled "d">
						[e] {<spelled "e">
						[f] {<spelled "f">
						[g] {<spelled "g">
						[h] {<spelled "h">
						[i] {<spelled "i">
						[j] {<spelled "j">
						[k] {<spelled "k">
						[l] {<spelled "l">
						[m] {<spelled "m">
						[n] {<spelled "n">
						[o] {<spelled "o">
						[p] {<spelled "p">
						[q] {<spelled "q">
						[r] {<spelled "r">
						[s] {<spelled "s">
						[t] {<spelled "t">
						[u] {<spelled "u">
						[v] {<spelled "v">
						[w] {<spelled "w">
						[z] {<spelled "x">
						[y] {<spelled "y">
						[z] {<spelled "z">
					]			 	
				]]>
			</grammar> */ ?>
 
 </field>
 
 
 
 	  <filled>
		  <audio src="<?php get_audio(8, "file") ?>"> <!-- thanks for the ID -->
	    		<?php get_audio(8, "message") ?>
	    	</audio>
		  </filled>
		  
		  
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
	
 
 		</form>
  </vxml>