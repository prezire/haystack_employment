<div id="position" class="read row">
  <h4>Position</h4>
  <div class="panel row">
    <div class="small-12 medium-12 large-12 columns">
      <div class="name">
        <b><?php echo $position->position_name; ?></b>
      </div>
      <span class="id">
        Job ID: <?php echo $position->position_id; ?>
      </span>
    </div>
    <div class="small-12 medium-12 large-12 columns">
      <b>Job Description:</b>
      <div class="panel">
        <?php echo nl2br($position->position_description); ?>
      </div>
    </div>
    <div class="small-12 medium-6 large-6 columns">
      <b>Dates:</b> 
      <?php echo toHumanReadableDate($position->date_from); ?> - 
      <?php echo toHumanReadableDate($position->date_to); ?>
    </div>
    <div class="small-12 medium-6 large-6 columns">    
      <b>Industry:</b> <?php echo $position->industry; ?>      
    </div>
    <div class="small-12 medium-6 large-6 columns">
      <b>Working Hours:</b> <?php echo $position->working_hours; ?>      
    </div>
    <div class="small-12 medium-6 large-6 columns">
      <b>Shift Pattern:</b> <?php echo $position->shift_pattern; ?>      
    </div>
    <div class="small-12 medium-6 large-6 columns">      
      <b>Salary (USD):</b> <?php echo $position->salary; ?>      
    </div>
    <div class="small-12 medium-6 large-6 columns">
      <b>Vacancy Count:</b> <?php echo $position->vacancy_count; ?>      
    </div>
  </div>

  <div class="panel row">
    <div class="small-12 medium-12 large-12 columns">
      <b>Company:</b> 
      <?php echo $position->company_name; ?>
      <br />
      <span class="address">
        <?php echo $position->company_address; ?>,
        <?php echo $position->company_city; ?>
        <?php echo $position->company_state; ?>,
        <?php echo $position->company_country; ?>,
        <?php echo $position->company_zip_code; ?>
      </span>
    </div>
    <div class="small-12 medium-6 large-6 columns">
      <b>Mobile:</b> <?php echo $position->company_mobile; ?>
    </div>
    <div class="small-12 medium-6 large-6 columns">
      <b>Landline:</b> <?php echo $position->company_landline; ?>
    </div>
    <div class="small-12 medium-12 large-12 columns">
      For more information, visit our company website:
      <a href="<?php echo $position->website; ?>" target="_blank">
        <?php echo $position->company_website; ?>
      </a>.
      Or email us at <a href="mailto:<?php echo $position->company_email; ?>">
        <?php echo $position->company_email; ?>.
      </a>
    </div>
  </div>

  <div class="row">
    <div class="small-12 medium-12 large-12 columns">
      <a href="<?php echo site_url('position'); ?>" class="button tiny">
        Browse Positions
      </a>
      <?php 
        $r = getRoleName();
        if($r == 'Administrator' || $r == 'Employer'){
      ?>
      <a href="<?php echo site_url('position/update/' . $position->position_id); ?>" class="button tiny">Update</a>
      <?php } else if($r == 'Applicant'){ ?>
      <a href="<?php echo site_url('positionapplication/create/' . $position->position_id); ?>" class="button tiny">
        Apply
      </a>
      <?php } ?>
    </div>
  </div>

</div>