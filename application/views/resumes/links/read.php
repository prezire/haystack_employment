<div id="link" class="read row">
  <h4></h4>
            
      Id: <?php echo $link->id; ?>      
          
      Resume Id: <?php echo $link->resume_id; ?>      
          
      Url: <?php echo $link->url; ?>      
        <a href="<?php echo site_url('link'); ?>" class="button radius small alert">Back</a>
    <a href="<?php echo site_url('link/update'); ?>" class="button radius small">Update</a>
  </form>
</div>