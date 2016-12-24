$(function(){

	$('.delete').click(function(){
		return confirm(lang.areYouSure);
	});

	$('.ckeditor').ckeditor({
		language: config.language,
	});
});