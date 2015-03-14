<div id="position" class="create row">
  <h4>New Position</h4>
  <?php
  echo validation_errors();
  echo form_open('position/create');
  ?>
  <div class="row">
    <div class="small-12 medium-12 large-12 columns">Name*: <input type="text" name="name" value="<?php echo set_value('name'); ?>" /></div>
    <div class="small-12 medium-12 large-12 columns">
      Description*:
      <?php echo $this->load->view('commons/partials/wysiwyg_controls', null, true); ?>
      <div id='editor' contenteditable>
        <b> Job Responsibilities:</b>
          <div>
            <ul>
              <ul>
                <li><span style="font-size: 12px; line-height: 19px;">Responsibility 1</span></li>
                <li><span style="font-size: 12px; line-height: 19px;">Responsibility 2</span></li>
                <li><span style="font-size: 12px; line-height: 19px;">Responsibility 3</span></li>
              </ul>
            </ul>
          </div>
          <div>
            <div><b>Requirements:</b></div>
            <div>
              <ul>
                <ul>
                  <li><span style="font-size: 12px; line-height: 19px;">Requirement 1</span></li>
                  <li><span style="font-size: 12px; line-height: 19px;">Requirement 2</span></li>
                  <li><span style="font-size: 12px; line-height: 19px;">Requirement 3</span></li>
                </ul>
              </ul>
            </div>
            <div><b>Perks:</b></div>
            <div>
              <ul>
                <ul>
                  <li><span style="font-size: 12px; line-height: 19px;">Perks 1</span></li>
                  <li><span style="font-size: 12px; line-height: 19px;">Perks 2</span></li>
                  <li><span style="font-size: 12px; line-height: 19px;">Perks 3</span></li>
                </ul>
              </ul>
            </div>
          </div>
        <?php echo set_value('description'); ?>
      </div>
      <input type="hidden" name="description" id='output' value="<?php echo set_value('description'); ?>" />
    </div>
    <div class="small-12 medium-6 large-6 columns">Date From:* <input type="text" name="date_from" class="datepicker" value="<?php echo set_value('date_from'); ?>" /></div>
    <div class="small-12 medium-6 large-6 columns">Date To:* <input type="text" name="date_to" class="datepicker" value="<?php echo set_value('date_to'); ?>" /></div>
    <div class="small-12 medium-6 large-6 columns">Industry*: <?php echo form_dropdown('industry', getIndustries()); ?></div>
    <div class="small-12 medium-6 large-6 columns">Category*: <?php echo form_dropdown('category', getPositionCategories(), set_value('category')); ?></div>
    <div class="small-12 medium-6 large-6 columns">Working Hours*: <input type="text" name="working_hours" value="<?php echo set_value('working_hours', '9AM - 6PM'); ?>" /></div>
    <div class="small-12 medium-6 large-6 columns">Shift Pattern: <?php echo form_dropdown('shift_pattern', getShiftPatterns(), set_value('shift_pattern')); ?></div>
    <div class="small-12 medium-6 large-6 columns">Salary (USD)*: <input type="text" name="salary" value="<?php echo set_value('salary'); ?>" /></div>
    <div class="small-12 medium-6 large-6 columns">Vacancy Count*: <input type="text" name="vacancy_count" value="<?php echo set_value('vacancy_count', 1); ?>" /></div>
    <div class="small-12 medium-6 large-12 columns">
      <a href="<?php echo site_url('position'); ?>" class="button tiny alert">Cancel</a>
      <button class="tiny">Create</button>
    </div>
  </div>
</form>
</div>