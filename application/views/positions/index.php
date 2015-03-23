<div id="position" class="index row">
	<h4>Browse Positions</h4>
	<?php 
		$r = getRoleName();
		$bPermitted = $r == 'Administrator' || $r == 'Employer';
		if($bPermitted){
	?>
	<a href="<?php echo site_url('position/create'); ?>" class="button tiny">
		New Position
	</a>
	<a href="<?php echo site_url('position/archives'); ?>" class="button tiny">
		Archives
	</a>
	<?php 
		}
		if(count($positions) < 1)
		{ 
	?>
			<p>
				<?php if($bPermitted){ ?>
					There are no positions available. Check the Archives or create a New Position.	
				<?php } else { ?>
					There are no positions available from this employer.
					Click <a href="<?php echo site_url('position'); ?>">here</a> 
					to look for recently opened postions from other employers.
				<?php } ?>
			</p>
	<?php 
		} 
		else
		{ 
	?>
			<?php echo $this->load->view('searches/search_positions', null, true); ?>

			<?php foreach($positions as $p){ ?>
				<div class="panel">
					<div class="row">
						<div class="small-12 large-5 columns">
							<a data-id="<?php echo $p->id; ?>" 
								href="<?php echo site_url('position/read/' . $p->id); ?>" 
								class="position tiny">
								<?php echo $p->name; ?>
							</a> 
						</div>
						<div class="small-12 large-5 columns">
							<?php 
								//TODO: Clickable industry.
								echo $p->category . ' / ' . 
								$p->industry . ' / ' . 
								$p->working_hours; 
							?>
						</div>

						<div class="small-12 large-2 columns">
							Vacancy: <?php echo $p->vacancy_count; ?>
							<!-- TODO: Applicants: n -->
						</div>

					</div>

					<?php if($bPermitted){ ?>
						<div class="row">
						  <div class="small-12 medium-3 large-5 columns">
						  	Posting Date:
						  	<?php echo toHumanReadableDate($p->date_from); ?> - 
							<?php echo toHumanReadableDate($p->date_to); ?>
						  </div>
						  <div class="small-12 medium-3 large-5 columns">
						  	<?php echo form_checkbox(null, null, $p->enabled, 'id="enabled" class="enabled"'); ?>
							<label for="enabled">Enabled</label>
						  </div>
						  <div class="small-12 medium-3 large-2 columns">
						  	<a href="<?php echo site_url('position/archive/' . $p->id); ?>" class="button tiny alert delete">Archive</a>
							<a href="<?php echo site_url('position/update/' . $p->id); ?>" class="button tiny">Update</a>
						  </div>
						</div>
					<?php }///if. ?>
				</div>
			<?php }///foreach. ?> 
	<?php 
		}///else.
		echo $pagination;
	?>
	<script>
		$(document).ready(function(){
			new Position().trackClicks('<?php echo site_url(); ?>');
		});
	</script>
</div>