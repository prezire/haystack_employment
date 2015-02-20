<div>
    <div class="row">
        <div class="small-6 medium-6 large-6 columns">Degree
            <input type="text" name="degree[]" /> </div>
        <div class="small-6 medium-6 large-6 columns">Field Of Study
            <input type="text" name="field_of_study[]" /> </div>
    </div>
    <div class="row">
        <div class="small-12 medium-12 large-12 columns">School
            <input type="text" name="school[]" /> </div>
    </div>
    <div class="row">
        <div class="small-6 medium-6 large-6 columns">Country
            <?php echo form_dropdown( 'country[]', getCountries()); ?> </div>
        <div class="small-6 medium-6 large-6 columns">City
            <input type="text" name="city[]" /> </div>
    </div>
    <div class="row">
        <div class="small-6 medium-6 large-6 columns">From
            <input type="text" name="from[]" class="from datepicker" value="" /> </div>
        <div class="small-6 medium-6 large-6 columns">To
            <input type="text" name="to[]" class="to datepicker" value="" /> </div>
    </div>
</div>