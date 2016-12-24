<!DOCTYPE html>
<html>
<head>
	<?php $this->view('elements/admin/head'); ?>
<link rel="stylesheet" href="<?php echo static_url('css/admin/chosen_ones.css?v='.V); ?>">
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
				<div class="col-md-6">
					<h3><?php echo lang('chosen_ones'); ?></h3>
					<?php echo admin_table('Chosen', $items, [
						'image', 'name', 
					], static_url('uploads/chosen_ones/')); ?>
				</div>
				<div class="col-sm-6">
					<h3><?php echo lang('add_chosen_one'); ?></h3>
					<form method="post" enctype="multipart/form-data">
						<?php
							$fields = [
								['name' => 'name', 'value' => set_value('name')],
								['name' => 'ends_on', 'value' => set_value('ends_on', date('Y-m-d H:i:s', strtotime('1 day')))],
								['name' => 'image', 'type' => 'file', 'append' => lang('recommended_size').': 460x400'],
								['type' => 'submit', 'value' => lang('add')],
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