<div>
    <div class="row">
        <div class="small-6 medium-6 large-6 columns">Degree
            <input type="text" name="degree[]" value="<?php echo set_value('id', $education->degree); ?>" /> </div>
        <div class="small-6 medium-6 large-6 columns">Field Of Study
            <input type="text" name="field_of_study[]" value="<?php echo set_value('id', $education->field_of_study); ?>" /> </div>
    </div>
    <div class="row">
        <div class="small-12 medium-12 large-12 columns">School
            <input type="text" name="school[]" value="<?php echo set_value('id', $education->school); ?>" /> </div>
    </div>
    <div class="row">
        <div class="small-6 medium-6 large-6 columns">Country
            <?php echo form_dropdown( 'country[]', getCountries(), set_value('id', $education->country)); ?> </div>
        <div class="small-6 medium-6 large-6 columns">City
            <input type="text" name="city[]" value="<?php echo set_value('id', $education->city); ?>" /> </div>
    </div>
    <div class="row">
        <div class="small-6 medium-6 large-6 columns">From
            <input type="text" name="from[]" class="from datepicker" value="<?php echo set_value('id', $education->from); ?>" /> </div>
        <div class="small-6 medium-6 large-6 columns">To
            <input type="text" name="to[]" class="to datepicker" value="<?php echo set_value('id', $education->to); ?>" /> </div>
    </div>
</div>