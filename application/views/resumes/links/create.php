<div id="link" class="create row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('link/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      Resume Id: <input type="text" name="resume_id" />      
          
      Url: <input type="text" name="url" />      
        <a href="<?php echo site_url('link'); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Create</button>
  </form>
</div>