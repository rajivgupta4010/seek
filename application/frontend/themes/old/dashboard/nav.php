<div class="nav">
      <ul>
      <li <?php if(isset($navigation)and $navigation=='welcome') echo 'class="active"'; ?> ><a href="<?php echo site_url('welcome')?>">Home</a></li>
      <li <?php if(isset($navigation)and $navigation=='jobs') echo 'class="active"'; ?> ><a href="<?php echo site_url('job');?>">Jobs</a></li>
      <li <?php if(isset($navigation)and $navigation=='candidates') echo 'class="active"'; ?> ><a href="">Candidates</a></li>
      <li <?php if(isset($navigation)and $navigation=='account') echo 'class="active"'; ?> ><a href="<?php echo site_url('account');?>">Account</a></li>
      <li  <?php if(isset($navigation)and $navigation=='tools') echo 'class="active"'; ?>><a href="<?php echo site_url('tools');?>">Tools</a></li>
      <li  <?php if(isset($navigation)and $navigation=='help') echo 'class="active"'; ?>><a href="">Help</a></li>
      <li style="padding:0px;"><a href="<?php echo base_url();?>"><button class="btn btn-warning" type="button">CareerView.com<span class="glyphicon glyphicon-chevron-right"></span></button></a></li>
    </ul>
  </div>