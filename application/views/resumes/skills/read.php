<div id="skill" class="read row">
  <h4></h4>
            
      Id: <?php echo $skill->id; ?>      
          
      Resume Id: <?php echo $skill->resume_id; ?>      
          
      Name: <?php echo $skill->name; ?>      
        <a href="<?php echo site_url('skill'); ?>" class="button radius small alert">Back</a>
    <a href="<?php echo site_url('skill/update'); ?>" class="button radius small">Update</a>
  </form>
</div>