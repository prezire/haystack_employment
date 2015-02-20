<div class="row panel radius comment">
	<div class="small-12 medium-12 large-10 columns">
	  <div>
	    <a href="#" class="commenter">
	      <strong>
	      	<?php echo $comment->commenter_full_name; ?>
	      </strong>
	    </a>
	    <span class="comment"><?php echo $comment->comment; ?></span>
	  </div>
	  <div class="dateTime"><?php echo $comment->date_time; ?></div>
	</div>
	<div class="small-12 medium-12 large-2 columns">
		<?php 
			if(isLoggedIn())
			{ 
				if(getRoleName() == 'Applicant')
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
			} 
		?>
	</div>
</div>