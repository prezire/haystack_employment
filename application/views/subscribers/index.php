<div id="subscriber" class="index">
	<table>
		<thead>
			<tr>
									<th>Id</th>
									<th>User Id</th>
								<th>Options</th>
			</tr>
		</thead>
		<tbody>
      <?php foreach($subscriber as $s){ ?>      
			<tr>
									<td><?php echo $subscriber->id; ?></td>
									<td><?php echo $subscriber->user_id; ?></td>
								<td>
					<a href="<?php echo site_url('subscriber/read/' . $s->id); ?>">View</a> | 
					<a href="<?php echo site_url('subscriber/update/' . $s->id); ?>">Update</a> | 
					<a href="<?php echo site_url('subscriber/delete/' . $s->id); ?>">Delete</a>
				</td>
			</tr>
      }      
		</tbody>
	</table>
</div>