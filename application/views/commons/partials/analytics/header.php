<div class="row panel">
	<?php
		/*
			Graph types:
			http://localhost/haystack/public/libs/amcharts_3.13.0.free/samples/
			Exporting:
			_exporting_to_png.html
			_exporting_to_multiple_formats.html
			echo form_dropdown('positions', $positions);
		*/
	?>
	<input type="hidden" class="userId" value="<?php echo getLoggedUser()->id; ?>" />
	<?php 
		$this->load->helper('date');
	    $d = mdate('%Y-%m-%d', time());
	?>
	<div class="small-12 medium-12 large-6 columns">
		<label>Date From:*</label>
		<input type="text" name="date_from" class="from datepicker" value="<?php echo $d; ?>" />
	</div>
	<div class="small-12 medium-12 large-6 columns">
		<label>Date To:*</label>
		<input type="text" name="date_to" class="to datepicker" value="<?php echo $d; ?>" />
	</div>
</div>