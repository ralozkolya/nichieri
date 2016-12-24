<?php if($type === 'text'): ?>
	<div class="form-group">
		<?php echo lang($name, $name); ?>
		<input
			class="form-control"
			type="<?php echo $type; ?>"
			name="<?php echo $name; ?>"
			id="<?php echo $name; ?>"
			value="<?php echo $value; ?>">
	</div>
<?php elseif($type === 'textarea'): ?>
	<div class="form-group">
		<?php echo lang($name, $name); ?>
		<textarea class="form-control"
			name="<?php echo $name; ?>"
			id="<?php echo $id; ?>"><?php echo $value; ?></textarea>
	</div>
<?php elseif($type === 'ckeditor'): ?>
	<div class="form-group">
		<?php echo lang($name, $name); ?>
		<textarea class="ckeditor"
			name="<?php echo $name; ?>"
			id="<?php echo $name; ?>"><?php echo $value; ?></textarea>
	</div>
<?php elseif($type === 'select'): ?>
	<div class="form-group">
		<?php echo lang($name, $name); ?>
		<select class="form-control"
			name="<?php echo $name; ?>"
			id="<?php echo $name; ?>">
			<option value=""><?php echo lang('choose'); ?></option>
			<?php foreach($value as $v): ?>
				<?php
					$val = set_value($name);

					if(!empty($item)) {
						$val = $item->$name;
					}
				?>
				<?php if($v->id === $val): ?>
					<option value="<?php echo $v->id; ?>" selected><?php echo $v->name; ?></option>
				<?php else: ?>
					<option value="<?php echo $v->id; ?>"><?php echo $v->name; ?></option>
				<?php endif; ?>
			<?php endforeach; ?>
		</select>
	</div>
<?php elseif($type === 'chosen'): ?>
	<div class="form-group">
		<?php echo lang($name, $name); ?>
		<select class="chosen form-control"
			name="<?php echo $name; ?>"
			id="<?php echo $name; ?>">
			<option value=""><?php echo lang('choose'); ?></option>
			<?php foreach($value as $v): ?>
				<?php
					$val = set_value($name);

					if(!empty($item)) {
						$val = $item->$name;
					}
				?>
				<?php if($v->id === $val): ?>
					<option value="<?php echo $v->id; ?>" selected><?php echo $v->name; ?></option>
				<?php else: ?>
					<option value="<?php echo $v->id; ?>"><?php echo $v->name; ?></option>
				<?php endif; ?>
			<?php endforeach; ?>
		</select>
	</div>
<?php elseif($type === 'file'): ?>
	<div class="form-group">
		<?php
			$label = lang($name);
			if(!empty($append)) {
				$label .= " ({$append})";
			}
		?>
		<label for="<?php echo $name; ?>"><?php echo $label; ?></label>
		<input class="form-control"
			type="file"
			name="<?php echo "{$name}"; ?>"
			id="<?php echo $name; ?>">
	</div>
<?php elseif($type === 'files'): ?>
	<div class="form-group">
		<?php echo lang($name, $name); ?>
		<input class="form-control"
			type="file"
			name="<?php echo "{$name}[]"; ?>"
			id="<?php echo $name; ?>" multiple>
	</div>
<?php elseif($type === 'hidden'): ?>
	<input type="hidden" name="<?php echo $name; ?>"
		value="<?php echo $value; ?>">
<?php elseif($type === 'submit'): ?>
	<div class="form-group">
		<input class="btn btn-default" type="submit" value="<?php echo $value; ?>">
	</div>
<?php elseif($type === 'checkbox'): ?>
	<div class="form-group">
		<input type="checkbox"
			name="<?php echo $name; ?>"
			value="1"
			id="<?php echo $name; ?>" <?php if($value) echo 'checked'; ?>>
		<?php echo lang($name, $name); ?>
	</div>
<?php elseif($type === 'password'): ?>
	<div class="form-group">
		<?php echo lang($name, $name); ?>
		<input class="form-control"
			type="password"
			name="<?php echo $name; ?>"
			id="<?php echo $name; ?>">
	</div>
<?php elseif($type === 'email'): ?>
	<div class="form-group">
		<?php echo lang($name, $name); ?>
		<input class="form-control"
			type="email"
			name="<?php echo $name; ?>"
			id="<?php echo $name; ?>"
			value="<?php echo $value; ?>">
	</div>
<?php endif; ?>