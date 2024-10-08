<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Summary</li>
                <li>
                    <a href="/dashboard" class="waves-effect">
                        <i class='bx bx-home-alt'></i>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>
                <li class="menu-title" key="t-menu">Request</li>
                <li class="{{ request()->is('access/*') == 1 ? 'mm-active' : ''}}">
                    <a href="/access" class="waves-effect {{ request()->is('access/*') == 1 ? 'active' : ''}}">
                        <i class='bx bxs-file-doc'></i>
                        <span key="t-access">Visitor Access</span>
                    </a>
                </li>
                <li class="{{ request()->is('worker/*') == 1 ? 'mm-active' : ''}}">
                    <a href="/worker" class="waves-effect {{ request()->is('worker/*') == 1 ? 'active' : ''}}">
                        <i class='bx bx-file'></i>
                        <span key="t-lokasi">Worker Access</span>
                    </a>
                </li>
                <li class="{{ request()->is('extend/*') == 1 ? 'mm-active' : ''}}">
                    <a href="/extend" class="waves-effect {{ request()->is('extend/*') == 1 ? 'active' : ''}}">
                        <i class='bx bx-file'></i>
                        <span key="t-lokasi">Extend Periode</span>
                    </a>
                </li>
                <li class="{{ request()->is('induction/*') == 1 ? 'mm-active' : ''}}">
                    <a href="/induction" class="waves-effect {{ request()->is('induction/*') == 1 ? 'active' : ''}}">
                        {{-- <span class="badge rounded-pill bg-warning float-end" key="t-hot">Hot</span> --}}
                        <span class="badge badge-soft-warning float-end">soon</span>
                        <i class='bx bx-file'></i>
                        <span key="t-lokasi">Induction</span>
                    </a>
                </li>
                <li class="{{ request()->is('verification/*') == 1 ? 'mm-active' : ''}}">
                    <a href="/verification" class="waves-effect {{ request()->is('verification/*') == 1 ? 'active' : ''}}">
                        <i class='bx bx-user-voice' ></i>
                        <span key="t-lokasi">Verification</span>
                    </a>
                </li>
                <li class="menu-title" key="t-apps">Reporting</li>
                <li class="{{ request()->is('statistic/*') == 1 ? 'mm-active' : ''}}">
                    <a href="/statistic" class="waves-effect {{ request()->is('statistic/*') == 1 ? 'active' : ''}}">
                        <i class='bx bx-pie-chart-alt-2'></i>
                        <span key="t-provider">Statistic</span>
                    </a>
                </li>
                <li class="{{ request()->is('report/*') == 1 ? 'mm-active' : ''}}">
                    <a href="/report" class="waves-effect {{ request()->is('report/*') == 1 ? 'active' : ''}}">
                        <i class='bx bx-spreadsheet'></i>
                        <span key="t-provider">Report</span>
                    </a>
                </li>

                <li class="menu-title" key="t-apps">Master Data</li>
                <li class="{{ request()->is('vendor/*') == 1 ? 'mm-active' : ''}}">
                    <a href="/vendor" class="waves-effect {{ request()->is('vendor/*') == 1 ? 'active' : ''}}">
                        <i class='bx bx-building' ></i>
                        <span key="t-lokasi">Vendor</span>
                    </a>
                </li>
                <li class="{{ request()->is('ppe/*') == 1 ? 'mm-active' : ''}}">
                    <a href="/ppe" class="waves-effect {{ request()->is('ppe/*') == 1 ? 'active' : ''}}">
                        <i class='bx bx-user'></i>
                        <span key="t-provider">PPE</span>
                    </a>
                </li>

                <li class="menu-title" key="t-apps">Settings</li>
                <li class="{{ request()->is('users/*') == 1 ? 'mm-active' : ''}}">
                    <a href="/users" class="waves-effect {{ request()->is('users/*') == 1 ? 'active' : ''}}">
                        <i class='bx bx-user'></i>
                        <span key="t-provider">Users</span>
                    </a>
                </li>
                <li class="{{ request()->is('roles/*') == 1 ? 'mm-active' : ''}}">
                    <a href="/roles" class="waves-effect {{ request()->is('roles/*') == 1 ? 'active' : ''}}">
                        <i class='bx bx-target-lock'></i>
                        <span key="t-provider">Rules</span>
                    </a>
                </li>
                <li class="{{ request()->is('permission/*') == 1 ? 'mm-active' : ''}}">
                    <a href="/permission" class="waves-effect {{ request()->is('permission/*') == 1 ? 'active' : ''}}">
                        <i class='bx bx-user-circle'></i>
                        <span key="t-provider">Permission</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
