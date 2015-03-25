<div id="analytics" class="index row">
	<h4>
		Analytics For 
		<?php
			$r =  getRoleName();
			$this->load->helper('inflector');
			echo plural($r); 
		?>
	</h4>

	<div data-alert class="error alert-box alert tiny"><p>Error</p></div>

	<p>
		<?php 
			if($r == 'Employer')
			{
				//Message about features.
			}
			else if($r == 'Faculty')
			{
				//Message about features.
			}
		?>
	</p>
	<input type="hidden" class="organizationId" value="<?php echo $organizationId; ?>" />
	<?php 
		echo $this->load->view('commons/partials/analytics/header', null, true);
		echo $this->load->view('commons/partials/analytics/body', null, true);
		echo $this->load->view('commons/partials/analytics/footer', array('savedReports' => $savedReports), true);
	?>
</div>