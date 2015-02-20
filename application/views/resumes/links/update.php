<div id="link" class="update row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('link/update'); 
    ?>          
      Id: <input type="text" name="id" value="<?php echo set_value('id', $link->id); ?>" />      
          
      Resume Id: <input type="text" name="resume_id" value="<?php echo set_value('resume_id', $link->resume_id); ?>" />      
          
      Url: <input type="text" name="url" value="<?php echo set_value('url', $link->url); ?>" />      
        <a href="<?php echo site_url('link/read/'  . $link->id); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Update</button>
  </form>
</div>