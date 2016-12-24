<!DOCTYPE html>
<html lang="<?php echo get_lang_code(get_lang()); ?>">
<head>
	<?php $this->view('elements/head'); ?>
</head>
<body>

	<div class="wrapper text-center">

		<?php $this->load->view('elements/header'); ?>
		<div class="container-fluid">
			<div class="row">
				<?php if(!empty($chosen_ones)): ?>
					<?php $url = static_url('uploads/chosen_ones'); ?>
					<?php foreach($chosen_ones as $c): ?>
						<div class="col-sm-6 text-center">
							<div class="chosen bpg-nino">
								<div class="image" style="background-image: url('<?php echo "{$url}/{$c->image}" ?>');"></div>
								<div class="gradient">
									<div class="desc text-left">
										<div><?php echo $c->name; ?></div>
										<div><strong><?php echo $c->count.' '.lang('votes'); ?></strong></div>
									</div>
								</div>
								<div class="vote-button">
									<?php if($c->voted): ?>
										<div><strong><?php echo lang('thanks'); ?></strong></div>
										<div><?php echo lang('vote_accepted'); ?></div>
									<?php else: ?>
										<div class="vote">
											<span class="fa fa-star star"></span>
												<?php echo lang('vote'); ?>
											<span class="fa fa-star star"></span>
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				<?php else: ?>
					<h3 class="bpg-nino text-center"><?php echo lang('nothing_found'); ?></h3>
				<?php endif; ?>
			</div>
		</div>

	</div>

</body>
</html>