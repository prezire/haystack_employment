<div id="ad" class="update row">
  <h4>Ad</h4>
    <?php 
      echo validation_errors();
      echo form_open('ad/update'); 
    ?>    
    <div class="row">  
      <div class="small-12 medium-12 large-12 columns">
          Id: <input type="text" name="id" value="<?php echo set_value('id', $ad->id); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Script: <input type="text" name="script" value="<?php echo set_value('script', $ad->script); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Script Type: <input type="text" name="script_type" value="<?php echo set_value('script_type', $ad->script_type); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Description: <textarea name="description"><?php echo set_value('description', $ad->description); ?></textarea>      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Width: <input type="text" name="width" value="<?php echo set_value('width', $ad->width); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Height: <input type="text" name="height" value="<?php echo set_value('height', $ad->height); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Image: <input type="file" name="image" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Date From: <input type="text" name="date_from" value="<?php echo set_value('date_from', $ad->date_from); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Date To: <input type="text" name="date_to" value="<?php echo set_value('date_to', $ad->date_to); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Enabled: <input type="checkbox" name="enabled" checked="<?php echo set_value('enabled',  $ad->enabled); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Owner Full Name: <input type="text" name="owner_full_name" value="<?php echo set_value('owner_full_name', $ad->owner_full_name); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Owner Email: <input type="text" name="owner_email" value="<?php echo set_value('owner_email', $ad->owner_email); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Owner Landline: <input type="text" name="owner_landline" value="<?php echo set_value('owner_landline', $ad->owner_landline); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Owner Mobile: <input type="text" name="owner_mobile" value="<?php echo set_value('owner_mobile', $ad->owner_mobile); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Company Name: <input type="text" name="company_name" value="<?php echo set_value('company_name', $ad->company_name); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Company Address: <input type="text" name="company_address" value="<?php echo set_value('company_address', $ad->company_address); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Company City: <input type="text" name="company_city" value="<?php echo set_value('company_city', $ad->company_city); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Company Country: <input type="text" name="company_country" value="<?php echo set_value('company_country', $ad->company_country); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Company Zip Code: <input type="text" name="company_zip_code" value="<?php echo set_value('company_zip_code', $ad->company_zip_code); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Company Landline: <input type="text" name="company_landline" value="<?php echo set_value('company_landline', $ad->company_landline); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Company Mobile: <input type="text" name="company_mobile" value="<?php echo set_value('company_mobile', $ad->company_mobile); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Payable Amount: <input type="text" name="payable_amount" value="<?php echo set_value('payable_amount', $ad->payable_amount); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Paid Amount: <input type="text" name="paid_amount" value="<?php echo set_value('paid_amount', $ad->paid_amount); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Paid By: <input type="text" name="paid_by" value="<?php echo set_value('paid_by', $ad->paid_by); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Created On: <input type="text" name="created_on" value="<?php echo set_value('created_on', $ad->created_on); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Last Updated: <input type="text" name="last_updated" value="<?php echo set_value('last_updated', $ad->last_updated); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Paid On: <input type="text" name="paid_on" value="<?php echo set_value('paid_on', $ad->paid_on); ?>" />      
      </div>
    </div>
    <div class="row">
      <div class="small-12 medium-12 large-12 columns">
        <a href="<?php echo site_url('ad/update/'  . $ad->id); ?>" class="button tiny alert">Back</a>
        <button class="button tiny">Update</button>
      </div>
    </div>
  </form>
</div>