<div id="user" class="read row">
      
      <div class="row">
        <div class="small-6 medium-10 large-10 columns avatar">
          <?php 
            $img = $user->image_path;
            $img = $img ? 
                  base_url('public/uploads/' . $user->image_path) : 
                  base_url('public/img/avatar.jpg');
          ?>
          <img src="<?php echo $img; ?>" />
        </div>
        <div class="small-6 medium-2 large-2 columns">
          <a class="button tiny" 
              href="<?php echo site_url('resume/readByUserId/' . $user->id); ?>">
            View Resume
          </a>
        </div>
      </div>
      <br />
      <div class="row panel radius">
        <div class="large-12 columns">
          <strong>Full Name:</strong>
          <?php echo $user->title; ?>
          <?php echo $user->full_name; ?>
        </div>      
      </div>
      
      <div class="row panel radius">
        <div class="large-6 columns">
          <strong>Email:</strong> 
          <?php echo $user->email; ?>
        </div>
        <div class="large-6 columns">
          <strong>Alternate Email:</strong> 
          <?php echo $user->alternate_email; ?>    
        </div>
      </div>
          
      <div class="row panel radius">
        <div class="large-6 columns">
          <strong>Landline:</strong> 
          <?php echo $user->landline; ?>      
        </div>
        <div class="large-6 columns">
          <strong>Mobile:</strong> 
          <?php echo $user->mobile; ?>      
        </div>
      </div>
      
      <div class="row panel radius">
          <div class="large-6 columns">
            <strong>Address:</strong>
            <?php echo $user->address; ?>
          </div>
          <div class="large-6 columns">
            <strong>Nationality:</strong> 
            <?php echo $user->nationality; ?>
          </div>
      </div>
  </form>
</div>