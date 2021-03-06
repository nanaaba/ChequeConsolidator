
    <div class="layout-sidebar">
        <div class="layout-sidebar-backdrop"></div>
        <div class="layout-sidebar-body">
            <div class="custom-scrollbar">
                <nav id="sidenav" class="sidenav-collapse collapse">
                    <ul class="sidenav">
                        <li class="sidenav-search hidden-md hidden-lg">
                            <form class="sidenav-form" action="/">
                                <div class="form-group form-group-sm">
                                    <div class="input-with-icon">
                                        <input class="form-control" type="text" placeholder="Search…">
                                        <span class="icon icon-search input-icon"></span>
                                    </div>
                                </div>
                            </form>
                        </li>
                        <li class="sidenav-heading" >Portal</li>
                       
                         
                            <li class="sidenav-item  <?php echo e(Request::is('banks*') ? 'active' : ''); ?>"  >
                                <a  href="<?php echo e(url('banks')); ?>">
                                    <span class="sidenav-icon icon icon-list"></span>
                                    <span class="sidenav-label">Banks </span>
                                </a>

                            </li>
                             <li class="sidenav-item <?php echo e(Request::is('cheques/issued') ? 'active' : ''); ?>" >
                                <a href="<?php echo e(url('cheques/issued')); ?>">
                                    <span class="sidenav-icon icon icon-list"></span>
                                    <span class="sidenav-label">Payments Cheques  </span>
                                </a>

                            </li>
                            <li class="sidenav-item <?php echo e(Request::is('cheques/deposited') ? 'active' : ''); ?>" >
                                <a href="<?php echo e(url('cheques/deposited')); ?>">
                                    <span class="sidenav-icon icon icon-list"></span>
                                    <span class="sidenav-label">Deposited Cheques  </span>
                                </a>

                            </li>
                            
                             <li class="sidenav-item <?php echo e(Request::is('reports*') ? 'active' : ''); ?>"  >
                                <a href="<?php echo e(url('reports')); ?>">
                                    <span class="sidenav-icon icon icon-list"></span>
                                    <span class="sidenav-label">Reports </span>
                                </a>

                            </li>
                       
                    </ul>
                </nav>
            </div>
        </div>
    </div>

