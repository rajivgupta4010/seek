<?php 
    $sidebar = getPricing();
    
    //print_r($sidebar);
     ?>

<div class="page-sidebar-wrapper">
  <div class="page-sidebar navbar-collapse collapse"> 
    <!-- BEGIN SIDEBAR MENU -->
    <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
      <li class="sidebar-toggler-wrapper"> 
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <div class="sidebar-toggler hidden-phone"> </div>
        <!-- BEGIN SIDEBAR TOGGLER BUTTON --> 
      </li>
      <li  <?php if (isset($main_nav)and ( $main_nav == 'dashboard')) echo " class='active'"; ?>> <a href="<?php echo site_url('dashboard'); ?>"> <i class="fa fa-home"></i> <span class="title"> Dashboard </span> </a> </li>
      <li <?php if (isset($main_nav)and ( $main_nav == 'jobs')) echo " class='active'"; ?>> <a href="javascript:;"> <i class="fa fa-folder-open"></i> <span class="title"> Jobs </span> <span class="arrow "> </span> </a>
        <ul class="sub-menu">
          <li  <?php if (isset($nav)and ( $nav == 'classifications')) echo " class='active'"; ?>> <a href="<?php echo site_url('classifications'); ?>"> <i class="fa fa-folder-open"></i> Classifications <span class="arrow"> </span> </a> </li>
          <li  <?php if (isset($nav)and ( $nav == 'locations')) echo " class='active'"; ?>> <a href="<?php echo site_url('locations'); ?>"> <i class="fa fa-map-marker"></i> Locations <span class="arrow"> </span> </a>
            <ul class="sub-menu">
              <li <?php if (isset($sub_nav)and ( $sub_nav == 'province')) echo " class='active'"; ?>> <a href="<?php echo site_url('province'); ?>"> <i class="fa fa-user"></i> Province <span class="arrow"> </span> </a> </li>
              <li <?php if (isset($sub_nav)and ( $sub_nav == 'locations')) echo " class='active'"; ?>> <a href="<?php echo site_url('locations'); ?>"> <i class="fa fa-user"></i> Locations <span class="arrow"> </span> </a> </li>
              <li <?php if (isset($sub_nav)and ( $sub_nav == 'sublocations')) echo " class='active'"; ?>> <a href="<?php echo site_url('sublocations'); ?>"> <i class="fa fa-user"></i> Sub Locations <span class="arrow"> </span> </a> </li>
            </ul>
          </li>
          <li  <?php if (isset($nav)and ( $nav == 'worktypes')) echo " class='active'"; ?>> <a href="<?php echo site_url('worktypes'); ?>"> <i class="fa fa-sitemap"></i> Work Types <span class="arrow"> </span> </a> </li>
          <li  <?php if (isset($nav)and ( $nav == 'employertypes')) echo " class='active'"; ?>> <a href="<?php echo site_url('employertypes'); ?>"> <i class="fa fa-group"></i> Employer Type <span class="arrow"> </span> </a> </li>
          <li <?php if (isset($nav)and ( $nav == 'salaryrange')) echo " class='active'"; ?>> <a href="javascript:;"> <i class="fa fa-cogs"></i> Salary Range <span class="arrow"> </span> </a>
            <ul class="sub-menu">
              <li <?php if (isset($sub_nav)and ( $sub_nav == 'annually')) echo " class='active'"; ?>> <a href="<?php echo site_url('salaryrange'); ?>"> <i class="fa fa-user"></i> Annual Rates <span class="arrow"> </span> </a> </li>
              <li <?php if (isset($sub_nav)and ( $sub_nav == 'hourly')) echo " class='active'"; ?>> <a href="<?php echo site_url('salaryrange/hourly'); ?>"> <i class="fa fa-user"></i> Hourly Rates <span class="arrow"> </span> </a> </li>
            </ul>
          </li><li <?php if (isset($nav)and ( $nav == 'salaryrange')) echo " class='active'"; ?>> <a href="javascript:;"> <i class="fa fa-cogs"></i> Jobs<span class="arrow"> </span> </a>
            <ul class="sub-menu">
              <li <?php if (isset($sub_nav)and ( $sub_nav == 'annually')) echo " class='active'"; ?>> <a href="<?php echo site_url('jobs/latestjobs'); ?>"> <i class="fa fa-tag"></i> Latest Jobs <span class="arrow"> </span> </a> </li>
              <li <?php if (isset($sub_nav)and ( $sub_nav == 'hourly')) echo " class='active'"; ?>> <a href="<?php echo site_url('jobs/pendingjobs'); ?>"> <i class="fa fa-tag"></i> Pending Jobs <span class="arrow"> </span> </a> </li><li <?php if (isset($sub_nav)and ( $sub_nav == 'hourly')) echo " class='active'"; ?>> <a href="<?php echo site_url('jobs/approvedjobs'); ?>"> <i class="fa fa-tag"></i> Approved Jobs <span class="arrow"> </span> </a> </li>
            </ul>
          </li>
          <li <?php if (isset($nav)and ( $nav == 'pricing')) echo " class='active'"; ?>> <a href="javascript:;"> <i class="fa fa-bar-chart-o"></i> Pricing <span class="arrow"> </span> </a>
            <ul class="sub-menu">
              <?php foreach($sidebar as $side):?>
              <li <?php if (($this->uri->segment(3) == $side->id)) echo "class='active'"; ?>> <a href="<?php echo site_url('pricing/index/'.$side->id); ?>"> <i class="fa  fa-usd"></i> <?php echo $side->name;?> <span class="arrow"> </span> </a> </li>
              <?php endforeach;?>
            </ul>
          </li>
          <li  <?php if (isset($nav)and ($nav == 'cms_pages')) echo " class='active'"; ?>> <a href="<?php echo site_url('cms_pages'); ?>"> <i class="fa fa-font"></i> CMS Pages <span class="arrow"> </span> </a> </li>
        </ul>
      </li>
      <li <?php if (isset($main_nav)and ( $main_nav == 'users')) echo " class='active'"; ?>> <a href="javascript:;"> <i class="fa fa-folder-open"></i> <span class="title"> Users </span> <span class="arrow "> </span> </a>
        <ul class="sub-menu">
          <li  <?php if (isset($nav)and ( $nav == 'jobseekers')) echo " class='active'"; ?>> <a href="<?php echo site_url('users/jobseekers'); ?>"> <i class="fa fa-user"></i> Job Seekers <span class="arrow"> </span> </a> </li>
          <li  <?php if (isset($nav)and ( $nav == 'employers')) echo " class='active'"; ?>> <a href="<?php echo site_url('users/employers'); ?>"> <i class="fa fa-user"></i> Employers <span class="arrow"> </span> </a> </li>
          <li  <?php if (isset($nav)and ( $nav == 'administrator')) echo " class='active'"; ?>> <a href="<?php echo site_url('users/administrator'); ?>"> <i class="fa fa-user"></i> Administrator <span class="arrow"> </span> </a> </li>
        </ul>
      </li>
      <li <?php if (isset($main_nav)and ( $main_nav == 'email_templates')) echo " class='active'"; ?>> <a href="javascript:;"> <i class="fa fa-folder-open"></i> <span class="title"> Email Templates </span> <span class="arrow "> </span> </a>
        <ul class="sub-menu">
          <li  <?php if (isset($nav)and ( $nav == 'jobseekers')) echo " class='active'"; ?>> <a href="<?php echo site_url('email_templates/registration'); ?>"> <i class="fa fa-user"></i> New Registration <span class="arrow"> </span> </a> </li>
          <li  <?php if (isset($nav)and ( $nav == 'jobseekers')) echo " class='active'"; ?>> <a href="<?php echo site_url('email_templates/email/3'); ?>"> <i class="fa fa-user"></i>Forgot password <span class="arrow"> </span> </a> </li>
        </ul>
      </li>
      <li <?php if (isset($main_nav)and ( $main_nav == 'configurations')) echo " class='active'"; ?>> <a href="javascript:;"> <i class="fa fa-folder-open"></i> <span class="title"> Configuration Settings </span> <span class="arrow "> </span> </a>
        <ul class="sub-menu">
          <li  <?php if (isset($nav)and ( $nav == 'paypal')) echo " class='active'"; ?>> <a href="<?php echo site_url('configurations/paypal'); ?>"> <i class="fa fa-user"></i> Paypal <span class="arrow"> </span> </a> </li>
        </ul>
      </li>
    </ul>
    <!-- END SIDEBAR MENU --> 
  </div>
</div>
