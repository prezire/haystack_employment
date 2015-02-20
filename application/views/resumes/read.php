<div id="resume" class="read row">

  <section class="panel radius">
    <div class="row">
      <div class="small-12 medium-12 large-12 columns">
        <h6>Resume</h6><br />
      </div>
      
    <section class="resume">
        
        <div class="row">
          <div class="small-8 medium-10 large-10 columns">
            <strong>Full Name:</strong> <?php echo $resume->full_name; ?><br />      
            
            <strong>Headline:</strong>
            <?php echo $resume->headline; ?>
          </div>
          <div class="small-4 medium-2 large-2 columns">
            <div class="avatar">
              <?php 
                $img = $resume->image_path;
                $img = strlen($img) < 1 ? 
                      base_url('public/img/avatar.jpg') : 
                      base_url('public/uploads/' . $img);
              ?>
              <img class="right" src="<?php echo $img; ?>" />
            </div>
          </div>
        </div>
        

        <div class="row">
          <div class="small-12 medium-12 large-12 columns">
            <strong>Address:</strong> <?php echo $resume->address; ?>      
          </div>
        </div>
        <div class="row">
          <div class="small-6 medium-6 large-6 columns">
            <strong>City:</strong> <?php echo $resume->city; ?>
          </div>
          <div class="small-6 medium-6 large-6 columns">
            <strong>State:</strong> <?php echo $resume->state; ?>
          </div>
        </div>    
        <div class="row">
          <div class="small-12 medium-12 large-12 columns">
            <strong>Country:</strong> <?php echo $resume->country; ?>
          </div>
        </div>
        <div class="row">
          <div class="small-6 medium-6 large-6 columns">
            <strong>Landline:</strong> <?php echo $resume->landline; ?>      
          </div>
          <div class="small-6 medium-6 large-6 columns">
            <strong>Mobile:</strong> <?php echo $resume->mobile; ?>
          </div>
        </div>
        <div class="row">
          <div class="small-6 medium-6 large-6 columns">
            <strong>Availability:</strong> <?php echo $resume->availability; ?>
          </div>
          <div class="small-6 medium-6 large-6 columns">
            <strong>Expected Salary (USD):</strong> <?php echo $resume->expected_salary; ?>
          </div>
        </div>
        <div class="row">
          <div class="small-6 medium-6 large-6 columns">
            <strong>Current Position Title:</strong> 
            <?php echo $resume->current_position_title; ?>
          </div>
          <div class="small-6 medium-6 large-6 columns">
            <strong>Qualification:</strong> <?php echo $resume->qualification; ?>
          </div>
        </div>
        <div class="row">
          <div class="small-12 medium-12 large-12 columns">
            <strong>Summary:</strong> <?php echo $resume->summary; ?>
          </div>
        </div>
    </section>

    <hr />
    
    <section class="workHistories">
      <div class="row">
        <div class="large-12 columns">
          <h5>Work History</h5>
        </div>
      </div>
      
        <ul>
          <?php foreach($workHistories as $w){ ?>
            <li>
              
                <div class="row">
                    <div class="small-6 medium-6 large-6 columns">
                      <strong>Position:</strong>
                      <?php echo $w->position; ?>
                    </div>
                    <div class="small-6 medium-6 large-6 columns">
                      <strong>Company:</strong>
                      <?php echo $w->company; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="small-6 medium-6 large-6 columns">
                      <strong>From:</strong>
                      <?php echo $w->from; ?>
                    </div>
                    <div class="small-6 medium-6 large-6 columns">
                      <strong>To:</strong>
                      <?php echo $w->to; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="small-12 medium-12 large-12 columns">
                      <strong>Location:</strong>
                      <?php echo $w->location; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="small-12 medium-12 large-12 columns">
                      <strong>Summary:</strong>
                      <?php echo nl2br($w->summary); ?>
                    </div>
                </div>
            
            </li>
          <?php } ?>
        </ul>
      
    </section>
    <hr />
    <section class="educations">
      <div class="row">
        <div class="large-12 columns">
          <h5>Education</h5>
        </div>
      </div>
      
      <?php if($educations){ ?>
        <ul>
          <?php foreach($educations as $e){ ?>
            <li>
              <div class="row panel radius">
                <div class="row">
                    <div class="small-6 medium-6 large-6 columns">
                      <strong>Degree:</strong>
                      <?php echo $e->degree; ?>
                    </div>
                    <div class="small-6 medium-6 large-6 columns">
                      <strong>Field Of Study:</strong>
                      <?php echo $e->field_of_study; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="small-12 medium-12 large-12 columns">
                      <strong>School:</strong>
                      <?php echo $e->school; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="small-6 medium-6 large-6 columns">
                      <strong>Country:</strong>
                      <?php echo $e->country; ?>
                    </div>
                    <div class="small-6 medium-6 large-6 columns">
                      <strong>City:</strong>
                      <?php echo $e->city; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="small-6 medium-6 large-6 columns">
                      <strong>From:</strong>
                      <?php echo $e->from; ?>
                    </div>
                    <div class="small-6 medium-6 large-6 columns">
                      <strong>To:</strong>
                      <?php echo $e->to; ?>
                    </div>
                </div>
              </div>
            </li>
          <?php } ?>
        </ul>
      <?php } else { ?>
        <div class="row">
          <div class="small-12 medium-12 large-12 columns">
            No education provided.
          </div>
        </div>
      <?php } ?>
    </section>
    <hr />
    <section class="skills">
      <div class="row">
        <div class="large-12 columns">
          <h5>Skills</h5>
        </div>
      </div>

      <?php if($skills){ ?>
        <ul>
          <?php foreach($skills as $s){ ?>
            <li>
              <div class="row panel radius">
                <div class="small-12 medium-12 large-12 columns">
                  <?php echo $s->name; ?>
                </div>
              </div>
            </li>
          <?php } ?>
        </ul>
      <?php } else { ?>
        <div class="row">
          <div class="small-12 medium-12 large-12 columns">
            No skills provided.
          </div>
        </div>
      <?php } ?>
    </section>
    <hr />
    <section class="certifications">
      <div class="row">
        <div class="large-12 columns">
          <h5>Certifications</h5>
        </div>
      </div>

      <?php if($certifications){ ?>
        <ul>
          <?php foreach($certifications as $c){ ?>
            <li>
              <div class="row panel radius">
                <div class="small-12 medium-12 large-12 columns">
                  <?php echo $c->name; ?>
                </div>
              </div>
            </li>
          <?php } ?>
        </ul>
      <?php } else { ?>
        <div class="row">
          <div class="small-12 medium-12 large-12 columns">
            No certifications provided.
          </div>
        </div>
      <?php } ?>
    </section>
    <hr />
    <section class="additionalInformations">
      <div class="row">
        <div class="large-12 columns">
          <h5>Additional Information</h5>
        </div>
      </div>
      <div class="row">
        <div class="small-12 medium-12 large-12 columns">
          <?php echo nl2br($resume->additional_information); ?>
        </div>
      </div>
    </section>
  </section>
  <?php 
    if(isLoggedIn())
    { 
      if(getRoleName() == 'Applicant')
      {
  ?>
  <div class="row">
    <div class="small-12 medium-12 large-12 columns">
      <a href="<?php echo site_url('resume/updateBySession'); ?>" class="button tiny radius">
        Back
      </a>
    </div>
  </div>
  <?php
      } 
    } 
  ?>
</div>