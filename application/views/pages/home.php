<!DOCTYPE html>
<html lang="<?php echo get_lang_code(get_lang()); ?>">
<head>
	<?php $this->view('elements/head'); ?>
	<link rel="stylesheet" href="<?php echo static_url('css/mCustomScrollbar.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo static_url('css/home.css?v='.V); ?>">
	<script src="<?php echo static_url('js/mCustomScrollbar.min.js'); ?>"></script>
	<script src="<?php echo static_url('js/home.js?v='.V); ?>"></script>
</head>
<body>

	<div class="wrapper text-center">

		<?php $this->load->view('elements/header'); ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 text-center bpg-nino sagas-chosen">
					<img src="<?php echo static_url('img/saga.svg'); ?>" alt="Saga"><?php echo lang('sagas_chosen') ?>
				</div>
			</div>
			<div class="row chosen-ones shown">
				<?php if(!empty($chosen_ones)): ?>
					<?php foreach($chosen_ones as $i => $c): ?>
						<div class="col-sm-6 text-center">
							<div class="chosen bpg-nino">
								<div class="image" style="background-image: url('<?php echo "{$url}/{$c->image}" ?>');"></div>
								<?php if($c->type === 'real'): ?>
									<div class="gradient">
										<div class="desc text-left">
											<div><?php echo $c->name; ?></div>
											<div><strong><?php echo $c->count.' '.lang('votes'); ?></strong></div>
										</div>
									</div>
								<?php endif; ?>
								<div class="vote-button">
									<?php if($c->type === 'dummy'): ?>
										<div><?php echo lang_replace('will_be_added', $i + 1); ?></div>
									<?php elseif($now > strtotime($c->ends_on)): ?>
										<div><?php echo lang('vote_ended'); ?></div>
									<?php elseif($c->voted && !$user_allowed): ?>
										<div><strong><?php echo lang('thanks'); ?></strong></div>
										<div><?php echo lang('vote_accepted'); ?></div>
									<?php elseif(!$user_allowed): ?>
										<div><?php echo lang('vote_allowed'); ?></div>
									<?php else: ?>
										<div class="vote">
											<a href="<?php echo base_url("vote/{$c->id}"); ?>" class="unstyled">
												<span class="fa fa-star star"></span>
													<?php echo lang('vote'); ?>
												<span class="fa fa-star star"></span>
											</a>
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
			<div class="row bottom-row bpg-nino">
				<div class="col-xs-4 text-left">
					<a href="#" class="unstyled rules-button">
						<span class="transparent-background">
							<span class="fa fa-file-text-o"></span>
							<?php echo lang('rules'); ?>
						</span>
					</a>
				</div>
				<div class="col-xs-4">
					<span class="transparent-background">
						<span class="fa fa-clock-o"></span>
						<span class="countdown">00:00:00</span>
					</span>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 vote-allowed">
					<?php echo lang('vote_allowed'); ?>
				</div>
			</div>
		</div>

		<div class="rules-wrapper">
			<div class="rules">
				<div class="scroll"><?php echo $rules->body; ?></div>
				<span class="fa fa-close close-button"></span>
			</div>
		</div>

	</div>

</body>
</html>