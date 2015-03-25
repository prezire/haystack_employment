<div class="row panel employer">
  <div class="small-12 medium-2 large-2 columns">
    <b>Report Type:</b>
    <?php 
      echo form_dropdown
      (
        'reportType', 
        getAnalyticsFields('Employer'),
        null,
        'class="reportType"'
      ); 
    ?>
  </div>
  <div class="small-12 medium-2 large-2 columns">
    <b>Metric:</b>
      <?php 
        echo form_dropdown
        (
          'metric', 
          getAnalyticsFieldMetrices('Employer', 'Delivery'),
          null,
          'class="metric"'
        ); 
      ?>
  </div>
	<div class="small-12 medium-2 large-2 columns">
    <b>Target Audience:</b>
    <?php 
      echo form_dropdown
      (
        'targetAudience', 
        getAnalyticsSeries(),
        null,
        'class="targetAudience"'
      );
    ?>
  </div>
   <div class="small-12 medium-10 large-6 columns">
    <br />
  	<button data-role-name="<?php echo getRoleName(); ?>" 
            class="tiny btnGenerate">
      Generate Report
    </button>
  </div>
  <div class="small-12 medium-12 large-12 columns graph panel" id="chartdiv"></div>
</div>