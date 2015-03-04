<div id="member" class="create row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('member/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      User Id: <input type="text" name="user_id" />      
          
      Organization Id: <input type="text" name="organization_id" />      
        <a href="<?php echo site_url('member'); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Create</button>
  </form>
</div>