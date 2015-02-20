<div id="resume" class="index row">
  <h4></h4>
	<table>
		<thead>
			<tr>
									<th>Id</th>
									<th>Full Name</th>
									<th>Headline</th>
									<th>Address</th>
									<th>City</th>
									<th>State</th>
									<th>Country</th>
									<th>Landline</th>
									<th>Mobile</th>
									<th>Availability</th>
									<th>Expected Salary</th>
									<th>Current Industry</th>
									<th>Qualification</th>
									<th>Summary</th>
								<th>Options</th>
			</tr>
		</thead>
		<tbody>
      <?php foreach($resumes as $r){ ?>      
			<tr>
									<td><?php echo $r->id; ?></td>
									<td><?php echo $r->full_name; ?></td>
									<td><?php echo $r->headline; ?></td>
									<td><?php echo $r->address; ?></td>
									<td><?php echo $r->city; ?></td>
									<td><?php echo $r->state; ?></td>
									<td><?php echo $r->country; ?></td>
									<td><?php echo $r->landline; ?></td>
									<td><?php echo $r->mobile; ?></td>
									<td><?php echo $r->availability; ?></td>
									<td><?php echo $r->expected_salary; ?></td>
									<td><?php echo $r->current_industry; ?></td>
									<td><?php echo $r->qualification; ?></td>
									<td><?php echo $r->summary; ?></td>
								<td>
					<a href="<?php echo site_url('resume/read/' . $r->id); ?>" class="button radius small">View</a>
					<a href="<?php echo site_url('resume/update/' . $r->id); ?>" class="button radius small">Update</a>
					<a href="<?php echo site_url('resume/delete/' . $r->id); ?>" class="button radius small alert">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>