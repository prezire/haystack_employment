<div id="comment" class="create row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('comment/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      From User Id: <input type="text" name="from_user_id" />      
          
      To User Id: <input type="text" name="to_user_id" />      
          
      Comment: <textarea name="comment"></textarea>      
          
      Date Time: <input type="text" name="date_time" />      
          
      Approved: <input type="checkbox" name="approved" />      
        <a href="<?php echo site_url('comment'); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Create</button>
  </form>
</div>