<?php
$permissions = Session::get('permissions');
?>

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

                    <li class="sidenav-item  {{ Request::is('dashboard*') ? 'active' : '' }}"  >
                        <a  href="{{ url('dashboard') }}">
                            <span class="sidenav-icon icon icon-list"></span>
                            <span class="sidenav-label">Dashboard </span>
                        </a>

                    </li>
                    <?php
                    if (in_array("VIEW_COMPANIES", $permissions)) {
                        ?> 
                        <li class="sidenav-item  {{ Request::is('companies*') ? 'active' : '' }}"  >
                            <a  href="{{ url('companies') }}">
                                <span class="sidenav-icon icon icon-list"></span>
                                <span class="sidenav-label">Companies </span>
                            </a>

                        </li> <?php
                    }
                    if (in_array("VIEW_COMPANY_BANK", $permissions)) {
                        ?> 

                        <li class="sidenav-item  {{ Request::is('banks*') ? 'active' : '' }}"  >
                            <a  href="{{ url('banks') }}">
                                <span class="sidenav-icon icon icon-list"></span>
                                <span class="sidenav-label">Banks </span>
                            </a>

                        </li>
                        <?php
                    }
                    if (in_array("VIEW_WITHDRAWAL_CHEQUES", $permissions)) {
                        ?> 
                        <li class="sidenav-item {{ Request::is('cheques/withdrawals') ? 'active' : '' }}" >
                            <a href="{{ url('cheques/withdrawals') }}">
                                <span class="sidenav-icon icon icon-list"></span>
                                <span class="sidenav-label">Withdrawals Cheques  </span>
                            </a>

                        </li>

                        <?php
                    }
                    if (in_array("VIEW_DEPOSIT_CHEQUES", $permissions)) {
                        ?>  
                        <li class="sidenav-item {{ Request::is('cheques/deposited') ? 'active' : '' }}" >
                            <a href="{{ url('cheques/deposited') }}">
                                <span class="sidenav-icon icon icon-list"></span>
                                <span class="sidenav-label">Deposited Cheques  </span>
                            </a>

                        </li>
                        <?php
                    }
                    if (in_array("MONITOR_CHEQUES", $permissions)) {
                        ?> 

                        <li class="sidenav-item {{ Request::is('monitoring*') ? 'active' : '' }}" >
                            <a href="{{ url('monitoring') }}">
                                <span class="sidenav-icon icon icon-list"></span>
                                <span class="sidenav-label">Monitoring  </span>
                            </a>

                        </li> <?php
                    }
                    if (in_array("VIEW_ACCOUNT", $permissions)) {
                        ?> 



                        <li class="sidenav-item has-subnav {{ Request::is('account*') ? 'active' : '' }}"  >
                            <a href="#" aria-haspopup="true">
                                <span class="sidenav-icon icon icon-files-o"></span>
                                <span class="sidenav-label">Account</span>
                            </a>
                            <ul class="sidenav-subnav collapse">
                                <?php
                                if (in_array("VIEW_USERGROUPS", $permissions)) {
                                    ?> 
                                    <li>  <a href="{{ url('account/usergroups') }}">User Groups</a></li>
                                    <?php
                                }
                                if (in_array("ASSIGN_ROLES", $permissions)) {
                                    ?> 
                                    <li>  <a href="{{ url('account/assignroles') }}">Assign Roles And Permissions</a></li>
                                    <?php
                                }
                                if (in_array("VIEW_USERS", $permissions)) {
                                    ?> 
                                    <li>  <a href="{{ url('account/users') }}">Users </a></li>

                                </ul>
                            </li> <?php
                        }
                    }
                    if (in_array("VIEW_REPORTS", $permissions)) {
                        ?> 


                        <li class="sidenav-item {{ Request::is('reports*') ? 'active' : '' }}"  >
                            <a href="{{ url('reports') }}">
                                <span class="sidenav-icon icon icon-list"></span>
                                <span class="sidenav-label">Reports </span>
                            </a>

                        </li> <?php
                    }
                    ?> 


                </ul>
            </nav>
        </div>
    </div>
</div>

