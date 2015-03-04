<div id="applicant" class="create">
  <?php echo form_open_multipart('applicant/create'); ?>
      <div class="row">
        <div class="large-12 columns"><h4>New Applicant</h4></div>
        <div class="large-12 columns">
          <?php echo validation_errors(); ?>
        </div>
        <div class="large-6 columns">Full Name: <input type="text" name="full_name" value="<?php echo set_value('full_name'); ?>" /></div>
        <div class="large-6 columns">Email: <input type="text" name="email" value="<?php echo set_value('email'); ?>" /></div>
        <div class="large-6 columns">Password: <input type="password" name="password" value="<?php echo set_value('password'); ?>" /></div>
        <div class="large-6 columns">Current Position Title: <input type="text" name="current_position_title" value="<?php echo set_value('current_position_title'); ?>" /></div>
        <div class="large-12 columns"><br />
          <a href="<?php echo site_url('auth/register'); ?>" class="button small alert">Back</a>
          <button class="small">Register</button>
        </div>
      </div>
  </form>
</div>