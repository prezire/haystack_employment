<div id="link" class="index row">
  <h4></h4>
	<table>
		<thead>
			<tr>
									<th>Id</th>
									<th>Resume Id</th>
									<th>Url</th>
								<th>Options</th>
			</tr>
		</thead>
		<tbody>
      <?php foreach($links as $l){ ?>      
			<tr>
									<td><?php echo $l->id; ?></td>
									<td><?php echo $l->resume_id; ?></td>
									<td><?php echo $l->url; ?></td>
								<td>
					<a href="<?php echo site_url('link/read/' . $l->id); ?>" class="button radius small">View</a>
					<a href="<?php echo site_url('link/update/' . $l->id); ?>" class="button radius small">Update</a>
					<a href="<?php echo site_url('link/delete/' . $l->id); ?>" class="button radius small alert">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>