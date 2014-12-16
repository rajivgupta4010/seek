    <div class="sidebar-nav">
       
         <a href="<?php echo base_url();?>/dashboard" class="nav-header" ><i class="icon-dashboard"></i>Dashboard</a>
        
         <a href="<?php echo base_url();?>users/manage_user" class="nav-header collapsed" ><i class="icon-briefcase"></i>Manage Users</a> 
     
          
        <a href="#restaurants-menu" class="nav-header collapsed" data-toggle="collapse"><i class="icon-briefcase"></i>Manage Restaurants<i class="icon-chevron-up"></i></a>
        <ul id="restaurants-menu" class="nav nav-list collapse">
            <li ><a href="<?php echo base_url();?>restaurants/manage_restaurants">Restaurants</a></li>
            <li ><a href="<?php echo base_url();?>restaurants/manage_menus">Menus</a></li>
            <li ><a href="<?php echo base_url();?>restaurants/manage_coupons">Coupons</a></li>
        </ul>
           
         
         <a href="#notifications-menu" class="nav-header collapsed" data-toggle="collapse"><i class="icon-briefcase"></i>Manage Notification<i class="icon-chevron-up"></i></a>
         <ul id="notifications-menu" class="nav nav-list collapse">
            <li ><a href="<?php echo base_url();?>users/manage_comming_soon">Comming Soon</a></li>
            <li ><a href="<?php echo base_url();?>users/manage_what_missed">What Missed</a></li>
            <li ><a href="<?php echo base_url();?>users/manage_newslatter">Newsletter</a></li>
        </ul> 
         
         <a href="<?php echo base_url();?>restaurants/manage_orders" class="nav-header collapsed" ><i class="icon-briefcase"></i>Manage Orders</a>
          
         <a href="<?php echo base_url();?>banners/manage_banners" class="nav-header collapsed" ><i class="icon-briefcase"></i>Manage Banners</a>
         
         <a href="<?php echo base_url();?>restaurants/manage_surcharges" class="nav-header collapsed" ><i class="icon-briefcase"></i>Manage Surchage</a> 
          
         <a href="<?php echo base_url();?>pages/manage_page" class="nav-header collapsed" ><i class="icon-briefcase"></i>Manage pages</a> 
      
    </div>