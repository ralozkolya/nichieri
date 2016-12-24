<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('elements/head'); ?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 text-center">
				<h1>Facebook-ის გვერდზე დამატება:</h1>
				<div><button class="add-button btn btn-primary">დამატება</button></div>
			</div>
		</div>
	</div>
	<script>
		$('.add-button').click(function(){
			FB.ui({method: 'pagetab'});
		});
	</script>
</body>
</html>