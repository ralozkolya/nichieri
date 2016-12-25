<!DOCTYPE html>
<html>
<head>
	<?php $this->view('elements/admin/head'); ?>
	<link rel="stylesheet" href="<?php echo static_url('css/admin/users.css?v='.V); ?>">
</head>
<body>
	<?php $this->view('elements/admin/sidebar'); ?>
	<div class="content">
		<div class="container-fluid">

			<div class="row">
				<div class="col-xs-12">
					<?php $this->load->view('elements/messages'); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<?php echo $this->pagination->create_links(); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<h3><?php echo lang('users'); ?></h3>
					<?php echo admin_table('User', $items, [
						'fb_img', 'name', 'fb_id',
					]); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<?php echo $this->pagination->create_links(); ?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>