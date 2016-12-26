<!DOCTYPE html>
<html>
<head>
	<?php $this->view('elements/head'); ?>
	<link rel="stylesheet" href="<?php echo static_url('css/login.css?v='.V); ?>">
	<script src="<?php echo static_url('js/login.js?v='.V); ?>"></script>
</head>
<body>

	<div class="wrapper bpg-nino text-center">

		<?php $this->load->view('elements/header'); ?>

		<div>
			<h3><?php echo lang('please_like'); ?></h3>
		</div>
		<div>
			<div class="fb-like" data-href="https://www.facebook.com/sagahvac/" data-layout="button_count" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div>
		</div>
		<br>
		<br>
		<div class="loading">
			<h3><?php echo lang('loading'); ?></h3>
		</div>
		<div class="require-login">
			<h3><?php echo lang('require_login'); ?></h3>
		</div>
		<br>
		<br>
		<div>
			<button id="login-button" class="btn btn-primary button"><?php echo lang('login'); ?></button>
		</div>

	</div>
</body>
</html>