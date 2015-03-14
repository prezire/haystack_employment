<div id="position" class="archives row">
	<h4>Archives</h4>
	<a href="<?php echo site_url('position/readMyPosts'); ?>" class="button tiny alert">
		Back
	</a>
	<?php 
		$r = getRoleName();
		$bPermitted = $r == 'Administrator' || $r == 'Employer';
		if(count($positions) < 1)
		{ 
	?>
			<p>There are no archived items.</p>
	<?php 
		} 
		else 
		{ 
	?>
	<table class="responsive">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Dates</th>
				<th>Industry</th>
				<th>Working Hours</th>
				<th>Category</th>
				<th>Vacancy</th>
				<?php if($bPermitted){ ?>
				<th>Options</th>
				<?php } ?>
			</tr>
		</thead>
		<tbody>
			<?php foreach($positions as $p){ ?>
			<tr>
				<td><?php echo $p->id; ?></td>
				<td>
					<a href="<?php echo site_url('position/read/' . $p->id); ?>" class="tiny">
						<?php echo $p->name; ?>
					</a>
				</td>
				<td>
					<?php echo toHumanReadableDate($p->date_from); ?> - 
					<?php echo toHumanReadableDate($p->date_to); ?>
				</td>
				<td><?php echo $p->industry; ?></td>
				<td><?php echo $p->working_hours; ?></td>
				<td><?php echo $p->category; ?></td>
				<td><?php echo $p->vacancy_count; ?></td>
				<?php if($bPermitted){ ?>
				<td>
					<a href="<?php echo site_url('position/archive/' . $p->id . '/0'); ?>" class="button tiny">Restore</a>
				</td>
				<?php } ?>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<?php 
		}
		echo $pagination; 
	?>
</div>