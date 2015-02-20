<div id="skill" class="update row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('skill/update'); 
    ?>          
      Id: <input type="text" name="id" value="<?php echo set_value('id', $skill->id); ?>" />      
          
      Resume Id: <input type="text" name="resume_id" value="<?php echo set_value('resume_id', $skill->resume_id); ?>" />      
          
      Name: <input type="text" name="name" value="<?php echo set_value('name', $skill->name); ?>" />      
        <a href="<?php echo site_url('skill/read/'  . $skill->id); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Update</button>
  </form>
</div>