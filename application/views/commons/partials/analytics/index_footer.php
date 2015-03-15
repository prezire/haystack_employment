<div class="row panel">
	<div class="small-12 medium-12 large-12 columns">
			<h5>Email Report</h5>
  	</div>
		<div class="small-12 medium-12 large-3 columns">
  		<select name="frequency" class="frequency">
  			<option>Daily</option>
  			<option>Weekly</option>
  			<option>Monthly</option>
  		</select>
  	</div>

  	<div class="small-12 medium-12 large-4 columns">
  		<input type="text" name="title" class="title" placeholder="Title" />
  	</div>

  	<div class="small-12 medium-12 large-4 columns">
  		<input type="text" name="recipients" class="recipients" placeholder="Recipients. Comma-separated emails" />
  	</div>
  	<div class="small-12 medium-12 large-1 columns">
    	<button class="tiny btnSave">Save</button>
    </div>


  <div class="small-12 medium-12 large-12 columns">
  	<hr />
  	<h5>Saved Emailer Reports</h5>
  	<div class="saved panel">
      <?php foreach ($emailers as $e) { ?>
          <div data-id="<?php echo $e->id; ?>" class="panel row">
            <div class="small-12 medium-12 large-12 columns"><h5><?php echo $e->title; ?></h5></div>
            <div class="small-12 medium-12 large-4 columns">Report Type: <?php echo $e->report_type; ?></div>
            <div class="small-12 medium-12 large-4 columns">Frequency: <?php echo $e->frequency; ?></div>
            <div class="small-12 medium-12 large-4 columns">
              Dates: 
              <?php 
                echo toHumanReadableDate($e->date_from) . 
                ' - ' . toHumanReadableDate($e->date_to); 
              ?>
            </div>
            <div class="small-12 medium-12 large-12 columns">Recipients: <?php echo $e->recipients; ?></div>
            <a href="#" class="button tiny delete">×</a>
          </div>
      <?php
        }
      ?>
    </div>
  </div>
</div>