
						<li>
							<i class="fa fa-home"></i>
							<a href="<?php echo site_url('dashboard');?>">
								Home
							</a>
							
						</li>
                                                <?php if(isset($main_nav)&&(!empty($main_nav))) : ?>
						<li>
                                                    <i class="fa fa-angle-right"></i>
							<a href="<?php echo site_url($main_nav);?>">
								<?php echo ucfirst($main_nav);?>
							</a>
							
						</li>
                                                <?PHP endif; ?>
						<?php if(isset($nav)&&(!empty($nav))) : ?>
						<li>
                                                    <i class="fa fa-angle-right"></i>
							
								<?php echo ucfirst($nav);?>
							
							
						</li>
                                                <?PHP endif; ?>
                                                <?php if(isset($sub_nav)&&(!empty($sub_nav))) : ?>
						<li>
                                                    <i class="fa fa-angle-right"></i>
							
								<?php echo ucfirst($sub_nav);?>
							
							
						</li>
                                                <?PHP endif; ?>

                                                
                                              