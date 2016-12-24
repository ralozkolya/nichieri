<!DOCTYPE html>
<html>
<head>
	<?php $this->view('elements/admin/head'); ?>
</head>
<body>
	<?php $this->view('elements/admin/sidebar'); ?>
	<div class="content">
		<div class="container-fluid">

			<div class="row">
				<div class="col-xs-12">
					<h1><?php echo lang('other'); ?></h1>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<?php $this->load->view('elements/messages'); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<h3><?php echo lang('change_password'); ?></h3>
					<form action="<?php echo base_url('admin/change_password'); ?>" method="post">
						<?php
							$fields = [
								[
									'name' => 'current_password',
									'type' => 'password',
								],
								[
									'name' => 'new_password',
									'type' => 'password',
								],
								[
									'name' => 'repeat_password',
									'type' => 'password',
								],
								[
									'value' => lang('change'),
									'type' => 'submit',
								],
							];

							$form = form_fields($fields);

							foreach($form as $f) {
								echo $f;
							}
						?>
					</form>
				</div>
				<div class="col-md-6">
					<h3><?php echo lang('enable_all'); ?></h3>
					<form method="post" action="<?php echo base_url('admin/enable_all'); ?>">
						<?php
							$fields = [
								['name' => 'ends_on', 'value' => set_value('ends_on', date('Y-m-d H:i:00', strtotime('1 day 1 minute')))],
								['type' => 'submit', 'value' => lang('change')],
							];

							$form = form_fields($fields);

							foreach($form as $f) {
								echo $f;
							}
						?>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>