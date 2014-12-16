<div id="main_div">
  <div class="dark_ad_area">
    <div class="dark_area_left">
      <div class="left_detail">
        <h2>South Africa's No.1 Job Site</h2>
        <div class="left_text">
          <div class="text-highlight">When South Africans think jobs, they think </div>
          <div>Place an ad with  and get your job in front of far more South African jobers than any other site.</div>
        </div>
        <div>Sign up today and post an ad that works.</div>
        <div class="left_button_area">
          <div class="float_left">
            <a href="<?php echo site_url('advertiser/register')?>" class="btn btn-warning"> Advertisers - register here </a>
          </div>
          <div class="mobile_ad">
            <div class="float_left"><i class="i_23_36 i_mobile-device"></i></div>
            <div class="float_left ad_text">Mobile ads included</div>
          </div>
        </div>
      </div>
      <div class="circle">
        <p>Post an ad
          for 30 days
          from just
          $280.50 inc GST
          Learn more</p>
      </div>
    </div>
    <div class="dark_area_right">
      <div class="sign_in">
        <h3>Employer sign in</h3>
<?php echo validation_errors(); ?>
<?php if(isset($errorpass)) echo "<p> Incorrect username or password </p>"; ?>
        <form method="post" action="" role="form">
          <div class="form-group">
            <label for="exampleInputEmail1">Username / Email</label>
            <input type="email" name="username" id="exampleInputEmail1" class="form-control">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" id="exampleInputPassword1" class="form-control">
          </div>
          <div class="checkbox">
            <label>
            <input type="checkbox">
            Stay signed in </label>
          </div>
          <input class="btn btn-default btn_sign" type="submit" name="sign_in" value="Sign in">
          <small>
          <div class="trubl"> <a href="<?php echo site_url('advertiser/forgot_password'); ?>">Trouble signing in?</a> </div>
          <div class="trubl">Don't have an account?&nbsp;<a href="<?PHP echo site_url('advertiser/register');?>">Register here</a> </div>
          </small>
        </form>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="panel">
    <div class="panel_area">
      <div class="col-md-4 pdng_none">
        <div class="media"> <a href="#" class="pull-left"> <img alt="64x64" data-src="holder.js/64x64" class="media-object" style="width: 90px; height: 70px;" src="<?PHP echo base_url();?>assets/images/icon3.jpg"> </a>
          <div class="media-body">
            <h4 class="media-heading">Products and pricing</h4>
            <p>Find out about ad types, jober profiles and other  services</p>
            <p><a href="#">Learn about  products</a></p>
          </div>
        </div>
      </div>
      <div class="col-md-4 pdng_none">
        <div class="media"> <a href="#" class="pull-left"> <img alt="64x64" data-src="holder.js/64x64" class="media-object" style="width: 90px; height: 70px;" src="<?PHP echo base_url();?>assets/images/icon3.jpg"> </a>
          <div class="media-body">
            <h4 class="media-heading">Customer service</h4>
            <p>Need help getting started?<br>
 Give us a call on <strong>1300 658 700</strong></p>
            <p><a href="#">Contact us online</a></p>
          </div>
        </div>
      </div>
      <div class="col-md-4 pdng_none">
        <div class="media"> <a href="#" class="pull-left"> <img alt="64x64" data-src="holder.js/64x64" class="media-object" style="width: 90px; height: 70px;" src="<?PHP echo base_url();?>assets/images/icon3.jpg"> </a>
          <div class="media-body">
            <h4 class="media-heading">Corporate training</h4>
            <p>Upskill your staff with flexible online courses from leading educators</p>
            <p><a href="#">See corporate training courses</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>