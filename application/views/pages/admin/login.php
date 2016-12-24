<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('elements/admin/head'); ?>
	<link rel="stylesheet" href="<?php echo static_url('css/admin/login.css?v='.V); ?>">
</head>
<body>

	<div class="container">

		<div class="row">
			<div class="col-xs-12 text-center bpg-nino">
				<h2><?php echo lang('login'); ?></h2>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
				<?php $this->load->view('elements/messages'); ?>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
				<form method="post">
					<div class="form-group">
						<input class="form-control" type="text" name="username"
							placeholder="<?php echo lang('username'); ?>" autofocus>
					</div>
					<div class="form-group">
						<input class="form-control" type="password" name="password"
							placeholder="<?php echo lang('password'); ?>">
					</div>
					<div class="form-group text-center">
						<input class="btn btn-default" type="submit"
							value="<?php echo lang('login'); ?>">
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>