<div id="ad" class="index row">
  <h4>Ads</h4>
  	<a href="<?php echo base_url('ad/create'); ?>" class="button tiny">New Ad</a>
	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Script</th>
				<th>Script Type</th>
				<th>Description</th>
				<th>Width</th>
				<th>Height</th>
				<th>Image</th>
				<th>Date From</th>
				<th>Date To</th>
				<th>Enabled</th>
				<th>Owner Full Name</th>
				<th>Owner Email</th>
				<th>Owner Landline</th>
				<th>Owner Mobile</th>
				<th>Company Name</th>
				<th>Company Address</th>
				<th>Company City</th>
				<th>Company Country</th>
				<th>Company Zip Code</th>
				<th>Company Landline</th>
				<th>Company Mobile</th>
				<th>Payable Amount</th>
				<th>Paid Amount</th>
				<th>Paid By</th>
				<th>Created On</th>
				<th>Last Updated</th>
				<th>Paid On</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
      <?php foreach($ads as $a){ ?>      
			<tr>
				<td><?php echo $a->id; ?></td>
				<td><?php echo $a->script; ?></td>
				<td><?php echo $a->script_type; ?></td>
				<td><?php echo $a->description; ?></td>
				<td><?php echo $a->width; ?></td>
				<td><?php echo $a->height; ?></td>
				<td><?php echo $a->image; ?></td>
				<td><?php echo $a->date_from; ?></td>
				<td><?php echo $a->date_to; ?></td>
				<td><?php echo $a->enabled; ?></td>
				<td><?php echo $a->owner_full_name; ?></td>
				<td><?php echo $a->owner_email; ?></td>
				<td><?php echo $a->owner_landline; ?></td>
				<td><?php echo $a->owner_mobile; ?></td>
				<td><?php echo $a->company_name; ?></td>
				<td><?php echo $a->company_address; ?></td>
				<td><?php echo $a->company_city; ?></td>
				<td><?php echo $a->company_country; ?></td>
				<td><?php echo $a->company_zip_code; ?></td>
				<td><?php echo $a->company_landline; ?></td>
				<td><?php echo $a->company_mobile; ?></td>
				<td><?php echo $a->payable_amount; ?></td>
				<td><?php echo $a->paid_amount; ?></td>
				<td><?php echo $a->paid_by; ?></td>
				<td><?php echo $a->created_on; ?></td>
				<td><?php echo $a->last_updated; ?></td>
				<td><?php echo $a->paid_on; ?></td>
				<td>
					<a href="<?php echo site_url('ad/update/' . $a->id); ?>" class="button tiny">Update</a>
					<a href="<?php echo site_url('ad/delete/' . $a->id); ?>" class="button tiny alert delete">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>