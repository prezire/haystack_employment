<div id="company" class="read row">
  <h4></h4>
            
      Id: <?php echo $company->id; ?>      
          
      Name: <?php echo $company->name; ?>      
          
      Description: <?php echo $company->description; ?>      
          
      Logo Filename: <?php echo $company->logo_filename; ?>      
          
      Email: <?php echo $company->email; ?>      
          
      Alternate Email: <?php echo $company->alternate_email; ?>      
          
      Website: <?php echo $company->website; ?>      
          
      Landline: <?php echo $company->landline; ?>      
          
      Mobile: <?php echo $company->mobile; ?>      
          
      Fax: <?php echo $company->fax; ?>      
          
      Address: <?php echo $company->address; ?>      
          
      City: <?php echo $company->city; ?>      
          
      State: <?php echo $company->state; ?>      
          
      Zip Code: <?php echo $company->zip_code; ?>      
          
      Country: <?php echo $company->country; ?>      
        <a href="<?php echo site_url('company'); ?>" class="button radius small alert">Back</a>
    <a href="<?php echo site_url('company/update'); ?>" class="button radius small">Update</a>
  </form>
</div>