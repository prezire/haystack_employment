<div id="position" class="index row">
	<h4>Positions</h4>
	<a href="<?php echo site_url('position/create'); ?>" class="button tiny">New Position</a>
	<table class="responsive">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Date From</th>
				<th>Date To</th>
				<th>Industry</th>
				<th>Working Hours</th>
				<th>Vacancy Count</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($positions as $p){ ?>
			<tr>
				<td><?php echo $p->id; ?></td>
				<td><?php echo $p->name; ?></td>
				<td><?php echo $p->date_from; ?></td>
				<td><?php echo $p->date_to; ?></td>
				<td><?php echo $p->industry; ?></td>
				<td><?php echo $p->working_hours; ?></td>
				<td><?php echo $p->vacancy_count; ?></td>
				<td>
					<a href="<?php echo site_url('position/delete/' . $p->id); ?>" class="button tiny alert delete">Delete</a>
					<a href="<?php echo site_url('position/update/' . $p->id); ?>" class="button tiny">Update</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>