<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/home" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/branding/logo-full.png') }}" alt="Book Series" width="70" height="60">
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">Book Series</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
            <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-divider mt-0"></div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Content -->
        <li class="menu-item active open">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Content">Content</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('book/dashboard') ? 'active' : '' }}">
                    <a href="/book/dashboard" class="menu-link">
                        {{-- <i class="fa-solid fa-book"></i> --}}
                        <div data-i18n="Dashboard">Dashboard</div>
                    </a>
                </li>
                <li class="menu-item {{ in_array(request()->path(), ['books', 'addbook', 'editbook/' . request('id'), 'deletebook/' . request('id')]) ? 'active' : '' }}">
                    <a href="/books" class="menu-link">
                        {{-- <i class="fa-solid fa-book"></i> --}}
                        <div data-i18n="Books">Books</div>
                    </a>
                </li>
                <li class="menu-item {{ in_array(request()->path(), ['tests', 'addtest', 'edittest/' . request('id'), 'deletetest/' . request('id')]) ? 'active' : '' }}">
                    <a href="/tests" class="menu-link">
                        <div data-i18n="Tests">Tests</div>
                    </a>
                </li>
                <li class="menu-item {{ in_array(request()->path(), ['authors', 'addauthor', 'editauthor/' . request('id'), 'deleteauthor/' . request('id')]) ? 'active' : '' }}">
                    <a href="{{ route('authors.show') }}" class="menu-link">
                        <div data-i18n="Authors">Authors</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('') || request()->is('') ? 'active' : '' }}">
                    <a href="dashboards-ecommerce.html" class="menu-link">
                        <div data-i18n="Comments">Comments</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Orders -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Orders">Orders</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="layouts-collapsed-menu.html" class="menu-link">
                        <div data-i18n="All">All</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="layouts-content-navbar.html" class="menu-link">
                        <div data-i18n="New">New</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="layouts-content-navbar-with-sidebar.html" class="menu-link">
                        <div data-i18n="Complete">Complete</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="../horizontal-menu-template" class="menu-link" target="_blank">
                        <div data-i18n="Online Read">Online Read</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="layouts-without-menu.html" class="menu-link">
                        <div data-i18n="Online Order">Online Order</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Reports -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Reports">Reports</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="layouts-collapsed-menu.html" class="menu-link">
                        <div data-i18n="Book Reports">Book Reports</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="layouts-content-navbar.html" class="menu-link">
                        <div data-i18n="Payment Reports">Payment Reports</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="layouts-content-navbar-with-sidebar.html" class="menu-link">
                        <div data-i18n="Statistics Reports">Statistics Reports</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Slides -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Slides">Slides</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="layouts-collapsed-menu.html" class="menu-link">
                        <div data-i18n="Slides">Slides</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="layouts-content-navbar.html" class="menu-link">
                        <div data-i18n="Provinces">Provinces</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="layouts-content-navbar-with-sidebar.html" class="menu-link">
                        <div data-i18n="Districts">Districts</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="layouts-content-navbar-with-sidebar.html" class="menu-link">
                        <div data-i18n="Zones">Zones</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="layouts-content-navbar-with-sidebar.html" class="menu-link">
                        <div data-i18n="New Intro Video">New Intro Video</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="layouts-content-navbar-with-sidebar.html" class="menu-link">
                        <div data-i18n="Menus">Menus</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Settings -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Settings">Settings</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="layouts-collapsed-menu.html" class="menu-link">
                        <div data-i18n="Roles">Roles</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="layouts-content-navbar.html" class="menu-link">
                        <div data-i18n="Manages Access">Manages Access</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="layouts-content-navbar-with-sidebar.html" class="menu-link">
                        <div data-i18n="Translations">Translations</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="layouts-content-navbar-with-sidebar.html" class="menu-link">
                        <div data-i18n="Settings">Settings</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
<!-- / Menu -->
