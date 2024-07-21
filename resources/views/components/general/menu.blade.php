<div class="iq-sidebar sidebar-default">
    <div class="iq-sidebar-logo d-flex align-items-center">
        <a href="{{ route('dashboard') }}" class="header-logo">
            <img src="{{ secure_asset('assets/images/logo.svg') }}" alt="logo">
            <h3 class="logo-title light-logo">TaskTrail</h3>
        </a>
        <div class="iq-menu-bt-sidebar ml-0">
            <i class="las la-bars wrapper-menu"></i>
        </div>
    </div>
    <div class="data-scrollbar" data-scroll="1">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="{{ menuItemActive(['dashboard']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="svg-icon">
                        <i class="las la-tachometer-alt"></i>
                        <span class="ml-2">Dashboard</span>
                    </a>
                </li>

                <li><hr /></li>

                <li class="{{ menuItemActive(['users.*']) ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}" class="svg-icon">
                        <i class="las la-users-cog"></i>
                        <span class="ml-2">Users</span>
                    </a>
                </li>
                <li class="">
                    <a href="#" class="svg-icon">
                        <i class="las la-users"></i>
                        <span class="ml-2">Roles</span>
                    </a>
                </li>
                <li class="">
                    <a href="#logs" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <i class="las la-history"></i>
                        <span class="ml-2">Logs</span>
                        <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                        <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                    </a>
                    <ul id="logs" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="">
                            <a href="#">
                                <i class="las la-minus"></i><span>System</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#">
                                <i class="las la-minus"></i><span>Errors</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li><hr /></li>

                <li class="">
                    <a href="#" class="svg-icon">
                        <i class="las la-info-circle"></i>
                        <span class="ml-2">About</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="pt-5 pb-2"></div>
    </div>
</div>
