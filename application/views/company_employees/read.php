<div id="company_employee" class="read row">
  <h4></h4>
            
      Id: <?php echo $companyEmployee->id; ?>      
          
      User Id: <?php echo $companyEmployee->user_id; ?>      
          
      Company Id: <?php echo $companyEmployee->company_id; ?>      
        <a href="<?php echo site_url('companyemployee'); ?>" class="button radius small alert">Back</a>
    <a href="<?php echo site_url('companyemployee/update'); ?>" class="button radius small">Update</a>
  </form>
</div>