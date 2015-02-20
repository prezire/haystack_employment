<div id="additional_information" class="create row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('additionalinformation/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      Resume Id: <input type="text" name="resume_id" />      
          
      Information: <textarea name="information"></textarea>      
        <a href="<?php echo site_url('additionalinformation'); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Create</button>
  </form>
</div>