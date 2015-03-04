<div id="comment" class="update row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('comment/update'); 
    ?>          
      Id: <input type="text" name="id" value="<?php echo set_value('id', $comment->id); ?>" />      
          
      From User Id: <input type="text" name="from_user_id" value="<?php echo set_value('from_user_id', $comment->from_user_id); ?>" />      
          
      To User Id: <input type="text" name="to_user_id" value="<?php echo set_value('to_user_id', $comment->to_user_id); ?>" />      
          
      Comment: <textarea name="comment"><?php echo set_value('comment', $comment->comment); ?></textarea>      
          
      Date Time: <input type="text" name="date_time" value="<?php echo set_value('date_time', $comment->date_time); ?>" />      
          
      Approved: <input type="checkbox" name="approved" checked="<?php echo set_value('approved',  $comment->approved); ?>" />      
        <a href="<?php echo site_url('comment/read/'  . $comment->id); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Update</button>
  </form>
</div>