<div id="skill" class="index row">
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
      <?php foreach($skills as $s){ ?>      
			<tr>
									<td><?php echo $s->id; ?></td>
									<td><?php echo $s->resume_id; ?></td>
									<td><?php echo $s->name; ?></td>
								<td>
					<a href="<?php echo site_url('skill/read/' . $s->id); ?>" class="button radius small">View</a>
					<a href="<?php echo site_url('skill/update/' . $s->id); ?>" class="button radius small">Update</a>
					<a href="<?php echo site_url('skill/delete/' . $s->id); ?>" class="button radius small alert">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>