<div id="additional_information" class="read row">
  <h4></h4>
            
      Id: <?php echo $additionalInformation->id; ?>      
          
      Resume Id: <?php echo $additionalInformation->resume_id; ?>      
          
      Information: <?php echo $additionalInformation->information; ?>      
        <a href="<?php echo site_url('additionalinformation'); ?>" class="button radius small alert">Back</a>
    <a href="<?php echo site_url('additionalinformation/update'); ?>" class="button radius small">Update</a>
  </form>
</div>