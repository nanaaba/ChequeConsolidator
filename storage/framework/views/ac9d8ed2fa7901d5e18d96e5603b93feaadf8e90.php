<div class="be-left-sidebar">
    <div class="left-sidebar-wrapper"><a href="#" class="left-sidebar-toggle">Dashboard</a>
        <div class="left-sidebar-spacer">
            <div class="left-sidebar-scroll">
                <div class="left-sidebar-content">
                    <ul class="sidebar-elements">
                        <li class="divider">Menu</li>
                        <li class="<?php echo e(Request::is('dashboard') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('dashboard')); ?>">
                                <i class="icon mdi mdi-home"></i><span>Dashboard</span></a>
                        
                        </li>
                        
                        
                         <li class="parent  <?php echo e(Request::is('analytics*') ? 'active' : ''); ?>"><a href="#">
                                <i class="icon mdi mdi-home"></i><span>Analytics</span></a>
                            <ul class="sub-menu">

                               
                                <li class="<?php echo e(Request::is('analytics/trend') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(url('analytics/trend')); ?>" class="menu-item">Trend Analysis</a>
                                </li>
                                <li class="<?php echo e(Request::is('analytics/customperformance') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(url('analytics/customperformance')); ?>" class="menu-item">Custom Performance</a>
                                </li>
                                 <li class="<?php echo e(Request::is('analytics/customtrend') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(url('analytics/customtrend')); ?>" class="menu-item">Custom Trend</a>
                                </li>

                                
                            </ul>
                        </li>
                        
                        
                        

                        <li class="parent  <?php echo e(Request::is('configuration*') ? 'active' : ''); ?>"><a href="#"><i class="icon mdi mdi-settings"></i><span>Settings</span></a>
                            <ul class="sub-menu">

                                <li class="<?php echo e(Request::is('configuration/category') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(url('configuration/category')); ?>" class="menu-item">New Category</a>
                                </li>
                                <li class="<?php echo e(Request::is('configuration/cashier') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(url('configuration/cashier')); ?>" class="menu-item">New Cashier</a>
                                </li>
                                <li class="<?php echo e(Request::is('configuration/tollpoint') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(url('configuration/tollpoint')); ?>" class="menu-item">New Tollpoint</a>
                                </li>

                                <li class="<?php echo e(Request::is('configuration/categories') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(url('configuration/categories')); ?>" class="menu-item">All Categories</a>
                                </li> <li class="<?php echo e(Request::is('configuration/cashiers') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(url('configuration/cashiers')); ?>" class="menu-item">All Cashiers</a>
                                </li> <li class="<?php echo e(Request::is('configuration/tollpoints') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(url('configuration/tollpoints')); ?>" class="menu-item">All Tollpoints</a>
                                </li>
                            </ul>
                        </li>

                       <li class="<?php echo e(Request::is('users*') ? 'active' : ''); ?>"><a href="<?php echo e(url('users')); ?>"><i class="icon mdi mdi-account"></i><span>User Management</span></a>
                        </li>



                        <li class="parent  <?php echo e(Request::is('reports*') ? 'active' : ''); ?>"><a href="#">
                                <i class="icon mdi mdi-home"></i><span>Reports</span></a>
                            <ul class="sub-menu">

                                <li class="<?php echo e(Request::is('reports/general') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(url('reports/general')); ?>" class="menu-item">General Report</a>
                                </li>
                                <li class="<?php echo e(Request::is('reports/daily') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(url('reports/daily')); ?>" class="menu-item">DayWise Report</a>
                                </li>
                                <li class="<?php echo e(Request::is('reports/monthly') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(url('reports/monthly')); ?>" class="menu-item">Monthly Report</a>
                                </li>

                                <li class="<?php echo e(Request::is('reports/yearly') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(url('reports/yearly')); ?>" class="menu-item">Yearly Report</a>
                                </li> 
                                <li class="<?php echo e(Request::is('reports/shift') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(url('reports/shift')); ?>" class="menu-item">Shift Report</a>
                                </li> 
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>