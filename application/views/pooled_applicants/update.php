<div id="pooled_applicant" class="update row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('pooledapplicant/update'); 
    ?>          
      Id: <input type="text" name="id" value="<?php echo set_value('id', $pooledApplicant->id); ?>" />      
          
      Applicant Id: <input type="text" name="applicant_id" value="<?php echo set_value('applicant_id', $pooledApplicant->applicant_id); ?>" />      
          
      Employer Id: <input type="text" name="employer_id" value="<?php echo set_value('employer_id', $pooledApplicant->employer_id); ?>" />      
        <a href="<?php echo site_url('pooledapplicant/read/'  . $pooledApplicant->id); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Update</button>
  </form>
</div>