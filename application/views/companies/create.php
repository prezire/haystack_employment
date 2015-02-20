<div id="company" class="create row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('company/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      Name: <input type="text" name="name" />      
          
      Description: <textarea name="description"></textarea>      
          
      Logo Filename: <input type="text" name="logo_filename" />      
          
      Email: <input type="text" name="email" />      
          
      Alternate Email: <input type="text" name="alternate_email" />      
          
      Website: <input type="text" name="website" />      
          
      Landline: <input type="text" name="landline" />      
          
      Mobile: <input type="text" name="mobile" />      
          
      Fax: <input type="text" name="fax" />      
          
      Address: <input type="text" name="address" />      
          
      City: <input type="text" name="city" />      
          
      State: <input type="text" name="state" />      
          
      Zip Code: <input type="text" name="zip_code" />      
          
      Country: <input type="text" name="country" />      
        <a href="<?php echo site_url('company'); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Create</button>
  </form>
</div>