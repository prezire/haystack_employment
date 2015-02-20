<div id="company" class="index row">
  <h4></h4>
	<table>
		<thead>
			<tr>
									<th>Id</th>
									<th>Name</th>
									<th>Description</th>
									<th>Logo Filename</th>
									<th>Email</th>
									<th>Alternate Email</th>
									<th>Website</th>
									<th>Landline</th>
									<th>Mobile</th>
									<th>Fax</th>
									<th>Address</th>
									<th>City</th>
									<th>State</th>
									<th>Zip Code</th>
									<th>Country</th>
								<th>Options</th>
			</tr>
		</thead>
		<tbody>
      <?php foreach($companies as $c){ ?>      
			<tr>
									<td><?php echo $c->id; ?></td>
									<td><?php echo $c->name; ?></td>
									<td><?php echo $c->description; ?></td>
									<td><?php echo $c->logo_filename; ?></td>
									<td><?php echo $c->email; ?></td>
									<td><?php echo $c->alternate_email; ?></td>
									<td><?php echo $c->website; ?></td>
									<td><?php echo $c->landline; ?></td>
									<td><?php echo $c->mobile; ?></td>
									<td><?php echo $c->fax; ?></td>
									<td><?php echo $c->address; ?></td>
									<td><?php echo $c->city; ?></td>
									<td><?php echo $c->state; ?></td>
									<td><?php echo $c->zip_code; ?></td>
									<td><?php echo $c->country; ?></td>
								<td>
					<a href="<?php echo site_url('company/read/' . $c->id); ?>" class="button radius small">View</a>
					<a href="<?php echo site_url('company/update/' . $c->id); ?>" class="button radius small">Update</a>
					<a href="<?php echo site_url('company/delete/' . $c->id); ?>" class="button radius small alert">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>