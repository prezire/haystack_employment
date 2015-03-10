<div id="applicant" class="index row">
	<h4>Applicants</h4>
	<?php 
		$r = getRoleName();
		$bPermitted = $r == 'Administrator' || $r == 'Employer'; 
	?>
	<table class="responsive">
		<thead>
			<tr>
				<th>ID</th>
				<th>Full Name</th>
				<th>Applied Position</th>
				<th>Current Position Title</th>
				<th>Country</th>
				<?php if($bPermitted){ ?><th>Options</th><?php } ?>
			</tr>
		</thead>
		<tbody>
			<?php foreach($applicants as $a){ ?>
			<tr>
				<td><?php echo $a->id; ?></td>
				<td>
					<a href="<?php echo site_url('applicant/read/' . $a->applicant_id); ?>">
						<?php echo $a->full_name; ?>
					</a>
				</td>
				<td>
					<a href="<?php echo site_url('position/read/' . $a->position_id); ?>">
						<?php echo $a->position_name; ?>
					</a>
				</td>
				<td><?php echo $a->current_position_title; ?></td>
				<td><?php echo $a->country; ?></td>
				<?php if($bPermitted){ ?>
				<td>
					<a href="<?php echo site_url('applicant/delete/' . $a->id); ?>" class="button tiny alert delete">Delete</a>
					<a href="<?php echo site_url('applicant/update/' . $a->id); ?>" class="button tiny">Update</a>
				</td>
				<?php } ?>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<!--div class="row">
		<div class="small-12 medium-12 large-12 columns">
			<dl class="tabs" data-tab>
				<dd class="active"><a href="#pools">Pools</a></dd>
				<dd><a href="#bookmarks">Bookmarks</a></dd>
			</dl>
			<div class="tabs-content">
				<div class="content active" id="pools">
					<?php //echo $this->load->view('pools/index', $pools, true); ?>
				</div>
				<div class="content" id="bookmarks">
					
				</div>
			</div>
		</div>
	</div-->
</div>