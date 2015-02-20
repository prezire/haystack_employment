<div id="position" class="create row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('position/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      Name: <input type="text" name="name" />      
          
      Description: <textarea name="description"></textarea>      
          
      :       
          
      :       
          
      Industry: <input type="text" name="industry" />      
          
      Working Hours: <input type="text" name="working_hours" />      
          
      Shift Pattern: <input type="text" name="shift_pattern" />      
          
      Salary: <input type="text" name="salary" />      
          
      Vacancy Count: <input type="text" name="vacancy_count" />      
          
      Employer Id: <input type="text" name="employer_id" />      
        <a href="<?php echo site_url('position'); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Create</button>
  </form>
</div>