<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<li class="sidebar-search-wrapper hidden-xs">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
					<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
					<form class="sidebar-search" action="extra_search.html" method="POST">
						<a href="javascript:;" class="remove">
						<i class="icon-close"></i>
						</a>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
							</span>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li class="start active ">
					<a href="index.html">
					<i class="icon-home"></i>
					<span class="title">Dashboard</span>
					<span class="selected"></span>
					</a>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-basket"></i>
					<span class="title">Users</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?php echo site_url('users/all_users/1')?>">
							<i class="icon-home"></i>
							Type1</a>
						</li>
						<li>
							<a href="<?php echo site_url('users/all_users/2')?>">
							<i class="icon-basket"></i>
							Type2</a>
						</li>
                        <li>
							<a href="<?php echo site_url('users/all_users/3')?>">
							<i class="icon-basket"></i>
							Type2</a>
						</li>
						
					</ul>
				</li>
				<!-- BEGIN FRONTEND THEME LINKS --><!-- END FRONTEND THEME LINKS -->
				<li class="last ">
					<a href="charts.html">
					<i class="icon-bar-chart"></i>
					<span class="title">Visual Charts</span>
					</a>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
        
        