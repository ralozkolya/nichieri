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
					<h1><?php echo $item->name; ?></h1>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<?php $this->load->view('elements/messages'); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<form method="post" enctype="multipart/form-data">
						<?php
							$fields = [
								[
									'name' => 'id',
									'value' => $item->id,
									'type' => 'hidden',
								],
								[
									'name' => 'name',
									'value' => $item->name,
								],
								[
									'name' => 'ends_on',
									'value' => $item->ends_on,
								],
								[
									'name' => 'image',
									'type' => 'file'
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
				<div class="col-sm-6">
					<img src="<?php echo static_url("uploads/chosen_ones/{$item->image}"); ?>" alt="Image">
				</div>
			</div>
		</div>
	</div>
</body>
</html>