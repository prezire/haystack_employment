<div id="employer" class="create">
  <?php echo form_open_multipart('employer/create'); ?>
      <div class="row">
        <div class="large-12 columns"><h4>New Employer</h4></div>
        <div class="large-12 columns">
          <?php echo validation_errors(); ?>
        </div>
        <div class="large-6 columns">Full Name: <input type="text" name="full_name" value="<?php echo set_value('full_name'); ?>" /></div>
        <div class="large-6 columns">Company Name: <input type="text" name="company_name" value="<?php echo set_value('company_name'); ?>" /></div>
        
        <div class="large-6 columns">Email: <input type="text" name="email" value="<?php echo set_value('email'); ?>" /></div>
        <div class="large-6 columns">Password: <input type="password" name="password" value="<?php echo set_value('password'); ?>" /></div>
        
        <div class="large-6 columns">Company Address: <input type="text" name="company_address" value="<?php echo set_value('company_address'); ?>" /></div>
        <div class="large-6 columns">Company City: <input type="text" name="company_city" value="<?php echo set_value('company_city'); ?>" /></div>
        <div class="large-6 columns">Company Country: <?php echo form_dropdown('company_country', getCountries(), set_value('company_country')); ?></div>

        <div class="large-6 columns">
          <br />
          <a href="<?php echo site_url('auth/register'); ?>" class="button small alert">Back</a>
          <button class="small">Register</button>
        </div>
      </div>
  </form>
</div>