<div id="user" class="read row">
     <div class="row">
      <div class="large-12 columns">
        <h4>
          Profile (<?php echo getRoleName(); ?>)
        </h4>
      </div>
     </div>

     <div class="row">

      <div class="large-12 columns">
        <?php 
            $img = strlen($user->image_path) < 1 ? base_url('public/img/avatar.jpg') : 
                    base_url('public/uploads') . 
                    '/' . 
                    set_value('image_path', $user->image_path);
          ?>
          <div class="avatar">
            <img src="<?php echo $img; ?>" />
          </div>
      </div>
        <div class="large-6 columns">
          <strong>Title:</strong> <?php echo $user->title; ?>
        </div>
        <div class="large-6 columns">
          <strong>Full Name:</strong> <?php echo $user->full_name; ?>
        </div>
        <div class="large-6 columns">
          <strong>Email:</strong> <?php echo $user->email; ?>
        </div>
      
        <div class="large-6 columns">
          <strong>Alternate Email:</strong> <?php echo $user->alternate_email; ?>
        </div>
            

        <div class="large-6 columns">
          <strong>Landline:</strong> <?php echo $user->landline; ?>
        </div>
        <div class="large-6 columns">
          <strong>Mobile:</strong> <?php echo $user->mobile; ?>
        </div>
        
        <div class="large-6 columns">
          <strong>Address:</strong> <?php echo $user->address; ?>
        </div>
        <div class="large-6 columns">
          <strong>Nationality:</strong> <?php echo $user->nationality; ?>
        </div>

        <div class="small-12 medium-6 large-6 columns">
          <strong>City:</strong> <?php echo $user->city; ?>
        </div>
        <div class="small-12 medium-6 large-6 columns">
          <strong>State:</strong> <?php echo $user->state; ?>
        </div>

        <div class="small-12 medium-12 large-6 columns">
          <strong>Country:</strong> <?php echo $user->country; ?>
        </div>
        <div class="small-12 medium-12 large-6 columns">
          <strong>Zip Code:</strong> <?php echo $user->zip_code; ?>
        </div>

      <!-- TODO: Contact Me form. -->
    </div>
</div>