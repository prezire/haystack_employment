<div data-id="{id}" class="panel">
  <div class="row">
    <div class="small-12 medium-12 large-3 columns">
      <h5>{title}</h5>
    </div>
    <div class="small-12 medium-12 large-2 columns">
      <b>Send To Emails:</b> 
      <?php echo $sendToEmails ? 'Yes' : 'No'; ?>
    </div>
    <div class="small-12 medium-12 large-3 columns">
      <b>Frequency:</b> {frequency}
    </div>
    <div class="small-12 medium-12 large-4 columns">
      <b>Report Dates:</b>
      <?php 
        echo toHumanReadableDate($dateFrom) . 
        ' - ' . toHumanReadableDate($dateTo); 
      ?>
      <a href="#" class="button tiny delete">×</a>
    </div>
  </div>

  <div class="row">
    <div class="small-12 medium-12 large-3 columns">
      <b>Report Type:</b> {reportType}
    </div>
    <div class="small-12 medium-12 large-2 columns">
      <b>Metric:</b> {metric}
    </div>
    <div class="small-12 medium-12 large-3 columns">
      <b>Target Audience:</b> {targetAudience}
    </div>
    <div class="small-12 medium-12 large-4 columns">
      <a href="#" class="button tiny">Run Report Now</a>
    </div>
  </div>

  <div class="row">
    <div class="small-12 medium-12 large-12 columns">
      <b>Recipients:</b> 
      {recipients}
    </div>
  </div>
</div>