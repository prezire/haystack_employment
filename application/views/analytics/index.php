<div id="analytics" class="index row">
	<h4>
		Analytics For 
		<?php
			$r =  getRoleName();
			$this->load->helper('inflector');
			echo plural($r); 
		?>
	</h4>
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
		echo $this->load->view('commons/partials/analytics/index_header', null, true);
		echo $this->load->view('commons/partials/analytics/' . $view, null, true);
		echo $this->load->view('commons/partials/analytics/index_footer', array('emailers' => $emailers), true);
	?>
</div>