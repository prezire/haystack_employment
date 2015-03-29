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

	<input type="hidden" 
			class="organizationId" 
			value="<?php echo $organizationId; ?>" />
	<input type="hidden" 
			class="roleName" 
			value="<?php echo $r; ?>" />

	<?php 
		$s = 'commons/partials/analytics/';
		$a = array('savedReports' => $savedReports);
		echo $this->load->view($s . 'header', null, true);
		echo $this->load->view($s . 'body', null, true);
		//echo $this->load->view($s . 'footer', $a, true);
	?>
</div>