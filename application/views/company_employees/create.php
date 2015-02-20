<div id="company_employee" class="create row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('companyemployee/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      User Id: <input type="text" name="user_id" />      
          
      Company Id: <input type="text" name="company_id" />      
        <a href="<?php echo site_url('companyemployee'); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Create</button>
  </form>
</div>