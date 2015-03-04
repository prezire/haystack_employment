<div id="pooled_applicant" class="read row">
  <h4></h4>
            
      Id: <?php echo $pooledApplicant->id; ?>      
          
      Applicant Id: <?php echo $pooledApplicant->applicant_id; ?>      
          
      Employer Id: <?php echo $pooledApplicant->employer_id; ?>      
        <a href="<?php echo site_url('pooledapplicant'); ?>" class="button radius small alert">Back</a>
    <a href="<?php echo site_url('pooledapplicant/update'); ?>" class="button radius small">Update</a>
  </form>
</div>