<div id="applicant" class="update">
    <?php 
    echo validation_errors();
    echo form_open('applicant/update'); 
    ?>          
      <input type="hidden" name="id" value="<?php echo set_value('id', $applicant->id); ?>" />      
          
      User Id: <input type="text" name="user_id" value="<?php echo set_value('user_id', $applicant->user_id); ?>" />      
          
      Expected Salary: <input type="text" name="expected_salary" value="<?php echo set_value('expected_salary', $applicant->expected_salary); ?>" />      
          
      Internship Position: 
      <?php echo form_dropdown('preferred_country', getCountries(), set_value('internship_position', $applicant->internship_position); ?>
          
      Preferred Country: <input type="text" name="preferred_country" value="<?php echo set_value('preferred_country', $applicant->preferred_country); ?>" />      
          
      Job Title: <input type="text" name="job_title" value="<?php echo set_value('job_title', $applicant->job_title); ?>" />      
        <a href="<?php echo site_url('applicant/read/'  . $applicant->id); ?>" class="button alert small radius">Cancel</a>
    <button class="small radius">Update</button>
  </form>
</div>