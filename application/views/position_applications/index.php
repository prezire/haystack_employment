<div id="positionApplication" class="index row">
	<h4>My Applications</h4>
	<?php if(count($positionApplications) > 0){ ?>
	<table class="responsive">
		<thead>
			<tr>
				<th>Job ID</th>
				<th>Position</th>
				<th>Employer</th>
				<th>Date Applied</th>
				<th>Application Status</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($positionApplications as $p){ ?>
			<tr>
				<td><?php echo $p->position_id; ?></td>
				<td>
					<a href="<?php echo site_url('position/read/' . $p->position_id); ?>">
						<?php echo $p->position_name; ?>
					</a>
				</td>
				<td><?php echo $p->employer_name; ?></td>
				<td><?php echo $p->date_time_applied; ?></td>
				<td><?php echo $p->application_status_name; ?></td>
				<td>
					<a href="<?php echo site_url('positionapplication/delete/' . $p->position_application_id); ?>" class="button tiny alert delete">
						Delete
					</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<?php } else { ?>
	You haven't applied for any positions. 
	Click <a href="<?php echo site_url('position'); ?>">here</a> to start applying.
	<?php } ?>
</div>