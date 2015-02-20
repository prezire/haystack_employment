<div id="company_employee" class="index row">
  <h4></h4>
	<table>
		<thead>
			<tr>
									<th>Id</th>
									<th>User Id</th>
									<th>Company Id</th>
								<th>Options</th>
			</tr>
		</thead>
		<tbody>
      <?php foreach($companyEmployees as $c){ ?>      
			<tr>
									<td><?php echo $c->id; ?></td>
									<td><?php echo $c->user_id; ?></td>
									<td><?php echo $c->company_id; ?></td>
								<td>
					<a href="<?php echo site_url('companyemployee/read/' . $c->id); ?>" class="button radius small">View</a>
					<a href="<?php echo site_url('companyemployee/update/' . $c->id); ?>" class="button radius small">Update</a>
					<a href="<?php echo site_url('companyemployee/delete/' . $c->id); ?>" class="button radius small alert">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>