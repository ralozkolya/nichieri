$(function(){

	$('#login-button').click(function(){
		FB.login(checkStatus);
	});

	function checkStatus(response, login) {
		if(response.status === 'connected') {
			location.assign(url.base);
		}

		else {
			if(login) {
				FB.login(checkStatus);
			}

			$('.require-login').show();
			$('.loading').hide();
		}
	}

	window.fbAsyncInit = function(){
		FB.getLoginStatus(function(response){
			checkStatus(response, true);
		});
	};
});