<div id="auth" class="resetPassword row">

	<div class="row">
	  <div class="small-12 medium-12 large-12 columns">
	  	<h4>Update Password</h4>
	  	<?php 
          if(isset($status))
          {
            if($status == 'success')
            { 
          ?>
          <div class="alert-box success radius">
            Your password was successfully updated.
            Click <a href="<?php echo site_url('auth/login'); ?>">here</a> 
            to login using your new credentials.
          </div>
        <?php 
            }
          } 
        ?>
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

	<?php echo form_open('auth/updatePassword'); ?>
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<div class="row">
		  <div class="small-6 medium-6 large-3 columns">New Password*:</div>
		  <div class="small-6 medium-6 large-9 columns">
		  	<input type="password" name="password" />
		  </div>
		</div>
		<div class="row">
		  <div class="small-6 medium-6 large-3 columns">Confirm New Password*:</div>
		  <div class="small-6 medium-6 large-9 columns">
		  	<input type="password" name="confirm_password" />
		  </div>
		</div>
		<div class="row">
		  <div class="small-6 medium-6 large-3 columns">&nbsp;</div>
		  <div class="small-6 medium-6 large-9 columns">
		  	<button class="tiny radius">Update</button>
		  </div>
		</div>

	</form>
</div>