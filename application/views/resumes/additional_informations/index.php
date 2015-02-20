<div id="additional_information" class="index row">
  <h4></h4>
	<table>
		<thead>
			<tr>
									<th>Id</th>
									<th>Resume Id</th>
									<th>Information</th>
								<th>Options</th>
			</tr>
		</thead>
		<tbody>
      <?php foreach($additionalInformations as $a){ ?>      
			<tr>
									<td><?php echo $a->id; ?></td>
									<td><?php echo $a->resume_id; ?></td>
									<td><?php echo $a->information; ?></td>
								<td>
					<a href="<?php echo site_url('additionalinformation/read/' . $a->id); ?>" class="button radius small">View</a>
					<a href="<?php echo site_url('additionalinformation/update/' . $a->id); ?>" class="button radius small">Update</a>
					<a href="<?php echo site_url('additionalinformation/delete/' . $a->id); ?>" class="button radius small alert">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>