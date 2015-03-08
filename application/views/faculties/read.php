<div id="employer" class="read row">
  <h4></h4>
            
      Id: <?php echo $employer->id; ?>      
          
      User Id: <?php echo $employer->user_id; ?>      
          
      Company Id: <?php echo $employer->company_id; ?>      
        <a href="<?php echo site_url('employer'); ?>" class="button radius small alert">Back</a>
    <a href="<?php echo site_url('employer/update'); ?>" class="button radius small">Update</a>
  </form>
</div>