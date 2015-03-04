<div id="additional_information" class="update row">
  <?php echo form_open('additionalinformation/update'); ?>
    <input type="hidden" name="resume_id" value="<?php echo set_value('resume_id', $resume->resume_id); ?>" />  
    <div class="row">
      <div class="small-12 medium-12 large-12 columns">
        <?php 
          if(count($additional_information) < 1){ 
            $additional_information = '';
          }
        ?>
      	<textarea name="information"><?php echo set_value('information', $additional_information); ?></textarea>
      </div>
    </div>    
    <div class="row">
      <div class="small-12 medium-12 large-12 columns">
      	<button class="tiny">Update</button>
      </div>
    </div>
  </form>
</div>