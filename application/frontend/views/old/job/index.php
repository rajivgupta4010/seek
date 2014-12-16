<div class="jobs_container">
 <!--jobs tabs-->

   <!-- Nav tabs -->
    <ul class="nav nav-tabs jobs_tabs" id="jobs-tab" role="tablist">
      <li class="active"><a href="#open_job">Open</a></li>
      <li><a href="#job_draft">Draft</a></li>
      <li><a href="#job_close">Close</a></li>
      <li><a href="#add_booking">Pre-booked premium ads</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane active" id="open_job">
          <div class="job_open_tab_row">
              <div class="job_open_title">
                <h2><span>0</span> Open Job</h2>
              </div>
              <div class="job_open_create">
                 <a href="<?php echo site_url('job/CreateJob');?>"  class="create_job">
                   <span class="glyphicon glyphicon-plus-sign text_pink"></span> Create job
                 </a>
              </div>
              <div class="job_search_bar">                 
                    <div class="search-bar_input">                       
                        <input type="text" placeholder="Search open jobs">                       
                    </div>
                    <div class="search-bar_button"><span class="glyphicon glyphicon-search"></span></div>
              
              </div>
              <div class="clearfix"></div>
              <!--table-->
              <div class="job_table_header">
                <div class="job_table_row">                   
                    <div class="grid_status">
                        <span class="search-results_sort-status">Status</span>
                    </div>

                    <div class="grid_ads">
                        <span class="search-results_sort-ads">Ads</span>
                    </div>

                    <div class="grid_job">
                        <span class="search-results_sort-title">Job</span>
                    </div>

                    <div class="grid_created">
                        <span class="search-results_sort-createddate">
                            Created
                        </span>
                    </div>

                    <div class="grid_candidates">
                        <span class="search-results_sort-numberofcandidates">
                            Candidates
                        </span>
                    </div>

                    <div class="grid_candidates">
                        Browse profiles
                    </div>
                    <!-- /ko -->
                    <!-- ko 'if' : filteredBy() == 'draft' --><!-- /ko -->
                    <!-- ko 'if' : filteredBy() == 'closed' --><!-- /ko -->
                    <!-- ko 'if' : filteredBy() == 'premiumAdSlot' --><!-- /ko -->
                </div>
            </div>
              <!--/table-->
            <div class="no_open_jobs">
              <h2>You have no open jobs</h2>
            </div>   
          </div>
      </div>
      <div class="tab-pane" id="job_draft">
         <div class="job_open_tab_row">
              <div class="job_open_title">
                <h2><span>0</span> Draft Jobs</h2>
              </div>
              <div class="job_open_create">
                 <a href="#"  class="create_job">
                   <span class="glyphicon glyphicon-plus-sign text_pink"></span> Create job
                 </a>
              </div>
              <div class="job_search_bar">                 
                    <div class="search-bar_input">                       
                        <input type="text" placeholder="Search open jobs">                       
                    </div>
                    <div class="search-bar_button"><span class="glyphicon glyphicon-search"></span></div>
              
              </div>
              <div class="clearfix"></div>
              <!--table-->
              <div class="job_table_header">
                <div class="job_table_row">                   
                    <div class="grid_status">
                        <span class="search-results_sort-status">Status</span>
                    </div>

                    <!-- <div class="grid_ads">
                        <span class="search-results_sort-ads">Ads</span>
                    </div> -->

                    <div class="grid_job">
                        <span class="search-results_sort-title">Job</span>
                    </div>

                    <div class="grid_created">
                        <span class="search-results_sort-createddate">
                            Created
                        </span>
                    </div>

                  <!--   <div class="grid_candidates">
                        <span class="search-results_sort-numberofcandidates">
                            Candidates
                        </span>
                    </div>

                    <div class="grid_candidates">
                        Browse profiles
                    </div> -->
                    <!-- /ko -->
                    <!-- ko 'if' : filteredBy() == 'draft' --><!-- /ko -->
                    <!-- ko 'if' : filteredBy() == 'closed' --><!-- /ko -->
                    <!-- ko 'if' : filteredBy() == 'premiumAdSlot' --><!-- /ko -->
                </div>
            </div>
              <!--/table-->
            <div class="no_open_jobs">
              <h2>You have no draft jobs</h2>
            </div>   
          </div>
      </div>
      <div class="tab-pane" id="job_close">
         <div class="job_open_tab_row">
              <div class="job_open_title">
                <h2><span>0</span> Closed Jobs</h2>
              </div>
              <div class="job_open_create">
                 <a href="#"  class="create_job">
                   <span class="glyphicon glyphicon-plus-sign text_pink"></span> Create job
                 </a>
              </div>
              <div class="job_search_bar">                 
                    <div class="search-bar_input">                       
                        <input type="text" placeholder="Search open jobs">                       
                    </div>
                    <div class="search-bar_button"><span class="glyphicon glyphicon-search"></span></div>
              
              </div>
              <div class="clearfix"></div>
              <!--table-->
              <div class="job_table_header">
               <div class="job_table_row">                   
                    <div class="grid_status">
                        <span class="search-results_sort-status">Status</span>
                    </div>

                    <!-- <div class="grid_ads">
                        <span class="search-results_sort-ads">Ads</span>
                    </div> -->

                    <div class="grid_job">
                        <span class="search-results_sort-title">Job</span>
                    </div>

                    <div class="grid_candidates">
                        <span class="search-results_sort-createddate">
                           Created
                        </span>
                    </div>

                    <div class="grid_candidates">
                        <span class="search-results_sort-numberofcandidates">
                            Candidates
                        </span>
                    </div>

                    <!-- <div class="grid_candidates">
                        Browse profiles
                    </div> -->
                    <!-- /ko -->
                    <!-- ko 'if' : filteredBy() == 'draft' --><!-- /ko -->
                    <!-- ko 'if' : filteredBy() == 'closed' --><!-- /ko -->
                    <!-- ko 'if' : filteredBy() == 'premiumAdSlot' --><!-- /ko -->
                </div>
            </div>
              <!--/table-->
            <div class="no_open_jobs">
              <h2>You have no closed jobs</h2>
            </div>   
          </div>
      </div>
      <div class="tab-pane" id="add_booking">
          <div class="job_open_tab_row">
              <div class="job_open_title">
                <h2><span>0</span> Pre-booked premium ads</h2>
              </div>
              <!-- <div class="job_open_create">
                 <a href="#"  class="create_job">
                   <span class="glyphicon glyphicon-plus-sign text_pink"></span> Create job
                 </a>
              </div> -->
              <!-- <div class="job_search_bar">                 
                    <div class="search-bar_input">                       
                        <input type="text" placeholder="Search open jobs">                       
                    </div>
                    <div class="search-bar_button"><span class="glyphicon glyphicon-search"></span></div>
              
              </div> -->
              <div class="clearfix"></div>
              <!--table-->
              <div class="job_table_header">
                <div class="job_table_row">                   
                    <div class="grid_status">
                        <span class="search-results_sort-status">Status</span>
                    </div>

                    <!-- <div class="grid_ads">
                        <span class="search-results_sort-ads">Ads</span>
                    </div> -->

                    <div class="grid_job">
                        <span class="search-results_sort-title">Job</span>
                    </div>

                    <div class="grid_candidates">
                        <span class="search-results_sort-createddate">
                           Premium ad dates
                        </span>
                    </div>

                    <div class="grid_candidates">
                        <span class="search-results_sort-numberofcandidates">
                            Add Content
                        </span>
                    </div>

                    <!-- <div class="grid_candidates">
                        Browse profiles
                    </div> -->
                    <!-- /ko -->
                    <!-- ko 'if' : filteredBy() == 'draft' --><!-- /ko -->
                    <!-- ko 'if' : filteredBy() == 'closed' --><!-- /ko -->
                    <!-- ko 'if' : filteredBy() == 'premiumAdSlot' --><!-- /ko -->
                </div>
            </div>
              <!--/table-->
            <div class="no_open_jobs" id="">
              <h2>You have no pre-booked premium ads.</h2>
              <p>Live premium ads can be found in<a href="<?php echo site_url('job');?>" class="pl5">Open jobs</a></p>
              <p>To book a premium ad, <a href="<?php echo site_url('job/ManageJob');?>" class="p15">Create a job</a></p>
              <p class="text_pink">To book a premium ad beyond 3 weeks, please call <strong>Sales on 13 64 34</strong>.</p>

            </div>   
          </div>        
      </div>
    </div>

 <!--/jobs tabs-->
</div>