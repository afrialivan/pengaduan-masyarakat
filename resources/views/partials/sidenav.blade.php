<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ $title == 'laporan' ? 'active' : '' }}" href="/dashboard/laporan">
                    <span data-feather="bar-chart-2"></span>
                    Reports
                </a>
            </li>
            @can('admin')
            <li class="nav-item">
                <a class="nav-link {{ $title == 'user' ? 'active' : '' }}" href="/dashboard/users">
                    <span data-feather="users"></span>
                    Users
                </a>
            </li>
            @endcan
            <li class="nav-item">
                <a class="nav-link" href="/logout">
                    <span data-feather="bar-chart-2"></span>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>
