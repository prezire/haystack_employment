<div id="user" class="create">
    <?php 
      echo validation_errors();
      echo form_open('user/create'); 
    ?>          
      <div>Email: <input type="text" name="email" /></div>
      <div>Password: <input type="text" name="password" /></div>
      <div>Title: <input type="text" name="title" /></div>
      <div>Full Name: <input type="text" name="full_name" /></div>
      <div>Enabled: <input type="checkbox" name="enabled" /></div>
      <div>Landline: <input type="text" name="landline" /></div>
      <div>Mobile: <input type="text" name="mobile" /></div>
      <div>Address: <input type="text" name="address" /></div>
      <div>Nationality: <input type="text" name="nationality" /></div>
      <div>Alternate Email: <input type="text" name="alternate_email" /></div>
      <div>
        Avatar: <input type="image" name="image_path" />      
      </div>
      <a href="<?php echo site_url('user'); ?>">Cancel</a> | 
      <button>Create</button>
  </form>
</div>