<div id="certification" class="create row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('certification/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      Resume Id: <input type="text" name="resume_id" />      
          
      Name: <input type="text" name="name" />      
        <a href="<?php echo site_url('certification'); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Create</button>
  </form>
</div>