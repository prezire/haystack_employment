<div id="member" class="index row">
  <div class="row">
    <div class="small-12 medium-12 large-12 columns">
		  <h4>Company Members</h4>
		  <a href="<?php echo site_url('member/create'); ?>" class="button tiny">
		    Add Company Member
		  </a>
		</div>
    <div class="small-12 medium-12 large-12 columns">
      Company Members are your employees and can do the work for you.
    </div>
  <?php 
    if(count($members) < 1)
    {
  ?>
      <div class="small-12 medium-12 large-12 columns">
        There are currently no Company Members. 
        Click Add Company Member button to create one. 
      </div>
  <?php
    } 
    else 
    {
  ?>
    <table class="responsive" cellspacing="0">
      <thead>
        <tr>
          <th>Full Name</th>
          <th>Email</th>
          <th>Options</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($members as $m){ ?>
          <tr> 
            <td>	
  			     <a href="<?php echo site_url('user/read/' . $m->user_id); ?>">
            		<?php echo $m->full_name; ?>
            	</a>
            </td>
            <td>
              <?php echo $m->email; ?>
            </td>
            <td>
              <?php 
                echo form_checkbox
                (
                  'suspended', 
                  $m->member_id, 
                  set_value('suspended', $m->user_enabled), 
                  'id="suspend" class="enabled"'
                ); 
              ?><label for="suspend">Suspended</label>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <?php } ?>
    </div>
</div>