<div id="position" class="update row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('position/update'); 
    ?>          
      Id: <input type="text" name="id" value="<?php echo set_value('id', $position->id); ?>" />      
          
      Name: <input type="text" name="name" value="<?php echo set_value('name', $position->name); ?>" />      
          
      Description: <textarea name="description"><?php echo set_value('description', $position->description); ?></textarea>      
          
      Date From: <input type="text" name="date_from" value="<?php echo set_value('date_from', $position->date_from); ?>" />      
          
      Date To: <input type="text" name="date_to" value="<?php echo set_value('date_to', $position->date_to); ?>" />      
          
      Industry: <input type="text" name="industry" value="<?php echo set_value('industry', $position->industry); ?>" />      
          
      Working Hours: <input type="text" name="working_hours" value="<?php echo set_value('working_hours', $position->working_hours); ?>" />      
          
      Shift Pattern: <input type="text" name="shift_pattern" value="<?php echo set_value('shift_pattern', $position->shift_pattern); ?>" />      
          
      Salary: <input type="text" name="salary" value="<?php echo set_value('salary', $position->salary); ?>" />      
          
      Vacancy Count: <input type="text" name="vacancy_count" value="<?php echo set_value('vacancy_count', $position->vacancy_count); ?>" />      
          
      Employer Id: <input type="text" name="employer_id" value="<?php echo set_value('employer_id', $position->employer_id); ?>" />      
        <a href="<?php echo site_url('position/read/'  . $position->id); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Update</button>
  </form>
</div>