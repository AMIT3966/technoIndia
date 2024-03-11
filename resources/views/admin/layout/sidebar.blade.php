<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <!-- Carrer Management -->
        <li class="nav-item {{ (request()->is('admin/career*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/career*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>Career Management <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.collection.list.all') }}" class="nav-link {{ (request()->is('admin/career/posts*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Posts</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.unit.list.all') }}" class="nav-link {{ (request()->is('admin/career/unit*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Units</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.subject.list.all') }}" class="nav-link {{ (request()->is('admin/career/subject*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Subjects</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.job_category.list.all') }}" class="nav-link {{ (request()->is('admin/career/job-category*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Job Categories</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.job.list') }}" class="nav-link {{ (request()->is('admin/career/job-vacancy*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Job Vacancies</p>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Personal Management -->
        <li class="nav-item {{ (request()->is('admin/career*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/career*')) ? 'inactive' : '' }}">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>Personal Management <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.schedulecontent.list.all') }}" class="nav-link {{ (request()->is('admin/career/schedulecontent*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Schedule Content</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.class.list.all') }}" class="nav-link {{ (request()->is('admin/career/class*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Class</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.facility.list.all') }}" class="nav-link {{ (request()->is('admin/career/facility*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Facilities List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.event.list.all') }}" class="nav-link {{ (request()->is('admin/career/event*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Event Management</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.department.list.all') }}" class="nav-link {{ (request()->is('admin/career/department*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Department</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.faculty.list.all') }}" class="nav-link {{ (request()->is('admin/career/faculty*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Faculty</p>
                    </a>
                </li>
            </ul>
        </li>
        </li>
        <li class="nav-item {{ (request()->is('admin/user/application*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/user/application*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>User Application <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.user.application.list') }}" class="nav-link {{ (request()->is('admin/user/application/list*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Applications</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('logout-form').submit()">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                Logout
            </a>
        </li>
    </ul>
</nav>