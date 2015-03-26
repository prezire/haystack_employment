<div id="home" class="index">
  
  <div class="row intro">
    <div class="small-12 medium-12 large-12 columns">
      <div class="large">JobFormity</div>
      <span>
      JobFormity is a platform bringing students, job seekers, 
      employers and education institutions together in <u>one centralized location</u>. 
      Our system specializes in <u>helping students and professionals</u> find the right 
      positions for their career as well as provide insightful data for 
      employers, applicants and schools.

      <br /><br />

      Select different categories such as internships. Internships are the most 
      effective way for students to gain work experience before graduation. It's 
      also another way to gain more experience for professionals who are changing 
      career paths. Luckily, starting your positions search is easy. Simply tell 
      us your college major and preferred location and you can connect with 
      companies that are hiring now.

      <br /><br />
      </span>
    </div>
  </div>

  <?php if(!isLoggedIn()){ ?>
    <div class="panel quickRegister right">
      <h5>Register</h5>
      <a href="<?php echo site_url('applicant/create'); ?>" class="button tiny">Applicant</a>
      <a href="<?php echo site_url('employer/create'); ?>" class="button tiny">Employer</a>
      <a href="<?php echo site_url('faculty/create'); ?>" class="button tiny">Faculty</a>
    </div>
  <?php } ?>

  
  <div class="row expandable">
    <div class="large-12 columns">
      <dl class="tabs" data-tab>
        <dd class="active">
          <a href="#applicantsSummary">
            For Employers
            <img src="<?php echo base_url('public/img/tab_arrow_down.png'); ?>" />
          </a>
        </dd>
        <dd>
          <a href="#positionsSummary">
            For Applicants
            <img src="<?php echo base_url('public/img/tab_arrow_down.png'); ?>" />
          </a>
        </dd>
      </dl>
      <div class="tabs-content">
        <?php 
            $applsSummary = $groupedSummary['applicants'];
            $posSummary = $groupedSummary['positions'];
        ?>
        <div class="content active" id="applicantsSummary">
          <h5>Applicant Position Titles</h5>
          <!--a href="<?php echo site_url('applicant'); ?>" class="button tiny">
            Show All Applicants
          </a-->
          <ul>
            <?php 
              foreach($applsSummary as $a){
                $jt = $a->current_position_title;
            ?>
            <li>
              <a href="<?php echo site_url('applicant/readByJobTitle/' . $jt); ?>">
                <?php echo $jt . ' (' . $a->count . ')'; ?>
              </a>
            </li>
            <?php
              }
            ?>
          </ul>
        </div>
        <div class="content" id="positionsSummary">
          <h5>Position Industries</h5>
          <a href="<?php echo site_url('position'); ?>" class="button tiny">
            Show All Positions
          </a>
          <ul>
            <?php 
              foreach($posSummary as $p){
                $ind = $p->industry;
            ?>
            <li>
              <?php $encodedUrl = str_replace('/', 'haystackescapedslash', $ind); ?>
              <a href="<?php echo site_url('position/readByIndustry/' . $encodedUrl); ?>">
                <?php echo $ind . ' (' . $p->count . ')'; ?>
              </a>
            </li>
            <?php 
              }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>

<div class="row features">
    <div class="small-12 medium-4 large-4 columns">
      <h5>Organizer</h5>
      <img src="<?php echo base_url('public/img/organizer.jpg'); ?>" />
      <hr />
      <div>
        From a single site, employers can manage vacancies, 
        track applied posts, comments, feedbacks and sent
        messages. Applicants can track, which positions you've
        applied, manage comments and easily search for opportunities.
      </div>
      <!--a href="#" class="button tiny">Read more</a-->
    </div>
    <div class="small-12 medium-4 large-4 columns">
      <h5>Analytics</h5>
      <img src="<?php echo base_url('public/img/analytics.jpg'); ?>" />
      <hr />
      <div>
        Employers need all the information when it comes to
        their posts' effectiveness. Filter by days according
        to applicant profiles, demographics and searched keywords.
      </div>
      <!--a href="#" class="button tiny">Read more</a-->
    </div>
    <div class="small-12 medium-4 large-4 columns">
      <h5>Multiple Resumes</h5>
      <img src="<?php echo base_url('public/img/resume.jpg'); ?>" />
      <hr />
      <div>
        At times, applicants need to apply multiple roles.
        It's imperitave to have multiple resumes with relavant
        skills to cater such roles without constantly changing 
        your resume.
      </div>
      <!--a href="#" class="button tiny">Read more</a-->
    </div>
  </div>

</div>



