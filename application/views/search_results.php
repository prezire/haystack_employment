<div id="search" class="results row">

	<?php echo $this->load->view('commons/partials/search', null, true); ?>

	<div class="row">
	  <div class="small-12 medium-12 large-12 columns">
	  	Results for "<i><?php echo $this->input->post('keywords'); ?></i>"
		<br /><br />
	  </div>
	</div>

	<div class="listing">
		<?php foreach($results as $i)
			{
				echo $this->load->view
				(
					'commons/partials/internships/listing', 
					array('internship' => $i, 'method' => 'read'), 
					true
				); 
			}
		?>
	</div>
</div>