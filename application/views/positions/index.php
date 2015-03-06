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
	<?php } ?>
	<table class="responsive">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Dates</th>
				<th>Industry</th>
				<th>Working Hours</th>
				<th>Vacancy</th>
				<?php if($bPermitted){ ?>
				<th>Options</th>
				<?php } ?>
			</tr>
		</thead>
		<tbody>
			<?php foreach($positions as $p){ ?>
			<tr>
				<td><?php echo $p->id; ?></td>
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
				<td><?php echo $p->vacancy_count; ?></td>
				<?php if($bPermitted){ ?>
				<td>
					<a href="<?php echo site_url('position/delete/' . $p->id); ?>" class="button tiny alert delete">Delete</a>
					<a href="<?php echo site_url('position/update/' . $p->id); ?>" class="button tiny">Update</a>
				</td>
				<?php } ?>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>