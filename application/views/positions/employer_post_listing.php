<div id="position" class="index row">
	<h4>Positions</h4>
	<?php 
		$r = getRoleName();
		$bPermitted = $r == 'Administrator' || $r == 'Employer';
		if($bPermitted){
	?>
	<a href="<?php echo site_url('position/create'); ?>" class="button tiny">
		New Position
	</a>
	<a href="<?php echo site_url('position/archives'); ?>" class="button tiny">
		Archives
	</a>
	<?php } ?>
	<table class="responsive" cellspacing="0">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Dates</th>
				<th>Industry</th>
				<th>Category</th>
				<th>Working Hours</th>
				<th>Vacancy</th>
				<?php if($bPermitted){ ?>
				<th>Enabled</th>
				<th class="options">Options</th>
				<?php } ?>
			</tr>
		</thead>
		<tbody>
			<?php 
				foreach($positions as $p)
				{ 
					$position = $p['position'];
					$appls = $p['applicants'];
			?>
			<tr>
				<td><?php echo $position->id; ?></td>
				<td>
					<a href="<?php echo site_url('position/read/' . $position->id); ?>" class="tiny">
						<?php echo $position->name; ?>
					</a>
				</td>
				<td>
					<?php echo toHumanReadableDate($position->date_from); ?> - 
					<?php echo toHumanReadableDate($position->date_to); ?>
				</td>
				<td><?php echo $position->industry; ?></td>
				<td><?php echo $position->category; ?></td>
				<td><?php echo $position->working_hours; ?></td>
				<td><?php echo $position->vacancy_count; ?></td>
				<?php if($bPermitted){ ?>
				<td>
					<?php echo form_checkbox(null, null, $position->enabled, 'class="enabled"'); ?>
				</td>
				<td class="options">
					<a href="<?php echo site_url('position/archive/' . $position->id); ?>" class="button tiny alert delete">Archive</a>
					<a href="<?php echo site_url('position/update/' . $position->id); ?>" class="button tiny">Update</a>
					<a href="<?php echo site_url('position/clonePosition/' . $position->id); ?>" class="button tiny">Clone</a>
				</td>
				<?php } ?>
			</tr>

			<?php if(count($appls) > 0){ ?>
			<tr>
				<td>&nbsp;</td>
			    <td class="accordionContainer" colspan="8">
			    	<?php 
						foreach($appls as $appl)
						{
							$panelName = $position->id . '-' . $appl->applicant_id;
					?>
			    	<dl class="accordion" data-accordion>
			    	  <dd>
			    	    <a href="#panel<?php echo $panelName; ?>">
			    	    	<?php 
			    	    		echo $appl->full_name . 
			    	    				' (' . 
			    	    				$appl->current_position_title . ')';
			    	    	?>
			    	    	<br />
				    	    Applied On: 
				    	    <?php echo toHumanReadableDate($appl->date_time_applied); ?>
			    	    </a>
			    	    <div id="panel<?php echo $panelName; ?>" class="content">
			    	      <div class="row">
				    		  <div class="small-3 medium-3 large-4 columns">
				    		  	<label>Application Status</label>
				    		  	<?php 
				    		  		echo form_dropdown
				    		  		(
				    		  			'application_status', 
				    		  			getApplicationStatuses(), 
				    		  			$appl->status_name,
				    		  			'class="applicationStatus"'
				    		  		); 
				    		  	?>
				    		  </div>
				    		  <div class="small-4 medium-4 large-6 columns">
				    		  	<label>Notes</label>
				    		  	<textarea class="notes"><?php echo nl2br($appl->position_application_notes);?></textarea>
				    		  </div>
				    		  <div class="small-2 medium-2 large-2 columns">
				    		  	<label>Options</label>
				    		  	<a href="<?php echo site_url('positionapplication/updateStatusAndNotes/' . $position->id . '/' . $appl->applicant_id); ?>" class="button tiny update">
				    		  		Update
				    		  	</a>
				    		  	<a href="<?php echo site_url('applicant/read/' . $appl->applicant_id); ?>" class="button tiny">
				    		  		View Profile
				    		  	</a>
				    		  </div>
				    		</div>
			    	    </div>
			    	  </dd>
			    	</dl>
		    		<?php } ?>
				</td>
			</tr>
		    <?php } ?>
			<?php } ?>
		</tbody>
	</table>
	<?php echo $pagination; ?>
</div>