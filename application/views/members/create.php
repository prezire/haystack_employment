<div id="member" class="create row">
  <?php echo form_open_multipart('member/create'); ?>
      <div class="row">
        <div class="large-12 columns">
          <h4>New Member</h4>
        </div>
        <div class="large-12 columns">
          <?php echo validation_errors(); ?>
        </div>
        <div class="large-6 columns">
          Full Name: 
          <input type="text" name="full_name" value="<?php echo set_value('full_name'); ?>" />
        </div>
        
        <div class="large-6 columns">
          Email: 
          <input type="text" name="email" value="<?php echo set_value('email'); ?>" />
        </div>
        <div class="large-6 columns">
          Password: 
          <input type="password" name="password" value="<?php echo set_value('password'); ?>" />
        </div>
        
        <div class="large-6 columns">
          <br />
          <button class="small">Register</button>
        </div>
      </div>
  </form>
</div>