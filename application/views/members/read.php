<div id="member" class="read row">
  <h4></h4>
            
      Id: <?php echo $member->id; ?>      
          
      User Id: <?php echo $member->user_id; ?>      
          
      Organization Id: <?php echo $member->organization_id; ?>      
        <a href="<?php echo site_url('member'); ?>" class="button radius small alert">Back</a>
    <a href="<?php echo site_url('member/update'); ?>" class="button radius small">Update</a>
  </form>
</div>