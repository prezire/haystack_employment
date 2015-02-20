<div id="work_history" class="index row">
  <h4></h4>
	<table>
		<thead>
			<tr>
									<th>Id</th>
									<th>Resume Id</th>
									<th>Position</th>
									<th>Company</th>
									<th>Location</th>
									<th>Summary</th>
									<th></th>
									<th></th>
									<th>Is Current Work</th>
								<th>Options</th>
			</tr>
		</thead>
		<tbody>
      <?php foreach($workHistories as $w){ ?>      
			<tr>
									<td><?php echo $w->id; ?></td>
									<td><?php echo $w->resume_id; ?></td>
									<td><?php echo $w->position; ?></td>
									<td><?php echo $w->company; ?></td>
									<td><?php echo $w->location; ?></td>
									<td><?php echo $w->summary; ?></td>
									<td><?php echo $w->; ?></td>
									<td><?php echo $w->; ?></td>
									<td><?php echo $w->is_current_work; ?></td>
								<td>
					<a href="<?php echo site_url('workhistory/read/' . $w->id); ?>" class="button radius small">View</a>
					<a href="<?php echo site_url('workhistory/update/' . $w->id); ?>" class="button radius small">Update</a>
					<a href="<?php echo site_url('workhistory/delete/' . $w->id); ?>" class="button radius small alert">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>