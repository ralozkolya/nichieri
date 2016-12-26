$(function(){

	$('#login-button').click(function(){
		FB.login(checkStatus);
	});

	function checkStatus(response) {
		if(response.status === 'connected') {
			location.assign(url.base);
		}

		else {
			$('.require-login').show();
			$('.loading').hide();
		}
	}

	window.fbAsyncInit = function(){
		FB.getLoginStatus(function(response){
			checkStatus(response);
		});
	};
});