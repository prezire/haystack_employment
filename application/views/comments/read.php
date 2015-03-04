<div id="comment" class="read row">
  <h4></h4>
            
      Id: <?php echo $comment->id; ?>      
          
      From User Id: <?php echo $comment->from_user_id; ?>      
          
      To User Id: <?php echo $comment->to_user_id; ?>      
          
      Comment: <?php echo $comment->comment; ?>      
          
      Date Time: <?php echo $comment->date_time; ?>      
          
      Approved: <?php echo $comment->approved; ?>      
        <a href="<?php echo site_url('comment'); ?>" class="button radius small alert">Back</a>
    <a href="<?php echo site_url('comment/update'); ?>" class="button radius small">Update</a>
  </form>
</div>