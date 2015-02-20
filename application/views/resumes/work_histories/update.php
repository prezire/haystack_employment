<div>
    <div class="row">
        <div class="small-6 medium-6 large-6 columns">Position
            <input type="text" name="position[]" value="<?php echo set_value('id', $workHistory->position); ?>" /> </div>
        <div class="small-6 medium-6 large-6 columns">Company
            <input type="text" name="company[]" value="<?php echo set_value('id', $workHistory->company); ?>" /> </div>
    </div>
    <div class="row">
        <div class="small-6 medium-6 large-6 columns">From
            <input type="text" name="from[]" class="from datepicker" value="<?php echo set_value('id', $workHistory->from); ?>" /> </div>
        <div class="small-6 medium-6 large-6 columns">To
            <input type="text" name="to[]" class="to datepicker" value="<?php echo set_value('id', $workHistory->to); ?>" /> </div>
    </div>
    <div class="row">
        <div class="small-12 medium-12 large-12 columns">Location
            <input type="text" name="location[]" value="<?php echo set_value('id', $workHistory->location); ?>" /> </div>
    </div>
    <div class="row">
        <div class="small-12 medium-12 large-12 columns">Summary
            <textarea name="summary[]"
                placeholder="e.g. Description of work and list of portfolios."><?php echo set_value('id', $workHistory->summary); ?></textarea>
        </div>
    </div>
</div>