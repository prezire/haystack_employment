<div id="employer" class="create row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('employer/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      User Id: <input type="text" name="user_id" />      
          
      Company Id: <input type="text" name="company_id" />      
        <a href="<?php echo site_url('employer'); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Create</button>
  </form>
</div>