<div id="position" class="index row">
	<h4>Positions</h4>
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
	<table class="responsive" cellspacing="0">
		<thead>
			<tr>
				<th>Name</th>
				<th>Dates</th>
				<th>Industry</th>
				<th>Working Hours</th>
				<th>Category</th>
				<th>Vacancy</th>
				<?php if($bPermitted){ ?>
				<th>Enabled</th>
				<th>Options</th>
				<?php } ?>
			</tr>
		</thead>
		<tbody>
			<?php foreach($positions as $p){ ?>
			<tr>
				<td>
					<a href="<?php echo site_url('position/read/' . $p->id); ?>" class="tiny">
						<?php echo $p->name; ?>
					</a>
				</td>
				<td>
					<?php echo toHumanReadableDate($p->date_from); ?> - 
					<?php echo toHumanReadableDate($p->date_to); ?>
				</td>
				<td><?php echo $p->industry; ?></td>
				<td><?php echo $p->working_hours; ?></td>
				<td><?php echo $p->category; ?></td>
				<td><?php echo $p->vacancy_count; ?></td>
				<?php if($bPermitted){ ?>
				<td>
					<?php echo form_checkbox(null, null, $p->enabled, 'class="enabled"'); ?>
				</td>
				<td>
					<a href="<?php echo site_url('position/archive/' . $p->id); ?>" class="button tiny alert delete">Archive</a>
					<a href="<?php echo site_url('position/update/' . $p->id); ?>" class="button tiny">Update</a>
				</td>
				<?php } ?>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<?php 
		}
		echo $pagination;
	?>
</div>