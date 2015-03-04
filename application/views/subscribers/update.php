<div id="subscriber" class="update">
    <?php 
    echo validation_errors();
    echo form_open('subscriber/update'); 
    ?>          
      Id: <input type="text" name="id" value="<?php echo set_value('id', $subscriber->id); ?>" />      
          
      User Id: <input type="text" name="user_id" value="<?php echo set_value('user_id', $subscriber->user_id); ?>" />      
      <a href="<?php echo site_url('subscriber/read/'  . $subscriber->id); ?>" class="button alert small radius">Cancel</a>
      <button class="small radius">Update</button>
  </form>
</div>