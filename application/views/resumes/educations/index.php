<div id="education" class="index row">
  <h4></h4>
	<table>
		<thead>
			<tr>
									<th>Id</th>
									<th>Resume Id</th>
									<th>Degree</th>
									<th>Field Of Study</th>
									<th>School</th>
									<th>Country</th>
									<th>City</th>
									<th></th>
									<th></th>
								<th>Options</th>
			</tr>
		</thead>
		<tbody>
      <?php foreach($educations as $e){ ?>      
			<tr>
									<td><?php echo $e->id; ?></td>
									<td><?php echo $e->resume_id; ?></td>
									<td><?php echo $e->degree; ?></td>
									<td><?php echo $e->field_of_study; ?></td>
									<td><?php echo $e->school; ?></td>
									<td><?php echo $e->country; ?></td>
									<td><?php echo $e->city; ?></td>
									<td><?php echo $e->; ?></td>
									<td><?php echo $e->; ?></td>
								<td>
					<a href="<?php echo site_url('education/read/' . $e->id); ?>" class="button radius small">View</a>
					<a href="<?php echo site_url('education/update/' . $e->id); ?>" class="button radius small">Update</a>
					<a href="<?php echo site_url('education/delete/' . $e->id); ?>" class="button radius small alert">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>