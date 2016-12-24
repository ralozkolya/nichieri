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
					<h1><?php echo lang('rules'); ?></h1>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<?php $this->load->view('elements/messages'); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<form method="post" enctype="multipart/form-data">
						<?php
							$fields = [
								[
									'name' => 'id',
									'value' => $item->id,
									'type' => 'hidden',
								],
								[
									'name' => 'body',
									'value' => $item->body,
									'type' => 'ckeditor',
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
			</div>
		</div>
	</div>
</body>
</html>