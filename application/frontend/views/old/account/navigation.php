<ul class="nav nav-tabs jobs_tabs" id="jobs-tab" role="tablist">
      <li <?php if(isset($sub_navigation)and $sub_navigation=='manage_user') echo 'class="active"';?>  ><a href="<?php echo site_url('account');?>">Users</a></li>
      <li <?php if(isset($sub_navigation)and $sub_navigation=='details') echo 'class="active"';?> ><a href="<?php echo site_url('account/Details');?>">Account details</a></li>     
    </ul>