<div id="additional_information" class="update row">
  <?php echo form_open('resume/update'); ?>
    <input type="hidden" name="id" value="<?php echo set_value('resume_id', $resume->resume_id); ?>" />  
    <div class="row">
      <div class="small-12 medium-12 large-12 columns">
      	<textarea name="additional_information"><?php echo set_value('additional_information', $additional_information); ?></textarea>
      </div>
    </div>    
    <div class="row">
      <div class="small-12 medium-12 large-12 columns">
      	<button class="button radius small">Update</button>
      </div>
    </div>
  </form>
</div>