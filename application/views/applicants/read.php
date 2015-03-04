<div id="applicant" class="read row">
      
    <div class="row">
      <div class="large-12 columns">
        <h4>Applicant</h4>
      </div>
    </div>

      <?php echo $this->load->view('commons/partials/users/read', array('user' => $user), true); ?>
      
      
      <div class="row panel">
        <div class="large-6 columns">
          <strong>Current Position Title:</strong> 
          <?php echo $applicant->current_position_title; ?>
        </div>
      </div>
      <div class="row panel">
        <div class="large-6 columns">
          <strong>Expected Salary:</strong> 
          $<?php echo $applicant->expected_salary; ?>      
        </div>
        <div class="large-6 columns">
          <strong>Preferred Country:</strong>
          <?php echo $applicant->preferred_country; ?>      
        </div>
      </div>
                
      
      <?php 
        if(getLoggedUser()){ 
          if(getRoleName() == 'Employer'){
      ?>
      <!--div class="row">
        <div class="small-12 medium-12 large-12 columns">
          <h5>Send Message</h5>
        </div>
      </div>
      
      <div class="row">
        <?php echo form_open('applicant/sendMessage'); ?>
          <div class="large-12 columns">
            <div><input type="text" name="title" placeholder="Title*" /></div>
            <div><textarea name="message" placeholder="Message*"></textarea></div>
            <div><a href="#" class="button tiny btnSendMsg">Send</a></div>
          </div>
        </form>
      </div-->
      <?php 
        }///if getRoleName(). 
      } ///if getLoggedUser(). 
    ?>

    

      <div class="row comments">
      <?php 
        if(isset($comments) && count($comments) > 0)
        {
      ?>
        <div class="row">
          <div class="small-12 medium-12 large-12 columns">
            <h5>Comments</h5>
          </div>
        </div>
      <?php
          foreach($comments as $c)
          {
            //Prevent showing of unapproved comments to
            //unregistered users.
            if($c->approved < 1 && !isLoggedIn()) continue;
            //
            echo $this->load->view
            (
              'commons/partials/comments/listing', 
              array('comment' => $c), 
              true
            );
          }
        }
      ?>
      </div>

    <?php if(isLoggedIn()){ ?>
    <div class="row create">
      <?php echo form_open('comment/createForProfile'); ?>
        <div class="large-12 columns">
            <input type="hidden" 
                  name="applicant_id" 
                  value="<?php echo $applicant->id; ?>" />
            <div>
              <textarea name="comment" 
                    placeholder="Write a comment..."></textarea>
            </div>
            <div>
              <button class="tiny">
                Post Comment
              </button>
            </div>
        </div>
      </form>
    </div>
    <?php } ?>
</div>