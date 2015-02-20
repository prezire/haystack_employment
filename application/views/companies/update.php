<div id="company" class="update row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('company/update'); 
    ?>          
      Id: <input type="text" name="id" value="<?php echo set_value('id', $company->id); ?>" />      
          
      Name: <input type="text" name="name" value="<?php echo set_value('name', $company->name); ?>" />      
          
      Description: <textarea name="description"><?php echo set_value('description', $company->description); ?></textarea>      
          
      Logo Filename: <input type="text" name="logo_filename" value="<?php echo set_value('logo_filename', $company->logo_filename); ?>" />      
          
      Email: <input type="text" name="email" value="<?php echo set_value('email', $company->email); ?>" />      
          
      Alternate Email: <input type="text" name="alternate_email" value="<?php echo set_value('alternate_email', $company->alternate_email); ?>" />      
          
      Website: <input type="text" name="website" value="<?php echo set_value('website', $company->website); ?>" />      
          
      Landline: <input type="text" name="landline" value="<?php echo set_value('landline', $company->landline); ?>" />      
          
      Mobile: <input type="text" name="mobile" value="<?php echo set_value('mobile', $company->mobile); ?>" />      
          
      Fax: <input type="text" name="fax" value="<?php echo set_value('fax', $company->fax); ?>" />      
          
      Address: <input type="text" name="address" value="<?php echo set_value('address', $company->address); ?>" />      
          
      City: <input type="text" name="city" value="<?php echo set_value('city', $company->city); ?>" />      
          
      State: <input type="text" name="state" value="<?php echo set_value('state', $company->state); ?>" />      
          
      Zip Code: <input type="text" name="zip_code" value="<?php echo set_value('zip_code', $company->zip_code); ?>" />      
          
      Country: <input type="text" name="country" value="<?php echo set_value('country', $company->country); ?>" />      
        <a href="<?php echo site_url('company/read/'  . $company->id); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Update</button>
  </form>
</div>