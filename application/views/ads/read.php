<div id="ad" class="read row">
  <h4>Ad</h4>
    <div class="row">
  <div class="small-12 medium-12 large-12 columns">  
        Id: <?php echo $ad->id; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Script: <?php echo $ad->script; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Script Type: <?php echo $ad->script_type; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Description: <?php echo $ad->description; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Width: <?php echo $ad->width; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Height: <?php echo $ad->height; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Image: <?php echo $ad->image; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Date From: <?php echo $ad->date_from; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Date To: <?php echo $ad->date_to; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Enabled: <?php echo $ad->enabled; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Owner Full Name: <?php echo $ad->owner_full_name; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Owner Email: <?php echo $ad->owner_email; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Owner Landline: <?php echo $ad->owner_landline; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Owner Mobile: <?php echo $ad->owner_mobile; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Company Name: <?php echo $ad->company_name; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Company Address: <?php echo $ad->company_address; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Company City: <?php echo $ad->company_city; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Company Country: <?php echo $ad->company_country; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Company Zip Code: <?php echo $ad->company_zip_code; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Company Landline: <?php echo $ad->company_landline; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Company Mobile: <?php echo $ad->company_mobile; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Payable Amount: <?php echo $ad->payable_amount; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Paid Amount: <?php echo $ad->paid_amount; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Paid By: <?php echo $ad->paid_by; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Created On: <?php echo $ad->created_on; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Last Updated: <?php echo $ad->last_updated; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Paid On: <?php echo $ad->paid_on; ?>    </div>
</div>
  <div class="row">
    <div class="small-12 medium-12 large-12 columns">
      <a href="<?php echo site_url('ad'); ?>" class="button tiny alert">Back</a>
      <a href="<?php echo site_url('ad/update'); ?>" class="button tiny">Update</a>
    </div>
  </div>
</div>