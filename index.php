<!DOCTYPE html PUBLIC "-//W4C//DTD XHTML 1.0 TRANSITIONAL//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml-transitional.dtd">
<html>
<head>

<?php include ("header.php"); ?>
<?php include ("classes/Soundboard.php"); ?>
<?php $soundboard = new Soundboard(); ?>

</head>

<body>
<audio autoplay="false" ontimeupdate="document.getElementById('tracktime').innerHTML = Math.floor(this.currentTime); document.getElementById('durationtml').innerHTML = Math.floor(this.duration);" id="html5audio" class="playing" controls="controls" style="position:fixed; width:101%; display:block; height:32px; top:0px; z-index:10; border-bottom:6px #900 solid; background:black; margin:0 0 0 -8px;">
    	Your browser hates HTML5 Audio... Download Google Chrome.
</audio>
    <span id="tracktime" style="display:none;"></span>
    <span id="durationtml" style="display:none;"></span>
    <div id="soundboard_container">
		
		
		<?php
				$soundboard->getSounds('audio');
		?>
   	 
        
    </div><!-- END OF container -->

</body>
</html>
