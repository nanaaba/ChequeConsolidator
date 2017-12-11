
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
                             <li class="sidenav-item <?php echo e(Request::is('cheques*') ? 'active' : ''); ?>" >
                                <a href="<?php echo e(url('cheques')); ?>">
                                    <span class="sidenav-icon icon icon-list"></span>
                                    <span class="sidenav-label">Cheques Payments </span>
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

