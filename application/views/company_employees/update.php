<div id="company_employee" class="update row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('companyemployee/update'); 
    ?>          
      Id: <input type="text" name="id" value="<?php echo set_value('id', $companyEmployee->id); ?>" />      
          
      User Id: <input type="text" name="user_id" value="<?php echo set_value('user_id', $companyEmployee->user_id); ?>" />      
          
      Company Id: <input type="text" name="company_id" value="<?php echo set_value('company_id', $companyEmployee->company_id); ?>" />      
        <a href="<?php echo site_url('companyemployee/read/'  . $companyEmployee->id); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Update</button>
  </form>
</div>