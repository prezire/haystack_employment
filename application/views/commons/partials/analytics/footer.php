<div class="row panel">
	<div class="small-12 medium-12 large-12 columns">
			<h5>Save Report</h5>
  	</div>
		<div class="small-12 medium-12 large-2 columns">
      Frequency:
  		<select name="frequency" class="frequency">
  			<option>Off</option>
        <option>Daily</option>
  			<option>Weekly</option>
  			<option>Monthly</option>
        <option>Quarterly</option>
  		</select>
  	</div>

  	<div class="small-12 medium-12 large-4 columns">
  		Title:
      <input type="text" name="title" class="title" placeholder="Title" />
  	</div>

  	<div class="small-12 medium-12 large-4 columns">
      Recipients:
  		<input type="text" name="recipients" class="recipients" placeholder="Recipients. Comma-separated emails" />
  	</div>
  	<div class="small-12 medium-12 large-2 columns">
    	<br />
      <?php echo form_checkbox('send_to_email', null, null, 'id="sendToEmail" class="sendToEmail"'); ?>
      <label for="sendToEmail">Send To Email</label>
      <button class="tiny btnSave">
        Save
      </button>
    </div>


  <div class="small-12 medium-12 large-12 columns">
  	<hr />
  	<h5>Saved Reports</h5>
  	<div class="saved panel">
      <?php foreach ($emailers as $e) { ?>
          <div data-id="<?php echo $e->id; ?>" class="panel">
            <a href="#" class="button tiny delete">×</a>
            <div class="row">
            <div class="small-12 medium-12 large-3 columns"><h5><?php echo $e->title; ?></h5></div>
            <div class="small-12 medium-12 large-3 columns"><b>Report Type:</b> <?php echo $e->report_type; ?></div>
            <div class="small-12 medium-12 large-3 columns"><b>Frequency:</b> <?php echo $e->frequency; ?></div>
            <div class="small-12 medium-12 large-3 columns">
              <b>Dates:</b>
              <?php 
                echo toHumanReadableDate($e->date_from) . 
                ' - ' . toHumanReadableDate($e->date_to); 
              ?>
            </div>
          </div>
          <div class="row">
            <div class="small-12 medium-12 large-3 columns"><b>Report Type:</b> </div>
            <div class="small-12 medium-12 large-3 columns"><b>Metrics:</b> </div>
            <div class="small-12 medium-12 large-3 columns"><b>Target Audience:</b> </div>
            <div class="small-12 medium-12 large-3 columns">
              <a href="#" class="button tiny">Run Report Now</a>
            </div>
          </div>
          <div class="row">
            <div class="small-12 medium-12 large-12 columns"><b>Recipients:</b> <?php echo $e->recipients; ?></div>
          </div>
          </div>
      <?php
        }
      ?>
    </div>
  </div>
</div>