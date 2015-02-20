<div id="position" class="read row">
  <h4></h4>
            
      Id: <?php echo $position->id; ?>      
          
      Name: <?php echo $position->name; ?>      
          
      Description: <?php echo $position->description; ?>      
          
      : <?php echo $position->; ?>      
          
      : <?php echo $position->; ?>      
          
      Industry: <?php echo $position->industry; ?>      
          
      Working Hours: <?php echo $position->working_hours; ?>      
          
      Shift Pattern: <?php echo $position->shift_pattern; ?>      
          
      Salary: <?php echo $position->salary; ?>      
          
      Vacancy Count: <?php echo $position->vacancy_count; ?>      
          
      Employer Id: <?php echo $position->employer_id; ?>      
        <a href="<?php echo site_url('position'); ?>" class="button radius small alert">Back</a>
    <a href="<?php echo site_url('position/update'); ?>" class="button radius small">Update</a>
  </form>
</div>