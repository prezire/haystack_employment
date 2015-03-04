<div id="position" class="read row">
  <h4>Position</h4>
  <div class="row">
    <div class="small-6 medium-6 large-6 columns">
      ID: <?php echo $position->id; ?>      
    </div>
    <div class="small-6 medium-6 large-6 columns">
      Name: <?php echo $position->name; ?>      
    </div>
    <div class="small-6 medium-6 large-6 columns">
      Description: <?php echo nl2br($position->description); ?>      
    </div>
    <div class="small-6 medium-6 large-6 columns">
      Date From: <?php echo $position->date_from; ?>
    </div>
    <div class="small-6 medium-6 large-6 columns">      
      Date To: <?php echo $position->date_to; ?>      
    </div>
    <div class="small-6 medium-6 large-6 columns">    
      Industry: <?php echo $position->industry; ?>      
    </div>
    <div class="small-6 medium-6 large-6 columns">
      Working Hours: <?php echo $position->working_hours; ?>      
    </div>
    <div class="small-6 medium-6 large-6 columns">
      Shift Pattern: <?php echo $position->shift_pattern; ?>      
    </div>
    <div class="small-6 medium-6 large-6 columns">      
      Salary: <?php echo $position->salary; ?>      
    </div>
    <div class="small-6 medium-6 large-6 columns">
      Vacancy Count: <?php echo $position->vacancy_count; ?>      
    </div>
    <div class="small-12 medium-12 large-12 columns">
      <a href="<?php echo site_url('position'); ?>" class="button tiny alert">Back</a>
      <a href="<?php echo site_url('position/update/' . $position->id); ?>" class="button tiny">Update</a>
    </div>
  </div>
</div>