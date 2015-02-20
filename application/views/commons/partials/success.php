<?php 
	if(isset($useSession))
	{
		if($useSession)
		{
			if($this->session->flashdata('status') == 'success')
			{
				$message = 'Internship was successfully updated.';
?>
				<div class="success row">
				  <div class="small-12 medium-12 large-12 columns">
				    <div data-alert class="alert-box success radius">
				      <?php echo $message; ?>
				    </div>
				  </div>
				</div>
				<script>
				  $('.success.row').
				  show().
				  delay(5000).
				  fadeOut();
				</script>
<?php
			}
		}
	}
	else if(isset($status))
	{
		if($status == 'success')
		{
?>
	<div class="success row">
	  <div class="small-12 medium-12 large-12 columns">
	    <div data-alert class="alert-box success radius">
	      <?php echo $message; ?>
	    </div>
	  </div>
	</div>
	<script>
	  $('.success.row').
	  show().
	  delay(5000).
	  fadeOut();
	</script>
<?php
		} 
	} 
?>