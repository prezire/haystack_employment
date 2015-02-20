<header>
		<span class="logo">
			<a href="<?php echo site_url('main'); ?>">
        <img src="<?php echo base_url('public/img/logo.png'); ?>" />
      </a>
      <div class="slogan">
        Gain work experience through Internship.
      </div>
		</span>

		<div id="menu_icon"></div>

		<nav>
			<ul>
        <li><a href="<?php echo site_url('main'); ?>">Home</a></li>
        <?php 
          if(isLoggedIn())
          {
            $usr = getLoggedUser();
            $roleName = getRoleById($usr->role_id)->row()->name;
            switch($roleName)
            {
              case 'Applicant':
                //echo '<li><a href="' . site_url('internship/bookmarks') . '">Bookmarks</a></li>';
                //echo '<li><a href="' . site_url('internship/alert') . '">Alerts</a></li>';
                echo '<li><a href="' . site_url('internshipapplication') . '">Applications</a></li>';
              break;
              case 'Employer':
                echo '<li><a href="' . site_url('internship/readMyPosts') . '">Internships</a></li>';
                echo '<li><a href="' . site_url('pooledapplicant') . '">Pools</a></li>';
                echo '<li><a href="' . site_url('member') . '">Members</a></li>';
                echo '<li><a href="' . site_url('analytics') . '">Analytics</a></li>';
                echo '<li><a href="' . site_url('comment') . '">Comments</a></li>';
                echo '<li><a href="' . site_url('internshipapplication') . '">Applications</a></li>';
              break;
              case 'Subscriber':
                echo '<li><a href="' . site_url('comment') . '">Comments</a></li>';
              break;
            }
          }
          else
          {
            echo '<li><a href="' . site_url('auth/login') . '">Login</a></li>';
          }
        ?>
        <li><a href="<?php echo site_url('main/about'); ?>">About</a></li>
				<li><a href="<?php echo site_url('main/faq'); ?>">FAQ</a></li>
				<!--li><a href="<?php echo site_url('blog'); ?>">Blogs</a></li-->
        <?php 
          if(isLoggedIn())
          {
            echo '<li><a href="' . site_url('user/update/' . getLoggedUser()->id) . '">Profile</a></li>';
            echo '<li><a href="' . site_url('auth/logout') . '">Logout</a></li>'; 
          }
          ?>
			</ul>
		</nav><!-- end navigation menu -->

		<div class="footer clearfix">
			<div class="rights">
				<p>Copyright &copy; 2015 Simplifie Haystack.</p>
			</div><!-- end rights -->
		</div ><!-- end footer -->
	</header><!-- end header -->