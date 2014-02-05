<!DOCTYPE html PUBLIC "-//W4C//DTD XHTML 1.0 TRANSITIONAL//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml-transitional.dtd">
<html>
<head>


<?php include ("sound_board_header2.php"); ?>


</head>

<body>
<?php

	$directory = "audio/";
	$images = glob($directory . "*.mp3");
	
	foreach($images as $image)
	{
	  echo "<div style='display:none;' class='data'>" . $image 	. "*!" . "</div>";
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
    
    
    	
      
      	<script type="text/javascript">
		$(document).ready(function(){
			
			
			// load screen
			$('html').prepend('<div class="loading"><h1>LOADING...</h1></div>');					   
			setTimeout(function(){
				var k = 0;
				$('p.song_title').each(function(){
					var p_html = $(this).html();
					var new_title = $(this).parent().parent().attr('song');
					var new_title_s = new_title.split('*!');
					if(p_html == "null<br><span><i>by: null</i></span>"){
						$(this).html(new_title_s[0]);
					} else if (p_html == "undefined<br><span><i>by: undefined</i></span>"){
						$(this).html(new_title_s[0]);
					}
					k++;
				});
				$('div.loading').animate({
				opacity: 0,
				}, 1000);
					setTimeout(function(){
						$('div.loading').css('z-index','-10');
					}, 1000);	
			}, 2000);
			
		});
		</script>
      
       
    
</body>
</html>
