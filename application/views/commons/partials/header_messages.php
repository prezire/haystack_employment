<?php if (isset($status)){?>
		<div class="row headerMessages">
			<div class="success small-12 medium-12 large-12 columns">
				<?php if($status == 'success'){ ?>
				  	<div data-alert class="alert-box success tiny">
				    	<p><?php echo $message; ?></p>
				    </div>
				    <script>
			            $('.headerMessages .alert-box.success').
			            	delay(5000).fadeOut(function(){
			               $(this).remove(); 
			            });
					</script>
				<?php }else if($status == 'failed'){ ?>
				  	<div data-alert class="error alert-box alert tiny">
				    	<p><?php echo $message; ?></p>
				    </div>
				<?php } ?>
			</div>
		</div>
<?php } ?>