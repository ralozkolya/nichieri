$(function(){

	$.ajaxSetup({cache: true});

	$.getScript('//connect.facebook.net/en_US/sdk.js', function(){

		FB.Canvas.setAutoGrow();

		FB.init({
			appId: '144504032704294',
			version: 'v2.8',
			xfbml: true,
			cookie: true,
		});

		FB.AppEvents.logPageView();
	});
});