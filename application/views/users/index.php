<div id="user" class="index">
	<table>
		<thead>
			<tr>
									<th>Id</th>
									<th>Email</th>
									<th>Password</th>
									<th>Title</th>
									<th>Full Name</th>
									<th>Enabled</th>
									<th>Landline</th>
									<th>Mobile</th>
									<th>Address</th>
									<th>Nationality</th>
									<th>Alternate Email</th>
									<th>Image Path</th>
								<th>Options</th>
			</tr>
		</thead>
		<tbody>
      <?php foreach($user as $u){ ?>      
			<tr>
									<td><?php echo $user->id; ?></td>
									<td><?php echo $user->email; ?></td>
									<td><?php echo $user->password; ?></td>
									<td><?php echo $user->title; ?></td>
									<td><?php echo $user->full_name; ?></td>
									<td><?php echo $user->enabled; ?></td>
									<td><?php echo $user->landline; ?></td>
									<td><?php echo $user->mobile; ?></td>
									<td><?php echo $user->address; ?></td>
									<td><?php echo $user->nationality; ?></td>
									<td><?php echo $user->alternate_email; ?></td>
									<td><?php echo $user->image_path; ?></td>
								<td>
					<a href="<?php echo site_url('user/read/' . $u->id); ?>">View</a> | 
					<a href="<?php echo site_url('user/update/' . $u->id); ?>">Update</a> | 
					<a href="<?php echo site_url('user/delete/' . $u->id); ?>">Delete</a>
				</td>
			</tr>
      }      
		</tbody>
	</table>
</div>