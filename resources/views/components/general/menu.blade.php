<div class="iq-sidebar sidebar-default">
    <div class="iq-sidebar-logo d-flex align-items-center">
        <a href="index.html" class="header-logo">
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
                <li class=" ">
                    <a href="#otherpage" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" width="25" height="25" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                        </svg>
                        <span class="ml-4">Section</span>
                        <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                        <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                    </a>
                    <ul id="otherpage" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class=" ">
                            <a href="#user" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                <svg class="svg-icon" id="p-dash10" width="20" height="20"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="8.5" cy="7" r="4"></circle>
                                    <polyline points="17 11 19 13 23 9"></polyline>
                                </svg>
                                <span class="ml-4">SubSection</span>
                                <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                                <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                            </a>
                            <ul id="user" class="iq-submenu collapse" data-parent="#otherpage">
                                <li class="">
                                    <a href="https://templates.iqonic.design/product/lite/webkit/html/app/user-profile.html">
                                        <i class="las la-minus"></i><span>Item</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="pt-5 pb-2"></div>
    </div>
</div>
