<div id="company" class="update row">
  <h4>Update Company</h4>
    <?php 
      echo validation_errors();
      echo form_open_multipart('company/updateFromEmployerProfile'); 
    ?>          
      <input type="hidden" name="id" value="<?php echo set_value('id', $company->organization_id); ?>" />
      <input type="hidden" name="user_id" value="<?php echo set_value('id', $company->user_id); ?>" />
      
      <div class="row">
        <div class="small-12 medium-12 large-12 columns">
          <img class="logo" src="<?php echo base_url('public/uploads') . '/' .  set_value('logo_filename', $company->company_logo_filename); ?>" />      
          <input type="file" name="logo_filename" />
        </div>
        <div class="small-12 medium-12 large-12 columns">
          Name: <input type="text" name="name" value="<?php echo set_value('name', $company->company_name); ?>" />      
        </div>
        <div class="small-12 medium-12 large-12 columns">
          Description: <textarea name="description"><?php echo set_value('description', $company->company_description); ?></textarea>      
        </div>
        <div class="small-12 medium-12 large-6 columns">
          Email: <input type="text" name="email" value="<?php echo set_value('email', $company->company_email); ?>" />      
        </div>
        <div class="small-12 medium-12 large-6 columns">
          Website: <input type="text" name="website" value="<?php echo set_value('website', $company->company_website); ?>" />      
        </div>
        <div class="small-12 medium-12 large-6 columns">
          Landline: <input type="text" name="landline" value="<?php echo set_value('landline', $company->company_landline); ?>" />      
        </div>
        <div class="small-12 medium-12 large-6 columns">
          Mobile: <input type="text" name="mobile" value="<?php echo set_value('mobile', $company->company_mobile); ?>" />      
        </div>
        <div class="small-12 medium-12 large-6 columns">
          Fax: <input type="text" name="fax" value="<?php echo set_value('fax', $company->company_fax); ?>" />      
        </div>
        <div class="small-12 medium-12 large-6 columns">
          Address: <input type="text" name="address" value="<?php echo set_value('address', $company->company_address); ?>" />      
        </div>
        <div class="small-12 medium-12 large-6 columns">
          City: <input type="text" name="city" value="<?php echo set_value('city', $company->company_city); ?>" />      
        </div>
        <div class="small-12 medium-12 large-6 columns">
          State: <input type="text" name="state" value="<?php echo set_value('state', $company->company_state); ?>" />      
        </div>
        <div class="small-12 medium-12 large-6 columns">
          Zip Code: <input type="text" name="zip_code" value="<?php echo set_value('zip_code', $company->company_zip_code); ?>" />      
        </div>
        <div class="small-12 medium-12 large-6 columns">
          Country: <?php echo form_dropdown('country', getCountries(), set_value('country', $company->company_country)); ?>
        </div>
        <div class="small-12 medium-12 large-12 columns">
          <a href="<?php echo site_url('user/update/'  . $company->user_id); ?>" class="button tiny alert">
            Back To Profile
          </a>
          <button class="button tiny">Update</button>
        </div>
      </div>
  </form>
</div>