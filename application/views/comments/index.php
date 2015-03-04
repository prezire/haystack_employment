<div id="comment" class="index row">
  <div class="row">
    <div class="small-12 medium-12 large-12 columns">
      <h4>Comments</h4>
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
          <div class="dateTime"><?php echo $c->date_time; ?></div>
        </div>
        <div class="small-12 medium-12 large-1 columns">
            <a href="#" class="delete close">&times;</a>
          </div>
      </div>
  <?php
    }
  ?>
</div>