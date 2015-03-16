<div class="row panel radius comment">
	<div class="small-12 medium-12 large-11 columns">
	  <div>
	    <a href="#" class="commenter">
	      <strong>
	      	<?php echo $comment->commenter_full_name; ?>
	      </strong>
	    </a>
	    <span class="comment">
	    	<?php echo $comment->comment; ?>
	   	</span>
	  </div>
	  <div class="dateTimeUpdated">
	  	<?php echo toHumanReadableDate($comment->date_time_updated); ?>
	  </div>
	</div>

	<?php if(isLoggedIn()){ ?>
		<div class="small-12 medium-12 large-1 columns">
			<?php 
				$r = getRoleName();
				if($r == 'Applicant')
				{
					$sApproved = $comment->approved < 1 ? '' : 'checked';
			?>
				<input type="checkbox" 
						class="approve" 
						id="approve"
						<?php echo $sApproved; ?>
						url="<?php echo site_url('comment/updateApproved/' . $comment->comment_id); ?>">
				<label for="approve">Approve</label>
			<?php 
				} 
				else if($r == 'Employer')
				{
			?>
				<a href="<?php echo site_url('comment/delete/' . $comment->comment_id); ?>" 
					class="button tiny right delete">
					&times;
				</a>
			<?php
				}
			?>
		</div>
	<?php } ?>
</div>