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
        <!-- Dashboard -->
        <li class="menu-item {{ request()->routeIs('books.dashboard') ? 'active' : '' }}">
            <a href="{{ route('books.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        <!-- Content -->
        <li
            class="menu-item {{ request()->is('books*') || request()->is('tests*') || request()->is('authors*') || request()->is('comments*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div data-i18n="Content">Content</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('books*') ? 'active' : '' }}">
                    <a href="{{ route('books.index') }}" class="menu-link">
                        <div data-i18n="Books">Books</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('tests*') ? 'active' : '' }}">
                    <a href="{{ route('tests.show') }}" class="menu-link">
                        <div data-i18n="Tests">Tests</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('authors*') ? 'active' : '' }}">
                    <a href="{{ route('authors.show') }}" class="menu-link">
                        <div data-i18n="Authors">Authors</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('comments*') ? 'active' : '' }}">
                    <a href="{{ route('comments.show') }}" class="menu-link">
                        <div data-i18n="Comments">Comments</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Orders -->
        <li class="menu-item {{ request()->is('orders*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-store-alt"></i>
                <div data-i18n="Orders">Orders</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="All">All</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="New">New</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="Complete">Complete</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Settings -->
        <!-- Settings -->
        <li
            class="menu-item {{ request()->is('users*') || request()->is('roles*') || request()->is('privileges*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Settings">Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('users*') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}" class="menu-link">
                        <div data-i18n="Users">Users</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('roles*') ? 'active' : '' }}">
                    <a href="{{ route('roles.index') }}" class="menu-link">
                        <div data-i18n="Roles">Roles</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('privileges*') ? 'active' : '' }}">
                    <a href="{{ route('privileges.index') }}" class="menu-link">
                        <div data-i18n="Privileges">Privileges</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
