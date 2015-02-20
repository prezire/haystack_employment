<div id="work_history" class="read row">
  <h4></h4>
            
      Id: <?php echo $workHistory->id; ?>      
          
      Resume Id: <?php echo $workHistory->resume_id; ?>      
          
      Position: <?php echo $workHistory->position; ?>      
          
      Company: <?php echo $workHistory->company; ?>      
          
      Location: <?php echo $workHistory->location; ?>      
          
      Summary: <?php echo $workHistory->summary; ?>      
          
      : <?php echo $workHistory->; ?>      
          
      : <?php echo $workHistory->; ?>      
          
      Is Current Work: <?php echo $workHistory->is_current_work; ?>      
        <a href="<?php echo site_url('workhistory'); ?>" class="button radius small alert">Back</a>
    <a href="<?php echo site_url('workhistory/update'); ?>" class="button radius small">Update</a>
  </form>
</div>