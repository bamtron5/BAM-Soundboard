<!DOCTYPE html PUBLIC "-//W4C//DTD XHTML 1.0 TRANSITIONAL//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml-transitional.dtd">
<html>
<head>


<?php include ("sound_board_header2.php"); ?>


</head>

<body>
<?php

	$dir = "audio/";
	$directories = glob($dir . "*", GLOB_ONLYDIR);
	
	foreach($directories as $directory){
		$dir_name = explode($dir, $directory);
		$sounds = glob($directory . "/" . "*.mp3");
		echo "<div class='directory'><h1>" . $dir_name[1] . "</h1>";
		foreach($sounds as $sound)
		{
		  echo "<div class='data'>" . $sound 	. "*!" . "</div>";
		}
		
		echo "</div>";
		
	}
	
	
	


?>



			
	<audio autoplay="false" ontimeupdate="document.getElementById('tracktime').innerHTML = Math.floor(this.currentTime); document.getElementById('durationtml').innerHTML = Math.floor(this.duration);" id="html5audio" class="playing" controls="controls" style="position:fixed; width:100%; display:block; height:32px; top:0px; z-index:10; border-bottom:6px #900 solid; background:black; margin:0 0 0 -8px;">
    	Your browser hates HTML5 Audio... Download Google Chrome.
    </audio>
    <span id="tracktime" style="display:none;"></span>
    <span id="durationtml" style="display:none;"></span>
    <div class="sound_board_container">
    	<table class="sound_board" width="1015">
        	<tr>
    			<td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        
    </div><!-- END OF container -->

</body>
</html>
