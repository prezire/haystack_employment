<div id="pooled_applicant" class="create row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('pooledapplicant/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      Applicant Id: <input type="text" name="applicant_id" />      
          
      Employer Id: <input type="text" name="employer_id" />      
        <a href="<?php echo site_url('pooledapplicant'); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Create</button>
  </form>
</div>