<div id="resume" class="index row">
	<h4>Resumes</h4>
	<p>
		We've created 3 resumes for the different 
		positions you're going to apply.
		Send the best one with slight variations
		that highlights only the relevant 
		Skills, Certifications and Additional Information
		by Forwarding it as an email.
		No more editing one resume over and over again
		everytime you apply. 
		<br /><br />
		It's advisable that you only
		set one resume to Public, which will be visible
		to an employer when he looks at your profile. 
		The other 2 can either be
		Private or Unlisted.
	</p>
	<table class="responsive">
		<thead>
			<tr>
				<th>Name</th>
				<th>Headline</th>
				<th>Access Type</th>
				<th>Force As Public</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($resumes as $r){ ?>
			<tr>
				<td>
					<a href="<?php echo site_url('resume/read/' . $r->id); ?>">
						<?php echo $r->name; ?>
					</a>
				</td>
				<td><?php echo $r->headline; ?></td>
				<td><?php echo $r->access_type; ?></td>
				<td>
					<?php 
						$url = 'url="' . site_url('resume/setPublic/' . $r->id) . '"';
						$s = 'class="isPublic" group="isPublic" ' . $url;
						echo form_radio
						(
							'isPublic', 
							$r->id, 
							$r->is_public, 
							$s
						); 
					?>
				</td>
				<td>
					<a href="<?php echo site_url('resume/update/' . $r->id); ?>" class="button tiny">
						Update
					</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>