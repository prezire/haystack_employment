<div id="resume" class="update row">
  <div class="hidden">
    <div class="educationView">
      <?php echo $this->load->view('resumes/educations/create', null, true); ?>
    </div>
    <div class="workHistoryView">
      <?php echo $this->load->view('resumes/work_histories/create', null, true); ?>
    </div>
  </div>

  <section>
    <div class="row">
      <div class="small-12 medium-12 large-12 columns"><h6>Resume</h6></div>
      <div class="small-12 medium-12 large-12 columns">
        <section class="options">
          <a href="<?php echo site_url('resume/read/' . $resume->resume_id); ?>" class="button tiny radius preview">
            <i class="fa fa-file-text-o"></i> Preview
          </a>
          <a href="#" class="button tiny radius forward">
            <i class="fa fa-forward"></i> Forward
          </a>
          <!--a href="#" class="button tiny radius download">
            <i class="fa fa-angle-double-down"></i> Download
          </a-->
          <div class="row panel recipients radius hide">
            <div class="small-8 medium-11 large-11 columns">
              <input type="text" class="recipients" placeholder="Comma-separated emails." /> 
            </div>
            <div class="small-4 medium-1 large-1 columns">
              <button class="tiny radius">Send</button>
            </div>
          </div>
        </section>
      </div>
    </div>
    <hr />
    <section class="resume">
      <div class="row">
        <div class="small-11 medium-11 large-11 columns">
          <h5>
            Basic Profile (Note: Disabled items are directly linked to your 
            <a href="<?php echo site_url('user/update/' . getLoggedUser()->id); ?>">
              profile
            </a>)
          </h5>
        </div>
        <div class="small-1 medium-1 large-1 columns"><i class="fa fa-angle-left right"></i></div>
      </div>
      <?php echo form_open('resume/update'); ?>
        <input type="hidden" name="id" value="<?php echo set_value('id', $resume->resume_id); ?>" />  
        

        <div class="row">
          <div class="small-8 medium-10 large-10 columns">
            Full Name <input type="text" name="full_name" value="<?php echo set_value('full_name', $resume->full_name); ?>" disabled />      
            Headline <textarea name="headline" placeholder="Description about your career path."><?php echo set_value('headline', $resume->headline); ?></textarea>
          </div>
          <div class="small-4 medium-2 large-2 columns">
            <div class="avatar">
              <img class="right" src="<?php echo base_url('public/uploads/' . $resume->image_path); ?>" />
            </div>
          </div>
        </div>
        

        <div class="row">
          <div class="small-12 medium-12 large-12 columns">
            Address <textarea name="address" disabled><?php echo set_value('address', $resume->address); ?></textarea>      
          </div>
        </div>
        <div class="row">
          <div class="small-6 medium-6 large-6 columns">
            City <input type="text" name="city" value="<?php echo set_value('city', $resume->city); ?>" disabled />
          </div>
          <div class="small-6 medium-6 large-6 columns">
            State <input type="text" name="state" value="<?php echo set_value('state', $resume->state); ?>" disabled />
          </div>
        </div>    
        <div class="row">
          <div class="small-12 medium-12 large-12 columns">
            Country <input type="text" name="country" value="<?php echo set_value('country', $resume->country); ?>" disabled />
          </div>
        </div>
        <div class="row">
          <div class="small-6 medium-6 large-6 columns">
            Landline <input type="text" name="landline" value="<?php echo set_value('landline', $resume->landline); ?>" disabled />      
          </div>
          <div class="small-6 medium-6 large-6 columns">
            Mobile <input type="text" name="mobile" value="<?php echo set_value('mobile', $resume->mobile); ?>" disabled />
          </div>
        </div>
        <div class="row">
          <div class="small-6 medium-6 large-6 columns">
            Availability
            <?php 
              $aAvails = array
              (
                'Not applicable' => 'Not applicable',
                'Immediately' => 'Immediately',
                '2 weeks' => '2 weeks',
                '1 month' => '1 month',
                '2 months' => '2 months'
              );
              echo form_dropdown('availability', $aAvails, set_value('availability', $resume->availability)); 
            ?>
          </div>
          <div class="small-6 medium-6 large-6 columns">
            Expected Salary (USD) <input type="text" name="expected_salary" value="<?php echo set_value('expected_salary', $resume->expected_salary); ?>" disabled />
          </div>
        </div>
        <div class="row">
          <div class="small-6 medium-6 large-6 columns">
            Current Position Title 
            <?php echo form_dropdown('current_position_title', getJobTitles(), set_value('current_position_title', $resume->current_position_title)); ?>
          </div>
          <div class="small-6 medium-6 large-6 columns">
            Qualification <input type="text" name="qualification" value="<?php echo set_value('qualification', $resume->qualification); ?>" />
          </div>
        </div>
        <div class="row">
          <div class="small-12 medium-12 large-12 columns">
            Summary <textarea name="summary"><?php echo set_value('summary', $resume->summary); ?></textarea>
          </div>
        </div>
        <div class="row">
          <div class="small-12 medium-12 large-12 columns"><button class="button radius small">Update</button></div>
        </div>      
      </form>
    </section>
    <hr />
    <section class="workHistories">
      <div class="row">
        <div class="small-11 medium-3 large-6 columns"><h5>Work History</h5></div>
        <div class="small-1 medium-3 large-6 columns"><i class="fa fa-angle-left right"></i></div>
      </div>
      <?php echo form_open('workhistory/update'); ?>
        <div class="row">
          <div class="small-12 medium-12 large-12 columns"><a href="#" class="button small radius addWorkHistory right">Add work history</a></div>
        </div>
        <input type="hidden" name="resume_id" value="<?php echo set_value('resume_id', $resume->resume_id); ?>" />
        <ul>
          <?php foreach($workHistories as $w){ ?>
            <li>
              <?php echo $this->load->view('resumes/work_histories/update', array('workHistory' => $w), true); ?>
              <a href="#" class="close">&times;</a>
            </li>
          <?php } ?>
        </ul>
        <div class="row">
          <div class="small-12 medium-12 large-12 columns"><button class="radius tiny">Update</button></div>
        </div>
      </form>
    </section>
    <hr />
    <section class="educations">
      <div class="row">
        <div class="small-11 medium-3 large-6 columns"><h5>Education</h5></div>
        <div class="small-1 medium-3 large-6 columns"><i class="fa fa-angle-left right"></i></div>
      </div>
      <?php echo form_open('education/update'); ?>
        <div class="row">
          <div class="small-12 medium-12 large-12 columns"><a href="#" class="button small radius addEducation right">Add education</a></div>
        </div>
        <input type="hidden" name="resume_id" value="<?php echo set_value('resume_id', $resume->resume_id); ?>" />
        <ul>
          <?php foreach($educations as $e){ ?>
            <li>
              <?php echo $this->load->view('resumes/educations/update', array('education' => $e), true); ?>
              <a href="#" class="close">&times;</a>
            </li>
          <?php } ?>
        </ul>
        <div class="row">
          <div class="small-12 medium-12 large-12 columns"><button class="radius tiny">Update</button></div>
        </div>
      </form>
    </section>
    <hr />
    <section class="skills">
      <div class="row">
        <div class="small-11 medium-3 large-6 columns"><h5>Skills</h5></div>
        <div class="small-1 medium-3 large-6 columns"><i class="fa fa-angle-left right"></i></div>
      </div>
      <?php echo form_open('skill/update'); ?>
        <div class="row">
          <div class="small-12 medium-12 large-12 columns"><a href="#" class="button small radius addSkills right">Add skills</a></div>
        </div>
        <input type="hidden" name="resume_id" value="<?php echo set_value('resume_id', $resume->resume_id); ?>" />
        <ul>
          <?php foreach($skills as $s){ ?>
            <li>
              <input type="text" name="name[]" value="<?php echo $s->name; ?>" />
              <a href="#" class="close">&times;</a>
            </li>
          <?php } ?>
        </ul>
        <div class="row">
          <div class="small-12 medium-12 large-12 columns"><button class="radius tiny">Update</button></div>
        </div>
      </form>
    </section>
    <hr />
    <section class="certifications">
      <div class="row">
        <div class="small-11 medium-3 large-6 columns"><h5>Certifications</h5></div>
        <div class="small-1 medium-3 large-1 columns"><i class="fa fa-angle-left right"></i></div>
      </div>
      <?php echo form_open('certification/update'); ?>
        <div class="row">
          <div class="small-12 medium-12 large-12 columns"><a href="#" class="button small radius addCertification right">Add certification</a></div>
        </div>
        <input type="hidden" name="resume_id" value="<?php echo set_value('resume_id', $resume->resume_id); ?>" />
        <ul>
          <?php foreach($certifications as $c){ ?>
            <li>
              <input type="text" name="name[]" value="<?php echo $c->name; ?>" />
              <a href="#" class="close">&times;</a>
            </li>
          <?php } ?>
        </ul>
        <div class="row">
          <div class="small-12 medium-12 large-12 columns"><button class="radius tiny">Update</button></div>
        </div>
      </form>
    </section>
    <hr />
    <section class="additionalInformations">
      <div class="row">
        <div class="small-11 medium-10 large-10 columns"><h5>Additional Information</h5></div>
        <div class="small-1 medium-2 large-2 columns"><i class="fa fa-angle-left right"></i></div>
      </div>
      <?php 
        echo $this->load->view
        (
          'resumes/additional_informations/update', 
          array
          (
            'resume' => $resume, 
            'additional_information' => $resume->additional_information
          ), 
          true
        );
      ?>
    </section>
  </section>
</div>