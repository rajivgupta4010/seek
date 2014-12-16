<div class="container">
  <div class="registration">
    <div class="registration_area">
      <div class="left_logo"><img src="<?PHP echo base_url()."assets/images/"?>logo.png"></div>
      <div class="right_form">
        <h4>Activate your account below</h4>
        <div class="clearfix"></div>
        <span><strong>Hi <?php echo $firstname. " " . $lastname;?></strong></span>
        <div class="clearfix"></div>
        <p style="margin:0px;">Please provide and confirm a password to start using your account
        <p>
        <div class="clearfix"></div>
        <p style="margin:0px;">Your new username is:
        <p>
        <div class="clearfix"></div>
        <span><strong><?php echo $email;?></strong></span>
        <div class="clearfix"></div>
        <?PHP if(isset($sucess)) echo $sucess;?>

        <form id="register" method="post" action="" role="form" class="width50">
          <div class="form-group">
            <label class="lbls" for="exampleInputPassword1">Password</label>
            <input  type="password" name="password" placeholder="Password" minlength="7" id="exampleInputPassword1" class="form-control required">
          </div>
          <?php echo validation_errors('<div class="error">', '</div>'); ?>
          <div class="form-group">
            <label class="lbls" for="exampleInputPassword2">Confirm password</label>
            <input type="password" name="confirmpassword" minlength="7" placeholder="Password" id="exampleInputPassword2" class="form-control required">
            <input type="hidden" name="tokenid" value="<?php echo $userid;?>"  />
          </div>
          <div class="checkbox">
            <label class="lbls">
              <input type="checkbox" name="aggrement" class="required">
              I agree to the <a href="">terms &amp; conditions</a> </label>
          </div>
          <div class="m_spc"></div>
          	
          <input type="submit" class="btn btn-warning" value="Continue" />
        </form>
      </div>
    </div>
  </div>
</div>
