<div id="comment" class="index row">
  <div class="row">
    <div class="small-12 medium-12 large-12 columns">
      <h4>Comments</h4>
      <p>
        Comments are similar to performance evaluations. 
        If you're an Employer or Faculty Member, search 
        for an Applicant and go to his Profile to 
        Comment about his performance. If you're an 
        Applicant, you can Delete Comments from this page.
      </p>
    </div>
  </div>
  <?php
    $r = getRoleName(); 
    foreach($comments as $c)
    {
  ?>
      <div class="row panel radius comment">
        <div class="small-12 medium-12 large-11 columns">
          <div>
            <?php if($r == 'Applicant') { ?>
              <a href="#" class="commenter">
                <strong>Commenter:</strong>
                <?php echo $c->commenter_full_name; ?>
              </a>
            <?php 
              } 
              else if($r == 'Employer')
              {
            ?>
              <a href="#" class="commented">
                <strong>Applicant:</strong>
                <?php echo $c->commented_full_name; ?>
              </a>
            <?php } ?>
            <span class="comment"><?php echo $c->comment; ?></span>
          </div>
          <div class="dateTimeUpdated">
            <?php echo toHumanReadableDate($c->date_time_updated); ?>
          </div>
        </div>
        <div class="small-12 medium-12 large-1 columns">
            <a href="<?php echo site_url('comment/delete/' . $c->comment_id); ?>" 
              class="button tiny right delete">
              &times;
            </a>
          </div>
      </div>
  <?php
    }
  ?>
</div>