 <div class="nav">
    <ul>
      <li <?PHP if(isset($master_body)and($master_body=='home')) echo 'class="active"';?> ><a href="<?php echo site_url('home');?>">Job Search</a></li>
      <li><a href="#">$150k+ Jobs</a></li>
      <li><a href="<?php echo site_url('advertiser');?>">Profile</a></li>
      <li><a href="#">My Activity</a></li>
      <li><a href="#">Advice &amp; Tips</a></li>
      <li <?PHP if(isset($master_body)and($master_body=='advertiser')) echo 'class="active"';?> ><a href="<?php echo site_url('advertiser');?>">Employers</a></li>
    </ul>
  </div>