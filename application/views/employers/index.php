<div id="employer" class="index row">
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
      <?php foreach($employers as $e){ ?>      
			<tr>
									<td><?php echo $e->id; ?></td>
									<td><?php echo $e->user_id; ?></td>
									<td><?php echo $e->company_id; ?></td>
								<td>
					<a href="<?php echo site_url('employer/read/' . $e->id); ?>" class="button radius small">View</a>
					<a href="<?php echo site_url('employer/update/' . $e->id); ?>" class="button radius small">Update</a>
					<a href="<?php echo site_url('employer/delete/' . $e->id); ?>" class="button radius small alert">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>