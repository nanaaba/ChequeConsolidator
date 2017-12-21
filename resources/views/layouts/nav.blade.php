
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

                    <li class="sidenav-item  {{ Request::is('companies*') ? 'active' : '' }}"  >
                        <a  href="{{ url('companies') }}">
                            <span class="sidenav-icon icon icon-list"></span>
                            <span class="sidenav-label">Companies </span>
                        </a>

                    </li>
                    <li class="sidenav-item  {{ Request::is('banks*') ? 'active' : '' }}"  >
                        <a  href="{{ url('banks') }}">
                            <span class="sidenav-icon icon icon-list"></span>
                            <span class="sidenav-label">Banks </span>
                        </a>

                    </li>
                    <li class="sidenav-item {{ Request::is('cheques/withdrawals') ? 'active' : '' }}" >
                        <a href="{{ url('cheques/withdrawals') }}">
                            <span class="sidenav-icon icon icon-list"></span>
                            <span class="sidenav-label">Withdrawals Cheques  </span>
                        </a>

                    </li>
                    <li class="sidenav-item {{ Request::is('cheques/deposited') ? 'active' : '' }}" >
                        <a href="{{ url('cheques/deposited') }}">
                            <span class="sidenav-icon icon icon-list"></span>
                            <span class="sidenav-label">Deposited Cheques  </span>
                        </a>

                    </li>

                    <li class="sidenav-item {{ Request::is('monitoring*') ? 'active' : '' }}" >
                        <a href="{{ url('monitoring') }}">
                            <span class="sidenav-icon icon icon-list"></span>
                            <span class="sidenav-label">Monitoring  </span>
                        </a>

                    </li>

                    <li class="sidenav-item {{ Request::is('reports*') ? 'active' : '' }}"  >
                        <a href="{{ url('reports') }}">
                            <span class="sidenav-icon icon icon-list"></span>
                            <span class="sidenav-label">Reports </span>
                        </a>

                    </li>

                </ul>
            </nav>
        </div>
    </div>
</div>

