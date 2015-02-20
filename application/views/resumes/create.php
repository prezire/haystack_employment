<div id="resume" class="create row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('resume/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      Full Name: <input type="text" name="full_name" />      
          
      Headline: <input type="text" name="headline" />      
          
      Address: <textarea name="address"></textarea>      
          
      City: <input type="text" name="city" />      
          
      State: <input type="text" name="state" />      
          
      Country: <input type="text" name="country" />      
          
      Landline: <input type="text" name="landline" />      
          
      Mobile: <input type="text" name="mobile" />      
          
      Availability: <input type="text" name="availability" />      
          
      Expected Salary: <input type="text" name="expected_salary" />      
          
      Current Industry: <input type="text" name="current_industry" />      
          
      Qualification: <input type="text" name="qualification" />      
          
      Summary: <textarea name="summary"></textarea>      
        <a href="<?php echo site_url('resume'); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Create</button>
  </form>
</div>