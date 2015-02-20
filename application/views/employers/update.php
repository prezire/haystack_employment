<div id="employer" class="update row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('employer/update'); 
    ?>          
      Id: <input type="text" name="id" value="<?php echo set_value('id', $employer->id); ?>" />      
          
      User Id: <input type="text" name="user_id" value="<?php echo set_value('user_id', $employer->user_id); ?>" />      
          
      Company Id: <input type="text" name="company_id" value="<?php echo set_value('company_id', $employer->company_id); ?>" />      
        <a href="<?php echo site_url('employer/read/'  . $employer->id); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Update</button>
  </form>
</div>