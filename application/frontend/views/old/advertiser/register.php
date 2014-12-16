<div class="container">
  <div class="registration">
    <div class="registration_area">
      <div class="left_logo"><img src="<?PHP echo base_url()."assets/images/"?>logo.png"></div>
      <div class="right_form">
        <div class="form_heading">
          <h2>Register as an employer</h2>
          <p>Already registered? <a href="<?PHP echo site_url('advertiser');?>">Sign in</a></p>
        </div>
        <form role="form" id="register" action="" method="post">
          <?php echo validation_errors(); ?>
          <div class="form_section">
            <h3>Your details <span class="text-larger">- you will be the administrator and contact person for the account</span></h3>
            <div class="panel_1">
              <div class="form-group width200">
                <label for="FIRST_NAME">First name</label>
                <input name="fname" value="<?PHP echo set_value('fname')?>" type="text" placeholder="" id="FIRST_NAME" class="form-control required">
              </div>
              <div class="form-group width200">
                <label for="last_name">Last name</label>
                <input name="lname"  value="<?PHP echo set_value('lname')?>" type="text" placeholder="" id="last_name" class="form-control required">
              </div>
              <div class="form-group mail">
                <label for="exampleInputEmail1">Email</label>
                <input name="email"  value="<?PHP echo set_value('email')?>" type="text" placeholder="" id="exampleInputEmail1" class="form-control required email">
                <div class="text-lighter">Will be your username</div>
              </div>
              <div class="form-group mail">
                <label for="phone">Phone</label>
                <input name="phone"  value="<?PHP echo set_value('phone')?>" type="text" placeholder="" id="phone" class="form-control required">
              
              </div>
            </div>
            <div class="clearfix"></div>
            <h3>Company details</h3>
            <div class="panel_1">
              <div class="form-group mail">
                <label for="cname">Company name</label>
                <input name="cname"  value="<?PHP echo set_value('cname')?>" type="text" placeholder="" id="cname" class="form-control required">
              </div>
              <div class="form-group mail">
                <label for="saddress">Street address</label>
                <input name="address" type="text" value="<?PHP echo set_value('address')?>"  placeholder="" id="exampleInputEmail1" class="form-control required">
                <input name="saddress"  value="<?PHP echo set_value('saddress')?>" type="text" placeholder="(optional)" id="saddress" class="form-control margn10">
              </div>
              <div class="form-group mail">
                <label for="country">Country</label>
                <select name="country" class="form-control required" id="country" >
                  <?php foreach($countries as $item):?>
                  <option value="<?php echo $item->id;?>"><?php echo $item->country_name;?> </option>
                  <?php endforeach;?>
                </select>
              </div>
              <div class="form-group mail">
                <label for="town">Suburb / Town / City</label>
                <input  value="<?PHP echo set_value('city')?>" name="city" type="text" placeholder="" id="town" class="form-control required">
              </div>
              <div class="form-group width200">
                <label for="state">State</label>
                <input name="state" value="<?PHP echo set_value('state')?>" class="form-control required" id="state">
              </div>
              <div class="form-group width200">
                <label for="postcode">Postcode</label>
                <input name="postcode"  value="<?PHP echo set_value('postcode')?>" type="text" class="form-control required" id="postcode" placeholder="">
              </div>
            </div>
            <div class="clearfix"></div>
            <h3>About the company</h3>
            <div class="panel_1">
              <div class="form-group mail">
                <label for="industry">Industry</label>
                <select name="industry" class="form-control required" id="industry">
                  <option value="">Select an industry...</option>
                  <?php $indus = set_value('industry');?>
                  <?php foreach($classifications as $item):?>
                  <option <?PHP if ($item->id ==$indus) echo 'selected="selected"'; ?>  value="<?php echo $item->id;?>"><?php echo $item->name;?> </option>
                  <?php endforeach;?>
                </select>
              </div>
              <div class="form-group mail">
                <label for="employer ">Employer Type</label>
                <select name="type"  class="form-control required" id="employer">
                <?php $type = set_value('type');?>
                  <option value="">Select type...</option>
                  <option <?PHP if (1==$type) echo 'selected="selected"'; ?>  value="1">Recruitment Agency</option>
                  <option <?PHP if (2==$type) echo 'selected="selected"'; ?> value="2">Direct Employer</option>
                  <option <?PHP if (3==$type) echo 'selected="selected"'; ?> value="3">Government</option>
                </select>
              </div>
              <div class="form-group mail">
                <label for="employee_count ">Number of employees</label>
                <select name="employee_count" id="employee_count"  class="form-control required">
                <?php $employee_count = set_value('employee_count');?>
                  <option value="">Select number...</option>
                  
      
                  <option <?PHP if (1==$employee_count) echo 'selected="selected"'; ?> value="1">1-4</option>
                  <option <?PHP if (2==$employee_count) echo 'selected="selected"'; ?> value="2">5-10</option>
                  <option <?PHP if (3==$employee_count) echo 'selected="selected"'; ?> value="3">11-25</option>
                  <option <?PHP if (4==$employee_count) echo 'selected="selected"'; ?>  value="4">26-50</option>
                  <option <?PHP if (5==$employee_count) echo 'selected="selected"'; ?>  value="5">51-100</option>
                  <option <?PHP if (6==$employee_count) echo 'selected="selected"'; ?>  value="6">101-200</option>
                  <option <?PHP if (7==$employee_count) echo 'selected="selected"'; ?>  value="7">201-500</option>
                  <option <?PHP if (8==$employee_count) echo 'selected="selected"'; ?>  value="8">501-1000</option>
                  <option <?PHP if (9==$employee_count) echo 'selected="selected"'; ?>  value="9">1001+</option>
                </select>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="space"></div>
            <div class="panel_1">
              <div class="form-group mail">
                <label for="promotional_code">Promotional code</label>
                <input name="promotional_code"  value="<?PHP echo set_value('promotional_code')?>" type="text" class="form-control margn10 " id="promotional_code" placeholder="(optional)">
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="checkbox">
              <label>
                <input  name="subscribe" type="checkbox" value="">
                Subscribe to news about products & services. </label>
            </div>
            <div class="clearfix"></div>
            <div class="checkbox">
              <label class="conditions">
                <input name="terms" type="checkbox" value="1" id="conditions" class="required">
                I understand and accept <a href="#"> Terms & Conditions </a> </label>
            </div>
            <input type="submit" value="Continue" class="btn btn-warning" style="margin:0px;">
            <P>We are against spam. View <a href="#">Privacy Policy.</a></P>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>