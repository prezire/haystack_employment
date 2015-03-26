<div id="ad" class="create row">
  <h4>Ad</h4>
    <?php 
      echo validation_errors();
      echo form_open('ad/create'); 
    ?>
    <div class="row">
      <div class="small-12 medium-12 large-12 columns">        
          Id: <input type="text" name="id" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Script: <input type="text" name="script" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Script Type: <input type="text" name="script_type" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Description: <textarea name="description"></textarea>      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Width: <input type="text" name="width" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Height: <input type="text" name="height" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Image: <input type="file" name="image" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Date From: <input type="text" name="date_from" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Date To: <input type="text" name="date_to" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Enabled: <input type="checkbox" name="enabled" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Owner Full Name: <input type="text" name="owner_full_name" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Owner Email: <input type="text" name="owner_email" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Owner Landline: <input type="text" name="owner_landline" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Owner Mobile: <input type="text" name="owner_mobile" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Company Name: <input type="text" name="company_name" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Company Address: <input type="text" name="company_address" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Company City: <input type="text" name="company_city" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Company Country: <input type="text" name="company_country" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Company Zip Code: <input type="text" name="company_zip_code" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Company Landline: <input type="text" name="company_landline" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Company Mobile: <input type="text" name="company_mobile" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Payable Amount: <input type="text" name="payable_amount" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Paid Amount: <input type="text" name="paid_amount" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Paid By: <input type="text" name="paid_by" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Created On: <input type="text" name="created_on" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Last Updated: <input type="text" name="last_updated" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Paid On: <input type="text" name="paid_on" />      
      </div>  
    </div>
      <div class="row">
        <div class="small-12 medium-12 large-12 columns">
          <a href="<?php echo site_url('ad'); ?>" class="button tiny alert">Cancel</a>
          <button class="button tiny">Create</button>
        </div>
      </div>
  </form>
</div>