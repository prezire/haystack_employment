<div id="member" class="update row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('member/update'); 
    ?>          
      Id: <input type="text" name="id" value="<?php echo set_value('id', $member->id); ?>" />      
          
      User Id: <input type="text" name="user_id" value="<?php echo set_value('user_id', $member->user_id); ?>" />      
          
      Organization Id: <input type="text" name="organization_id" value="<?php echo set_value('organization_id', $member->organization_id); ?>" />      
        <a href="<?php echo site_url('member/read/'  . $member->id); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Update</button>
  </form>
</div>