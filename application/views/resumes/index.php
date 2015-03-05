<div id="resume" class="index row">
	<h4>Resumes</h4>
	<p>
		We've created 3 resumes for the different 
		positions you're going to apply.
		Send the best one suited for the requirements of 
		the position while highlighting only relevant 
		Skills, Certifications and Additional Information.
		No more editing one resume over and over again
		everytime you apply. 
		<br />
		It's advisable that you only
		set one resume to Public. The other 2 can either be
		Private or Unlisted.
	</p>

	<?php if(count($resumes) < 4){ ?>
		<!--a href="<?php echo site_url('resume/create'); ?>" class="button tiny">
			New Resume
		</a-->
	<?php } ?>
	<table class="responsive">
		<thead>
			<tr>
				<th>Name</th>
				<th>Headline</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($resumes as $r){ ?>
			<tr>
				<td><?php echo $r->name; ?></td>
				<td><?php echo $r->headline; ?></td>
				<td>
					<a href="<?php echo site_url('resume/read/' . $r->id); ?>" class="button tiny">View</a>
					<a href="<?php echo site_url('resume/update/' . $r->id); ?>" class="button tiny">Update</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>