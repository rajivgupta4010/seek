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
            <li class="start <?php if (isset($sidebar_main) and $sidebar_main == 'dashboard') echo 'active'; ?>">
                <a href="<?php echo site_url('dashboard') ?>">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
              <li class="start <?php if (isset($sidebar_main) and $sidebar_main == 'meetings') echo 'active'; ?>">
                <a href="<?php echo site_url('meeting') ?>">
                    <i class="fa fa-group"></i>
                    <span class="title">Meetings</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="<?php if (isset($sidebar_main) and $sidebar_main == 'users') echo 'active open'; ?> ">
                <a href="javascript:;">
                    <i class="icon-users"></i>
                    <span class="title">Users</span>
                    <span class="arrow "></span>
                </a>

                <ul class="sub-menu">
                    <li <?php if (isset($sidebar_main) and ( $sidebar_main == 'users') and ( $this->uri->segment(3) == 0)) echo "class='active'"; ?>>
                        <a href="<?php echo site_url('users/all_users') ?>">
                            <i class="icon-user-following"></i>
                            Administrator</a>
                    </li>
                    <li <?php if (isset($sidebar_main) and ( $sidebar_main == 'users') and ( $this->uri->segment(3) == 1)) echo "class='active'"; ?>>
                        <a href="<?php echo site_url('users/all_users/1') ?>">
                            <i class=" icon-user-follow"></i>
                            Parent</a>
                    </li>
                    <li <?php if (isset($sidebar_main) and ( $sidebar_main == 'users') and ( $this->uri->segment(3) == 2)) echo "class='active'"; ?>>
                        <a href="<?php echo site_url('users/all_users/2') ?>">
                            <i class="icon-user-unfollow"></i>
                            Tutor</a>
                    </li>
                    <li <?php if (isset($sidebar_main) and ( $sidebar_main == 'users') and ( $this->uri->segment(3) == 3)) echo "class='active'"; ?>>
                        <a href="<?php echo site_url('users/all_users/3') ?>">
                            <i class="icon-user-unfollow"></i>
                            Student</a>
                    </li>

                </ul>
            </li>
            <li class="<?php if (isset($sidebar_main) and $sidebar_main == 'email_templates') echo 'active open'; ?> ">
                <a href="javascript:;">
                    <i class="icon-users"></i>
                    <span class="title">Email Templates</span>
                    <span class="arrow "></span>
                </a>

                <ul class="sub-menu">
                    <li <?php if (isset($sidebar_main) and ( $sidebar_main == 'email_templates') and ( $sidebar_base == 'forgot')) echo "class='active'"; ?>>
                        <a href="<?php echo site_url('templates/forgot_password') ?>">
                            <i class="icon-user-following"></i>
                            Forget Password</a>
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

