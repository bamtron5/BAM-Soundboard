<meta name="robots" content="noindex" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>BrandonAM - Sound Board</title>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/css.css"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script src="js/binaryajax.js"></script>
<script src="js/id3.js"></script>

<script type="text/javascript">

//AJAX #1
$(document).ready(function() {
	 
  		var td = 0;
		var td3 = 0;						  
		var data_holder = $('div.data');
		var soundtag_l = $('div.data').size() - 1;	
		
		for (var i = 0; i <= soundtag_l; i++){
			var soundtag_t = $(data_holder).eq(i).text();
		
			   if (td3 <= 2){
					$('table.sound_board tr td').eq(td).append('<div class="sound_container" song="' + soundtag_t + '"><div class="sound"><img src="images/play.gif" class="soundimg"></div></div>');
					td3++;
					td++;
				
				//do your thing but create new <tr> set if your td #3
				} else if (td3 === 3){
					$('table.sound_board tr td').eq(td).append('<div class="sound_container" song="' + soundtag_t + '"><div class="sound"><img src="images/play.gif" class="soundimg"></div></div>');
					$('table.sound_board').append('<tr><td></td><td></td><td></td><td></td></tr>');
					td3 = 0;
					td++;
				};//end of if
		}; // end of for

	});


	//Click for sound
	$('div.sound_container').live("click",function(){
		$('div.sound img').each(function(){
			$(this).attr('src','images/play.gif')
		});
		
		var clicked_src = $(this).attr('song').split('*!');
		var assem_src =  clicked_src[0];
		var audio_player_class = $('audio#html5audio').attr('class');
		var audio_player = $('audio#html5audio');
		var current_src = $(audio_player).attr('src');
		
		
		
		//IF you are paused un-pause with currently clicked item
		if(audio_player_class == 'paused'){
			$(audio_player).attr('src', assem_src);
			document.getElementById('html5audio').play();
			$(audio_player).attr('class','playing');
			$('div[song^="' + assem_src + '"] img').attr('src','images/pause.gif');
		//IF you are playing and you're tyring to pause the same item then pause
		} else if (current_src == assem_src && audio_player_class == 'playing'){
			document.getElementById('html5audio').pause();
			$(audio_player).attr('class','paused');
			$('div[song^="' + assem_src + '"] img').attr('src','images/play.gif');
		//IF you are playing and you're trying to play a diff item then pause and load the clicked item
		} else if(current_src != assem_src && audio_player_class == 'playing') {
			document.getElementById('html5audio').pause();
			$(audio_player).attr('src',assem_src);
			$(audio_player).attr('class','playing');
			document.getElementById('html5audio').play();
			$('div[song^="' + assem_src + '"] img').attr('src','images/pause.gif');
		};
		
		
		var int = setInterval(function(){
			
			var t_playing = $('span#tracktime').text();
			var d_playing = $('span#durationtml').text();
			if(t_playing == d_playing){
				$('div[song^="' + assem_src + '"] img').attr('src','images/play.gif');
				$(audio_player).attr('class','paused');
				clearInterval(int);
				return false;
			}
		}, 800);
		
		
	});
	
	
	function ended(){
		$(music).bind("ended", function(){
			var music = $('audio').attr('src');							
			console.log('hi');
		});
	};
	
	 // end of .ready


$(window).ready(function(){
			var elems = $('div.data').text();
			var arr = jQuery.makeArray(elems);
			var arr2 = arr[0].split('*!');
			var arr2_l = arr2.length - 2;	
                        var j = 0;
		
			
		for(f = 0; f <= arr2_l; f++){
                    
                                var audioTitle = $('div.data').eq(f).text();
                                var audioTitle2 = audioTitle.split('*!');
                                var audioTitle3 = audioTitle2[0].split('audio/');
                                var tagged = '<p class="song_title">' + audioTitle3[1] + '</p>';
				$('div.sound').eq(j).append(tagged);
                                j++;
			/*function mycallback() {
				
				var tagged = '<p class="song_title">' + ID3.getTag(arr2[j], "title") + "<br><span><i>by: " + ID3.getTag(arr2[j], "artist") + '</i></span>';
				$('div.sound').eq(j).append(tagged);
				//console.log('j:' + j);
				j++;
				
				
			};
			//console.log('f:' + f);
			ID3.loadTags(arr2[f], mycallback);*/
		}
});

</script>