<?php
	if(empty($success_message)) {
		$success_message = $this->session->flashdata(SUCCESS);
	}

	if(empty($error_message)) {
		$error_message = $this->session->flashdata(ERROR);
	}
?>

<?php if($success_message || $error_message): ?>
	<?php if($success_message): ?>
		<div class="alert alert-success text-center"><?php echo $success_message; ?></div>
	<?php endif; ?>
	<?php if($error_message): ?>
		<div class="alert alert-danger text-center"><?php echo $error_message; ?></div>
	<?php endif; ?>
<?php endif; ?>