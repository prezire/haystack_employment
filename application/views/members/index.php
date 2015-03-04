<div id="member" class="index row">
  <div class="row">
    <div class="small-12 medium-12 large-12 columns">
		  <h4>Members</h4>
		  <a href="<?php echo site_url('member/create'); ?>" class="button radius small">
		    Add Member
		  </a>
		  <br /><br />
		</div>
	</div>
    <?php foreach($members as $m){ ?>    
      	<div class="row">
          <div class="small-12 medium-12 large-12 columns">
          	<a href="<?php echo site_url('member/delete/' . $m->member_id); ?>" 
				class="delete alert">
				<i class="fa fa-times"></i>
			</a>
			<a href="<?php echo site_url('member/update/' . $m->member_id); ?>" class="button radius small">
          		<?php echo $m->full_name; ?>
          	</a>
          </div>
          <div class="small-12 medium-12 large-12 columns">
          	Email: <?php echo $m->email; ?>
          </div>
        </div>
    <?php } ?>
</div>