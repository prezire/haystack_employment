<div class="row panel">
  <div class="small-12 medium-2 large-2 columns">
    Field:
    <?php 
      echo form_dropdown
      (
        'field', 
        getAnalyticsFields('Employer'),
        null,
        'class="field"'
      ); 
    ?>
  </div>
  <div class="small-12 medium-2 large-2 columns">
    Metric:
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
    Series:
    <?php 
      echo form_dropdown
      (
        'series', 
        getAnalyticsSeries(),
        null,
        'class="series"'
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