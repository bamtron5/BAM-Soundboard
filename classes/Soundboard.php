<?php

	class Soundboard{
		//todo
		//add coundown timer
		//fix safari layout, test other browsers
		//when pause, you should replay from time
		//list playing track at top
		//play list creator with drag and drop
		//import spotify playlist?
		//fade button to stop
		//space bar pauses
		//up down volume volume control
		
		
		//pass in the name of your sound directory, instanciate per directory to use multiple folders
		function getSounds($dir){
			$directories = glob($dir . "/" . "*", GLOB_ONLYDIR);
			foreach($directories as $directory){
				$dir_name = explode($dir . "/", $directory);
				$sounds = glob($directory . "/" . "*.mp3");
				echo "<div class='directory'><h1>" . $dir_name[1] . "</h1>";
				foreach($sounds as $sound)
				{	
					
					$sound_name = explode($directory . "/", $sound);
				    echo "<div class='sound' url='" . $sound . "'><figure class='playbtn'></figure><p>" . str_replace('.mp3', '', $sound_name[1]) . "</p></div>";

				}

				echo "</div><!-- end of directory -->";

			}
		}
		/*end getSounds*/	
	}

?>