<header>
		<span class="logo">
			<a href="<?php echo site_url('main'); ?>">
        <img src="<?php echo base_url('public/img/logo_jobformity.png'); ?>" />
      </a>
      <div class="slogan">
        Enhance your career.
      </div>
		</span>

		<div id="menu_icon"></div>

		<nav>
			<ul>
        <!--li><?php echo $this->load->view('commons/partials/search', null, true); ?></li-->
        <li><a href="<?php echo site_url('main'); ?>">Home</a></li>
        <li><a href="<?php echo site_url('position'); ?>">Browse Positions</a></li>
        <?php 
          if(isLoggedIn())
          {
            $usr = getLoggedUser();
            $roleName = getRoleById($usr->role_id)->row()->name;
            switch($roleName)
            {
              case 'Applicant':
                //echo '<li><a href="' . site_url('internship/alert') . '">Alerts</a></li>';
                echo '<li><a href="' . site_url('positionapplication') . '">My Applications</a></li>';
                echo '<li><a href="' . site_url('resume') . '">My Resumes</a></li>';
                echo '<li><a href="' . site_url('comment') . '">Comments</a></li>';
              break;
              case 'Employer':
                echo '<li><a href="' . site_url('position/readMyPosts') . '">My Posted Positions</a></li>';
                echo '<li><a href="' . site_url('companymember') . '">Company Members</a></li>';
                echo '<li><a href="' . site_url('comment') . '">Comments</a></li>';
                echo '<li><a href="' . site_url('billing') . '">Billing</a></li>';
                echo '<li><a href="' . site_url('analytics') . '">Analytics</a></li>';
              break;
              case 'Faculty':
                echo '<li><a href="' . site_url('facultymember') . '">Faculty Members</a></li>';
                echo '<li><a href="' . site_url('comment') . '">Comments</a></li>';
                echo '<li><a href="' . site_url('billing') . '">Billing</a></li>';
                echo '<li><a href="' . site_url('analytics') . '">Analytics</a></li>';
              break;
            }
          }
          else
          {
            //echo '<li><a href="' . site_url('internship/bookmarks') . '">Bookmarks</a></li>';
            echo '<li><a href="' . site_url('auth/login') . '">Login</a></li>';
          }
        ?>
       
        <?php 
          if(isLoggedIn())
          {
            $u = getLoggedUser();
            echo '<li><a href="' . site_url('user/update/' . $u->id) . '">Profile</a></li>';
            echo '<li><a href="' . site_url('auth/logout') . '">Logout (' . $u->full_name . ')</a></li>'; 
          }
          ?>
			</ul>
		</nav><!-- end navigation menu -->

		<footer class="footer clearfix">
			<div class="rights">
				<p>Copyright &copy; 2015 <br />
          <a href="http://www.simplifie.net" target="_blank">Simplifie</a>
          <a href="<?php echo site_url(); ?>">JobFormity</a>.</p>
			</div><!-- end rights -->
		</footer><!-- end footer -->
	</header><!-- end header -->