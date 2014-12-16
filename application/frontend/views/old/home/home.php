
<div class="search_area">
    <div class="searchbox1">
      <form role="form">
        <div class="form-group">
          <label for="exampleInputEmail1">Keywords</label>
          <input type="email" placeholder="Enter keyword(s)" id="exampleInputEmail1" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Salary</label>
          <div class="clearfix"></div>
          <div class="col-md-12 pdng_none annually">
            <div class="col-md-5 pdng_none">
              <select class="form-control salarystart" id="option_from">
                
            <?php
            $i = 0;
            foreach ($salary_range as $item):
               
                    ?>
            <option rel="<?php echo $item->id; ?>" value="<?php echo $item->value; ?>"><?php echo $item->name;?></option>
                    <?PHP
                
            endforeach;
            
            ?>
                
              </select>
            </div>
            <p>to</p>
            <div class="col-md-5 pdng_none">
              <select class="form-control salalryend" id="option_to">
               
              </select>
            </div>
          </div>
           <div class="col-md-12 pdng_none hourly" style="display:none;">
            <div class="col-md-5 pdng_none">
              <select class="form-control salarystart" id="option_from">
                
            <?php
            $i = 0;
            foreach ($salary_range_hourly as $item):
               
                    ?>
            <option rel="<?php echo $item->id; ?>" value="<?php echo $item->value; ?>"><?php echo $item->name;?></option>
                    <?PHP

                
            endforeach;
            
            ?>
                
              </select>
            </div>
            <p>to</p>
            <div class="col-md-5 pdng_none">
              <select class="form-control salalryend_hourly" id="option_to">
               
              </select>
            </div>
          </div>
        </div>

        <div class="form-group default-hide">
          <label for="exampleInputEmail1">Work Type</label>
          <div class="clearfix"></div>
          <div class="col-md-12 pdng_none">
            <div class="col-md-12 pdng_none">
              <select class="form-control can-expanded" id="option_from">
               <?PHP

            foreach ($worktype as $item):
               
                    ?>
            <option value="<?php echo $item->id; ?>"><?php echo $item->name;?></option>
                    <?PHP
                
            endforeach;
            
            ?>
              </select>
            </div>
            
            
          </div>
        </div>
        <div class="form-group default-hide">
        <label for="exampleInputEmail1">Show results from</label>
          <div class="clearfix"></div>
          <div class="col-md-12 pdng_none">
            <div class="col-md-12 pdng_none">
              <select class="form-control " id="option_from">
                <option value="00">$0</option>
                <option value="10">$10</option>
                <option value="20">$30</option>
                <option value="30">$50</option>
                <option value="40">$80</option>
              </select>
            </div>
            
            
          </div>
        </div>
      </form>
    </div>
    <div class="searchbox1">
      <form role="form">
        <div class="form-group">
          <label for="exampleInputEmail1">Classification </label>
          <select  class="form-control classifications can-expanded" >
              <option value="default" selected="selected">Any Classification</option>
            <?php
            $i = 0;
            foreach ($classifications as $item):
               
                    ?>
            <option value="<?php echo $item->id; ?>"><?php echo $item->name;?></option>
                    <?PHP
                
            endforeach;
            
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Sub-Classification </label>
          <div class="clearfix"></div>
          <div class="col-md-12 pdng_none">
            <select class="form-control can-expanded Sub-Classification">
                <option>Any Sub-Classification</option>
            <?php
            $i = 0;
            foreach ($sub_classifications as $item):
               
                    ?>
            <option value="<?php echo $item->id; ?>"><?php echo $item->name;?></option>
                    <?PHP
                
            endforeach;
            
            ?>
            </select>
          </div>
        </div>
      </form>
    </div>
    <div class="searchbox1">
      <form role="form">
        <div class="form-group">
          <label for="exampleInputEmail1">Location </label>
         
          
           <select  name="location[]" class="form-control can-expanded location">
            <option value="default">All Locations</option>
            <?PHP foreach($province as $item):?>
            <optgroup label="<?php echo $item->name; ?>" >
            	<?php  $loc = $this->location_model->getProvinceLocation($item->id); ?>
                <?php for($i=0;$i<count($loc);$i++):?>
                <option value="<?php echo $loc[$i]->id;?>"><?php echo $loc[$i]->name;?> </option>
                <?php endfor;?>
            </optgroup>
            <?PHP endforeach;?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1 ">Area</label>
          <div class="clearfix"></div>
          <div class="col-md-12 pdng_none">
            <select class="form-control can-expanded locationArea" >
              <option>Everywhere in SA</option>
            </select>
          </div>
        </div>
      </form>
    </div>
    <a id="more_options" class="more_button" href="#"> More options </a>
    <a id="few_options" class="more_button" href="#" style="display:none;"> Fewer options </a>
    <div class="search_btn">
      <input name="ss" type="button" value="Search">
    </div>
  </div>

<div class="clearfix"></div> 

<div class="content_area">
	<div class="content_block">
<h1>Hello again.</h1>
<h2>Come here often? Register for a faster, more personalised experience.</h2>

<a href="<?PHP echo site_url('register');?>" class="btn">Register now </a>
	</div>
	<div class="thumb1">
	<div class="heading1">
	<span class="glyphicon  glyphicon-heart"></span>
		<h2><a href="#"><span class="count">5</span>Favourite Searches</a></h2></div>
		
		<div class="fasn">
			<ul>
				<li>
					<div class="li_thumb">
						<span class="text_c">20</span>
						<span class="text_p">new</span>
					</div>
					
					<div class="mod-tile">
                            <h3>Fashion, All Melbourne</h3>
                            <p>Accounting</p>
                        </div>
				</li>
				
				
				<li>
					<div class="li_thumb">
						<span class="text_c">36</span>
						<span class="text_p">new</span>
					</div>
					
					<div class="mod-tile">
                            <h3>Temp Agency Work, Melbourne</h3>
                            <p>Any Classification</p>
                  </div>
				</li>
				
				
				<li>
					<div class="li_thumb">
						<span class="text_c">4</span>
						<span class="text_p">new</span>
					</div>
					
					<div class="mod-tile">
                            <h3>Dance, All Melbourne</h3>
                            <p>Marketing & Communications</p>
                  </div>
				</li>
			</ul>
		</div>
		
		
	</div>
	
	
	
	<div class="thumb1">
	<div class="heading1">
	<span class="glyphicon  glyphicon-heart"></span>
		<h2><a href="#"><span class="count">12</span>Shortlisted Jobs</a></h2></div>
		
		<div class="fasn">
			<ul>
				<li>
					<div class="mod-tile2">
                            <h3>Fashion Police Officer</h3>
                            <p>Red & Green Agency</p>
                        </div>
						
						<div class="mod-date">
                            <p>Today</p>
                        </div>
				</li>
				
				
				<li>
					<div class="mod-tile2">
                            <h3>Shopping Trolley Mechanic</h3>
                            <p>Carpark Logistics</p>
                  </div>
				  
				  <div class="mod-date">
                            <p>22 June</p>
                        </div>
				</li>
				
				
				<li>
					<div class="mod-tile2">
                            <h3>Election Poll Dancer</h3>
                            <p>Vote 4 Media</p>
                  </div>
				  <div class="mod-date">
                            <p>20 June</p>
                        </div>
				</li>
			</ul>
		</div>
		
		
	</div>
	
	<div class="thumb1" style="margin: 0px; float: right;">
	<div class="heading1">
	<span class="glyphicon  glyphicon-heart"></span>
		<h2><a href="#"><span class="count">34</span>Applied Jobs</a></h2></div>
		
		<div class="fasn">
			<ul>
				<li>
					<div class="mod-tile2">
                            <h3>High Heels Tester</h3>
                            <p>Stilettoes</p>
                        </div>
						
						<div class="mod-date">
                            <p>Today</p>
                        </div>
				</li>
				
				
				<li>
					<div class="mod-tile2">
                            <h3>English to English Translator</h3>
                            <p>G'Day Yo</p>
                  </div>
				  
				  <div class="mod-date">
                            <p>25 June</p>
                        </div>
				</li>
				
				
				<li>
					<div class="mod-tile2">
                            <h3>Imaginary Friend</h3>
                            <p>Milko</p>
                  </div>
				  <div class="mod-date">
                            <p>24 June</p>
                        </div>
				</li>
			</ul>
		</div>
		
		
	</div>
	
	
</div>  

<div class="clearfix"></div>
  
<div class="browse">
	<div class="b_heading">Browse jobs by:</div>
	<div class="b_li">
		<p>Classifications</p>
		<ul>
    		<li><a href="#">Accounting</a></li>
			<li><a href="#">Education & Training</a></li>
			<li><a href="#">Government & Defence</a></li>
			<li><a href="#">Healthcare & Medical</a></li>
			<li><a href="#">Sales</a></li>
			
			<li style="border:none; color:#666666; cursor:pointer;"><span></span>view all classifications</li>
		</ul>
	</div>
	
	<div class="b_li">
		<p>Major Cities</p>
		<ul>
    		<li><a href="#">Sydney</a></li>
			<li><a href="#">Melbourne</a></li>
			<li><a href="#">Brisbane</a></li>
			<li><a href="#">Gold Coast</a></li>
			<li><a href="#">Perth</a></li>
			<li><a href="#">Adelaide</a></li>
			<li><a href="#">Hobart</a></li>
			<li><a href="#">Darwin</a></li>
			<li><a href="#">Canberra</a></li>
			
		</ul>
	</div>
	
	<div class="b_li">
		<p>Salary</p>
		<ul>
    		<li><a href="#">Jobs paying more than $150k </a></li>
		</ul>
	</div>

	<div class="b_li">
		<p>Advertisers</p>
		<ul>
    		<li><a href="#">Employers</a></li>
			<li><a href="#">Recruiters</a></li>

		</ul>
	</div>
</div>  

<div class="clearfix"></div>

<div class="career">
	<div class="c_thumb">
		<div class="c_left">
			<h1>Looking for new career?</h1>
			<p>Looking for new career?<a href="#">TAFE,
university</a> or <a href="#">short course.</a> </p>
<select class="learning-tile-links" id="SelectedCourse">
    <option selected="selected" value="#">Choose an industry</option>
    <option value="#">Administration</option>
    <option value="#">Administration</option>
    <option value="#">Administration</option>
    <option value="#">Administration</option>
    <option value="#">Administration</option>
    <option value="#">Administration</option>
    <option value="#">Administration</option>
    <option value="#">Administration</option>
   </select>
   <input name="" type="button" value="Go">



		</div>
		<div class="c_right">
			<img src="<?PHP echo base_url();?>assets/images/icon1.jpg">
		</div>
	</div>
	
	
	<div class="c_thumb">
	  <div class="c_left">
			<h1>New jobs by email</h1>
			<p>Be alerted first with new jobs delivered daily.</p>
		  <span><a href="#">Create a JobMail ></a> </span>		</div>
		<div class="c_right">
			<img src="<?PHP echo base_url();?>assets/images/icon2.jpg">
		</div>
	</div>
	
	
	<div class="c_thumb">
		<div class="c_left" style="width: 54%; margin-left: 13px;">
			<h1>Promote yourself</h1>
			<p>Employers are searching for people like you right now.</p>

<span><a href="#">Create a Profile ></a> </span>


		</div>
		<div class="c_right">
			<img src="<?PHP echo base_url();?>assets/images/icon3.jpg">
		</div>
	</div>
    <input type="hidden" name="id_dropdown_location" id="dropdown_location">
</div>