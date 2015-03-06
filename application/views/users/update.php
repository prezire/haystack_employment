<div id="user" class="update row">
     <div class="row">
      <div class="large-12 columns">
        <h4>Update Profile (<?php echo getRoleName(); ?>)</h4>
        <?php 
          if($this->session->flashdata('update') == 'success') { ?>
          <div class="alert-box success tiny">
            User was updated.
          </div>
          <script>
            $('#user.update .alert-box.success.radius').delay(5000).fadeOut(function(){
               $(this).remove(); 
            });
          </script>
        <?php } ?>
      </div>
     </div>
    <?php 
        echo validation_errors();
        echo form_open_multipart('user/update'); 
    ?>
      <input type="hidden" name="id" value="<?php echo set_value('id', $user->id); ?>" />      
      
      <div class="row">
        <div class="large-6 medium-6 small-8 columns">
          <?php 
            $img = strlen($user->image_path) < 1 ? base_url('public/img/avatar.jpg') : 
                    base_url('public/uploads') . 
                    '/' . 
                    set_value('image_path', $user->image_path);
          ?>
          <div class="avatar"><img src="<?php echo $img; ?>" /></div>
          <br />
          <input type="file" name="image_path" />
        </div>
        <?php if(getRoleName() == 'Applicant'){ ?>
        <div class="large-6 medium-6 small-4 columns">
          <?php //echo site_url('resume/updateBySession'); ?>
          <a href="<?php echo site_url('resume'); ?>" class="button tiny">
            View resumes
          </a>
        </div>
        <?php } ?>
      </div>

      <div class="row">
          <?php 
            $t = set_value('title', $user->title); 
            $mr = $t == 'Mr.' ? 'checked' : '';
            $ms = $t == 'Ms.' ? 'checked' : '';
            $mrs = $t == 'Mrs.' ? 'checked' : '';
          ?>
          <div class="large-12 columns">
            <input type="radio" name="title" value="Mr." <?php echo $mr; ?> id="mr" /><label for="mr">Mr.</label>
            <input type="radio" name="title" value="Ms." <?php echo $ms; ?> id="ms" /><label for="ms">Ms.</label>
            <input type="radio" name="title" value="Mrs." <?php echo $mrs; ?> id="mrs" /><label for="mrs">Mrs.</label>   
          </div>
      </div>
      <div class="row">
        <div class="large-6 columns">Full Name: <input type="text" name="full_name" value="<?php echo set_value('full_name', $user->full_name); ?>" /></div>
        <div class="large-6 columns">Email: <input type="text" name="email" value="<?php echo set_value('email', $user->email); ?>" />      </div>
      </div>
      
      <div class="row">
        <div class="large-6 columns">Alternate Email: <input type="text" name="alternate_email" value="<?php echo set_value('alternate_email', $user->alternate_email); ?>" /></div>      
        <div class="large-6 columns">Password: <input type="password" name="password" value="<?php echo set_value('password', $user->password); ?>" /></div>
      </div>
            
      <div class="row">
        <div class="large-6 columns">Landline: <input type="text" name="landline" value="<?php echo set_value('landline', $user->landline); ?>" />          </div>
        <div class="large-6 columns">Mobile: <input type="text" name="mobile" value="<?php echo set_value('mobile', $user->mobile); ?>" />      </div>
      </div>
      
      <div class="row">
        <div class="large-6 columns">Address: <input type="text" name="address" value="<?php echo set_value('address', $user->address); ?>" />      </div>
        <div class="large-6 columns">Nationality: <input type="text" name="nationality" value="<?php echo set_value('nationality', $user->nationality); ?>" /></div>
      </div>

      <div class="row">
        <div class="small-12 medium-6 large-6 columns">
          City:
          <input type="text" name="city" value="<?php echo set_value('city', $user->city); ?>" />
        </div>
        <div class="small-12 medium-6 large-6 columns">
          State:
          <input type="text" name="state" value="<?php echo set_value('state', $user->state); ?>" />
        </div>
      </div>

      <div class="row">
        <div class="small-12 medium-12 large-12 columns">
          Country: 
          <?php 
            echo form_dropdown
            (
              'country', 
              getCountries(), 
              set_value('country', $user->country)
            ); 
          ?>
        </div>
      </div>
      
      <!-- TODO: Contact Me form. -->
      
      <div class="row">
        <div class="large-12 columns">
          <?php 
            $r = getRoleName();
            if($r == 'Employer'){
          ?>
            <a href="<?php echo site_url('company/updateFromEmployerProfile/' . $user->id); ?>" class="button tiny">
              Update Company
            </a>  
          <?php
            }
            else if($r == 'Educator')
            {
              //
            }
            else
            {
          ?>
            <a href="<?php echo site_url(strtolower($r) . '/read/' . $id); ?>" class="button tiny">Preview</a>
          <?php } ?>
          <button class="small tiny">Update</button>
        </div>
      </div>
  </form>
</div>