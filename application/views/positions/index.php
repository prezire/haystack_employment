<div id="position" class="index row">
  <h4></h4>
	<table>
		<thead>
			<tr>
									<th>Id</th>
									<th>Name</th>
									<th>Description</th>
									<th></th>
									<th></th>
									<th>Industry</th>
									<th>Working Hours</th>
									<th>Shift Pattern</th>
									<th>Salary</th>
									<th>Vacancy Count</th>
									<th>Employer Id</th>
								<th>Options</th>
			</tr>
		</thead>
		<tbody>
      <?php foreach($positions as $p){ ?>      
			<tr>
									<td><?php echo $p->id; ?></td>
									<td><?php echo $p->name; ?></td>
									<td><?php echo $p->description; ?></td>
									<td><?php echo $p->; ?></td>
									<td><?php echo $p->; ?></td>
									<td><?php echo $p->industry; ?></td>
									<td><?php echo $p->working_hours; ?></td>
									<td><?php echo $p->shift_pattern; ?></td>
									<td><?php echo $p->salary; ?></td>
									<td><?php echo $p->vacancy_count; ?></td>
									<td><?php echo $p->employer_id; ?></td>
								<td>
					<a href="<?php echo site_url('position/read/' . $p->id); ?>" class="button radius small">View</a>
					<a href="<?php echo site_url('position/update/' . $p->id); ?>" class="button radius small">Update</a>
					<a href="<?php echo site_url('position/delete/' . $p->id); ?>" class="button radius small alert">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>