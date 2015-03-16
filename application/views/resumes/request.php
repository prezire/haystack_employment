<div id="resume" class="request row">
  <?php
    echo form_open('resume/request'); 
    echo form_hidden('user_id', $userId);
  ?>
    <div class="small-12 medium-12 large-12 columns">
      <h4>Resume Request</h4>
    </div>
    <div class="small-12 medium-12 large-12 columns">
      <?php echo validation_errors(); ?>
    </div>
    <div class="small-12 medium-12 large-12 columns">
      This applicant has not set any publicly viewable resume. 
      Enter your email or any recipient emails below, 
      separated by comma to request for one.
    </div>
    <div class="small-12 medium-10 large-10 columns">
      <input type="text" name="emails" placeholder="Emails*" />
    </div>
    <div class="small-12 medium-2 large-2 columns">
      <a href="<?php echo site_url('applicant/read/' . $applicantId); ?>" class="button alert tiny">Back</a>
      <button class="tiny">Send</button>
    </div>
  </form>
</div>