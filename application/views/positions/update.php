<div id="position" class="update row">
  <h4>Position</h4>
    <?php 
      echo validation_errors();
      echo form_open('position/update'); 
    ?>          
      <input type="hidden" name="id" value="<?php echo set_value('id', $position->position_id); ?>" />      
      <input type="hidden" name="employer_id" value="<?php echo set_value('employer_id', $position->employer_id); ?>" />

      <div class="row">
        <div class="small-12 medium-12 large-12 columns">
          Name: <input type="text" name="name" value="<?php echo set_value('name', $position->position_name); ?>" />      
        </div>
        <div class="small-12 medium-12 large-12 columns">
          Description: <textarea name="description" placeholder="Job Responsibilities, Requirements, Perks."><?php echo set_value('description', $position->position_description); ?></textarea>      
        </div>
        <div class="small-6 medium-6 large-6 columns">
          Date From: <input type="text" name="date_from" class="datepicker" value="<?php echo set_value('date_from', $position->date_from); ?>" />      
        </div>
        <div class="small-6 medium-6 large-6 columns">
          Date To: <input type="text" name="date_to" class="datepicker" value="<?php echo set_value('date_to', $position->date_to); ?>" />      
        </div>
        <div class="small-6 medium-6 large-6 columns">
          Vacancy Count: <input type="text" name="vacancy_count" value="<?php echo set_value('vacancy_count', $position->vacancy_count); ?>" />      
        </div>
        <div class="small-6 medium-6 large-6 columns">
          Working Hours: <input type="text" placeholder="9 AM - 6 PM" name="working_hours" value="<?php echo set_value('working_hours', $position->working_hours); ?>" />      
        </div>
        <div class="small-6 medium-6 large-6 columns">
          Shift Pattern: <input type="text" name="shift_pattern" value="<?php echo set_value('shift_pattern', $position->shift_pattern); ?>" />      
        </div>
        <div class="small-6 medium-6 large-6 columns">
          Salary (USD): <input type="text" name="salary" value="<?php echo set_value('salary', $position->salary); ?>" />      
        </div>
        <div class="small-12 medium-12 large-6 columns">
          Industry: <?php echo form_dropdown('industry', getIndustries(), set_value('industry', $position->industry)); ?>
        </div>
        <div class="small-12 medium-12 large-12 columns">
          <a href="<?php echo site_url('position/read/' . $position->position_id); ?>" class="button tiny">
            Preview
          </a>
          <button class="tiny">Update</button>
          <a href="<?php echo site_url('ad/generate/' . $position->position_id); ?>" class="button tiny">
            Generate Ad Script
          </a>
        </div>
      </div>
  </form>
</div>