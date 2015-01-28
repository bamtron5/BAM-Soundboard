	//Click for sound
	$('.sound').live("click",function(){
		
		//reset everything back to the playbtn
		$('.sound').each(function(){
			$(this).find('figure').eq(0).attr('class','playbtn');
		});
		
		
		//define clicked sound and playing sound
		var audio_player = $('audio#html5audio');
		var clicked_sound = $(this).attr('url');
		var audio_player_action = $(audio_player).attr('class');
		var current_sound = $(audio_player).attr('src');

		//IF you are paused un-pause with currently clicked item
		if(audio_player_action == 'paused'){
			$(audio_player).attr('src', clicked_sound);
			document.getElementById('html5audio').play();
			$(audio_player).attr('class','playing');
			$('div[url^="' + clicked_sound + '"] figure').attr('class','pausebtn');
		//IF you are playing and you're tyring to pause the same item then pause
		} else if (current_sound == clicked_sound && audio_player_action == 'playing'){
			document.getElementById('html5audio').pause();
			$(audio_player).attr('class','paused');
			$('div[url^="' + clicked_sound + '"] figure').attr('class','playbtn');
		//IF you are playing and you're trying to play a diff item then pause and load the clicked item
		} else if(current_sound != clicked_sound && audio_player_action == 'playing') {
			document.getElementById('html5audio').pause();
			$(audio_player).attr('src',clicked_sound);
			$(audio_player).attr('class','playing');
			document.getElementById('html5audio').play();
			$('div[url^="' + clicked_sound + '"] figure').attr('class','pausebtn');
		};
		
		//LETS COUNT SHALL WE, if the songs over then reset back to the play btn
		var int = setInterval(function(){
			var t_playing = $('span#tracktime').text();
			var d_playing = $('span#durationtml').text();
			if(t_playing == d_playing){
				$('div[url^="' + clicked_sound + '"] figure').attr('class','playbtn');
				$(audio_player).attr('class','paused');
				clearInterval(int);
				return false;
			}
		}, 800);
		
	});