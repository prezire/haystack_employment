<div class="row">
  <div class="large-6 columns">
    <input type="radio" name="title" value="Mr." id="mr" checked /><label for="mr">Mr.</label>
    <input type="radio" name="title" value="Ms." id="ms" /><label for="ms">Ms.</label>
    <input type="radio" name="title" value="Mrs." id="mrs" /><label for="mrs">Mrs.</label>
  </div>
  <div class="large-6 columns">Avatar: <input type="file" name="image_path" /></div>
  
</div>
<div class="row">
  <div class="large-6 columns">Email: <input type="text" name="email" value="<?php echo set_value('email'); ?>" /></div>
  <div class="large-6 columns">Alternate Email: <input type="text" name="alternate_email" value="<?php echo set_value('alternate_email'); ?>" /></div>
</div>
<div class="row">
  <div class="large-6 columns">Full Name: <input type="text" name="full_name" value="<?php echo set_value('full_name'); ?>" /></div>
  <div class="large-6 columns">Password: <input type="text" name="password" value="<?php echo set_value('password'); ?>" /></div>
</div>
<div class="row">
  <div class="large-6 columns">Landline: <input type="text" name="landline" value="<?php echo set_value('landline'); ?>" /></div>
  <div class="large-6 columns">Mobile: <input type="text" name="mobile" value="<?php echo set_value('mobile'); ?>" /></div>
</div>
<div class="row">
  <div class="large-6 columns">Address: <input type="text" name="address" value="<?php echo set_value('address'); ?>" /></div>
  <div class="large-6 columns">Nationality: <input type="text" name="nationality" value="<?php echo set_value('nationality'); ?>" /></div>
</div>
<div class="row">
  <div class="large-6 columns">City: <input type="text" name="city" value="<?php echo set_value('city'); ?>" /></div>
  <div class="large-6 columns">State: <input type="text" name="state" value="<?php echo set_value('state'); ?>" /></div>
</div>
<div class="row">
  <div class="large-12 columns">Country: <?php echo form_dropdown('country', getCountries(), set_value('country')); ?></div>
</div>