<div id="certification" class="read row">
  <h4></h4>
            
      Id: <?php echo $certification->id; ?>      
          
      Resume Id: <?php echo $certification->resume_id; ?>      
          
      Name: <?php echo $certification->name; ?>      
        <a href="<?php echo site_url('certification'); ?>" class="button radius small alert">Back</a>
    <a href="<?php echo site_url('certification/update'); ?>" class="button radius small">Update</a>
  </form>
</div>