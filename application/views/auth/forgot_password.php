<div id="auth" class="resetPassword row">
	<div class="row">
	  <div class="small-12 medium-12 large-12 columns">
	  	<h4>Reset Password</h4>
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

	<?php echo $this->load->view('commons/partials/success', null, true); ?>

	<div class="row">
		<?php echo form_open('auth/forgotPassword'); ?>
			<div class="small-12 medium-9 large-10 columns">
				<input type="email" name="email" placeholder="Email*" value="<?php echo set_value('email'); ?>" />
			</div>
			<div class="small-12 medium-2 large-2 columns">
				<a href="<?php echo site_url('auth/login'); ?>" class="button tiny alert">Back</a>
				<button class="tiny">Send Emailer</button>
			</div>
		</form>
	</div>
</div>