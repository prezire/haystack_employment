<div class="row panel radius">
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
  	<div class="small-12 medium-12 large-6 columns">
			Date From: 
		<input type="text" name="date_from" class="from datepicker" />
	</div>
	<div class="small-12 medium-12 large-6 columns">
		Date To: 
		<input type="text" name="date_to" class="to datepicker" />
  	</div>
</div>