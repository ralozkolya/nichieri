<div class="sidebar">
	<ul class="navigation">
		<li>
			<?php
				$class = 'unstyled';
				if($highlighted === 'chosen_ones') {
					$class .= ' active';
				}
			?>
			<a class="<?php echo $class; ?>" href="<?php echo base_url('admin/chosen_ones'); ?>">
				<?php echo lang('chosen_ones'); ?>
			</a>
		</li>
		<li>
			<?php
				$class = 'unstyled';
				if($highlighted === 'rules') {
					$class .= ' active';
				}
			?>
			<a class="<?php echo $class; ?>" href="<?php echo base_url('admin/Rules'); ?>">
				<?php echo lang('rules'); ?>
			</a>
		</li>
		<li>
			<?php
				$class = 'unstyled';
				if($highlighted === 'users') {
					$class .= ' active';
				}
			?>
			<a class="<?php echo $class; ?>" href="<?php echo base_url('admin/users'); ?>">
				<?php echo lang('users'); ?>
			</a>
		</li>
		<li>
			<?php
				$class = 'unstyled';
				if($highlighted === 'other') {
					$class .= ' active';
				}
			?>
			<a class="<?php echo $class; ?>" href="<?php echo base_url('admin/other'); ?>">
				<?php echo lang('other'); ?>
			</a>
		</li>
		<li>
			<a class="unstyled" href="<?php echo base_url('logout'); ?>">
				<?php echo lang('logout'); ?>
			</a>
		</li>
	</ul>
</div>