<div id="auth" class="login row">
  <div class="row">
    <div class="small-12 medium-12 large-12 columns">
      <h4>Login</h4>
    </div>
  </div>
  <?php 
    echo $this->load->view
    (
      'commons/partials/errors', 
      isset($error) ? array('error' => $error) : null, 
      true
    ); 
  ?>
  
  <div class="row">
    <div class="small-12 medium-12 large-12 columns">
      <?php echo form_open('auth/login'); ?>
        <div class="large-2 columns">Email: *</div>
        <div class="large-10 columns"><input type="email" name="email" /></div>
        
        <div class="large-2 columns">Password: *</div>
        <div class="large-10 columns"><input type="password" name="password" /></div>
        
        <div class="large-10 columns">
          <button class="small radius">Login</button>
          <!--a class="button radius tiny btnFb" permissions="public_profile,email,user_location,user_birthday,user_website,user_friends,user_about_me,user_education_history,user_photos,user_work_history">
            Sign in with Facebook
          </a-->
          <div id="status"></div>
        </div>
      </form>
    </div>
  </div>

  <div class="row options">
    <div class="large-2 medium-12 small-12 columns">&nbsp;</div>
    <div class="large-10 medium-12 small-12 columns">
      <a href="<?php echo site_url('auth/register'); ?>">Register</a> | 
      <a href="<?php echo site_url('auth/forgotPassword'); ?>">Forgot Password</a>
      <br /><br />
    </div>
  </div>
  <div class="row">
    <div class="large-2 medium-12 small-12 columns">&nbsp;</div>
    <div class="large-10 medium-12 small-12 columns">
      By creating an account you agree to our 
      <a href="<?php echo site_url('main/toc'); ?>">Terms and Conditions</a> 
      and our 
      <a href="<?php echo site_url('main/eula'); ?>">End User License Agreement</a>.
    </div>
  </div>
</div>