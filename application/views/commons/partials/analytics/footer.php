<div class="row panel">
	<div class="small-12 medium-12 large-12 columns">
			<h5>Save Report</h5>
  	</div>
		<div class="small-12 medium-12 large-2 columns">
      <b>Frequency:</b>
  		<select name="frequency" class="frequency">
        <option>Daily</option>
  			<option>Weekly</option>
  			<option>Monthly</option>
  		</select>
  	</div>

  	<div class="small-12 medium-12 large-4 columns">
  		<b>Title:</b>
      <input type="text" name="title" class="title" placeholder="Title" />
  	</div>

  	<div class="small-12 medium-12 large-4 columns">
      <b>Recipients:</b>
  		<input type="text" name="recipients" class="recipients" placeholder="Comma-separated emails." />
  	</div>
  	<div class="small-12 medium-12 large-2 columns">
    	<br />
      <?php echo form_checkbox('send_to_emails', 1, null, 'id="sendToEmails" class="sendToEmails"'); ?>
      <label for="sendToEmails">Send To Emails</label>
      <button class="tiny btnSave">
        Save
      </button>
    </div>


  <div class="small-12 medium-12 large-12 columns">
  	<hr />
  	<h5>Saved Reports</h5>
  	<div class="saved panel">
      <?php 
        $this->load->library('parser');
        foreach ($savedReports as $s) 
        {
          $a = array
          (
            'id' => $s->id,
            'title' => $s->title,
            'sendToEmails' => $s->send_to_emails,
            'frequency' => $s->frequency,
            'dateFrom' => $s->date_from,
            'dateTo' => $s->date_to,
            'reportType' => $s->report_type,
            'metric' => $s->metric,
            'targetAudience' => $s->target_audience,
            'recipients' => $s->recipients
          );
          echo $this->parser->parse
          (
            'commons/partials/analytics/saved_report', 
            $a, 
            true
          );
        }
      ?>
    </div>
  </div>
</div>