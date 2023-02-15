<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item ">
            <a class="nav-link {{ request()->is('admin/dashboard*') ? '' : 'collapsed' }}"
                href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-heading">Master</li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/company*') ? '' : 'collapsed' }}"
                href="{{ route('admin.company.index') }}">
                <i class="ri-list-check"></i>
                <span>Companies</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/employee*') ? '' : 'collapsed' }}"
                href="{{ route('admin.employee.index') }}">
                <i class="ri-admin-fill"></i>
                <span>Employees</span>
            </a>
        </li>

        <li class="nav-heading">Settings</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="ri-list-settings-fill"></i><span>Admin Settings</span>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a class="nav-link {{ request()->is('admin/profile*') ? '' : 'collapsed' }}"
                        href="{{ route('admin.profile.index') }}">
                        <i class="bi bi-person"></i>
                        <span>Profile</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
