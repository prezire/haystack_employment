<div id="certification" class="index row">
  <h4></h4>
	<table>
		<thead>
			<tr>
									<th>Id</th>
									<th>Resume Id</th>
									<th>Name</th>
								<th>Options</th>
			</tr>
		</thead>
		<tbody>
      <?php foreach($certifications as $c){ ?>      
			<tr>
									<td><?php echo $c->id; ?></td>
									<td><?php echo $c->resume_id; ?></td>
									<td><?php echo $c->name; ?></td>
								<td>
					<a href="<?php echo site_url('certification/read/' . $c->id); ?>" class="button radius small">View</a>
					<a href="<?php echo site_url('certification/update/' . $c->id); ?>" class="button radius small">Update</a>
					<a href="<?php echo site_url('certification/delete/' . $c->id); ?>" class="button radius small alert">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>