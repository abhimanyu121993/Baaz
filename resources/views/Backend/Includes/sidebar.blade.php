<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand p-0" href="#">
                <img class="" alt="logo" height="40" width="60" src="{{ asset('upload/bazz_logo.png') }}">
                    <h2 class="brand-text" style="color: #fca40b;">BAAZ</h2>

                </a>
            </li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item"><a class="d-flex align-items-center" href="{{ route('Backend.dashboard') }}"><i
                        data-feather="home"></i><span class="menu-title text-truncate"
                        data-i18n="Dashboards">Dashboard</span></a>
            </li>
            <li class="nav-item has-sub" style=""><a class="d-flex align-items-center" href="#"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" data-feather="slack" class="feather feather-folder-minus">
                        <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                        <line x1="9" y1="14" x2="15" y2="14"></line>
                    </svg><span class="menu-title text-truncate" data-i18n="Invoice">Car</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ route('Backend.brand.index') }}"><svg
                                xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg><span class="menu-item text-truncate" data-i18n="List">Car Brand</span></a>


                    <li><a class="d-flex align-items-center" href="{{ route('Backend.model.index') }}"><svg
                                xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg><span class="menu-item text-truncate" data-i18n="List">Car Model</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('Backend.fueltype.index') }}"><svg
                                xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg><span class="menu-item text-truncate" data-i18n="List">Car Fuel Type</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-sub" style=""><a class="d-flex align-items-center" href="#"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-folder-minus">
                        <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                        <line x1="9" y1="14" x2="15" y2="14"></line>
                    </svg><span class="menu-title text-truncate" data-i18n="Invoice">Category/Services</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ route('Backend.category.index') }}"><svg
                                xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg><span class="menu-item text-truncate" data-i18n="List">Category</span></a>
                    </li>

                    <li><a class="d-flex align-items-center" href="{{ route('Backend.service.index') }}"><svg
                                xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg><span class="menu-item text-truncate" data-i18n="List">Services</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a class="d-flex align-items-center" href="{{ route('Backend.userList') }}"><i
                        data-feather="users"></i><span class="menu-title text-truncate" data-i18n="User List">User List</span></a>
            </li>
            <li class="nav-item"><a class="d-flex align-items-center"
                    href="{{ route('Backend.homeslider.index') }}"><i data-feather="sliders"></i><span
                        class="menu-title text-truncate" data-i18n="User List">Home Slider</span></a>
            </li>
            <li class="nav-item"><a class="d-flex align-items-center"
                href="{{ route('Backend.orderhistory.index') }}"><i data-feather="file-text"></i><span
                    class="menu-title text-truncate" data-i18n="User List">Order History</span></a>
            </li>

        </ul>
    </div>
</div>
