var interval;

$(function(){

	$('.rules-button').click(function(){
		toggleRules();
		return false;
	});

	$('.close-button').click(function(){
		toggleRules();
	});

	$('.scroll').mCustomScrollbar();

	setInterval(refresh, 300000);

	refresh();
});

function refresh() {
	$.get(url.base+'app/vote_ends_in', function(response) {
		if(!isNaN(parseInt(response.vote_ends_in))) {
			startTimer(response.vote_ends_in);
		}
	});
}

function startTimer(secs) {
	clearInterval(interval);
	var countDown = $('.countdown');

	if(secs) {
		interval = setInterval(function(){

			if(!secs || secs <= 0) {
				clearInterval(interval);
				countDown.html(secondsToTime(0));
				location.reload();
				return;
			}

			countDown.html(secondsToTime(secs--));

			if(secs == 60) {
				refresh();
			}

		}, 1000);
	}
}

function toggleRules() {
	$('.rules-wrapper, .chosen-ones').toggleClass('shown');
	$('.rules-button').stop().fadeToggle();
}

function secondsToTime(secs) {

	if(secs < 0) {
		secs = 0;
	}

	var time = [
		pad(Math.floor(secs / 3600)),
		pad(Math.floor((secs % 3600) / 60)),
		pad(secs % 60),
	];

	return time.join(':');

	function pad(number) {
		return number > 9 ? number : '0' + number;
	}
}