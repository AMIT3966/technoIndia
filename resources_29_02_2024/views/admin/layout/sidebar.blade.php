
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{ (request()->is('admin/career*')) ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ (request()->is('admin/career*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-file-alt"></i>
                    <p>Career Management <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.collection.list.all') }}" class="nav-link {{ (request()->is('admin/career/collection*')) ? 'active active_nav_link' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Collections</p>
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
                    {{-- <li class="nav-item">
                        <a href="{{ route('admin.content.banner.list.all') }}" class="nav-link {{ (request()->is('admin/content/banner*')) ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Homepage Banner</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.content.home') }}" class="nav-link {{ (request()->is('admin/content/home*')) ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Home Page Content</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.content.about') }}" class="nav-link {{ (request()->is('admin/content/about*')) ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>About page</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.content.leads') }}" class="nav-link {{ (request()->is('admin/content/leads*')) ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Leads</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.content.contact') }}" class="nav-link {{ (request()->is('admin/content/contact*')) ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Contact page</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.content.epc') }}" class="nav-link {{ (request()->is('admin/content/epc*')) ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>EPC page</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.content.careers') }}" class="nav-link {{ (request()->is('admin/content/careers*')) ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Careers</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.content.settings') }}" class="nav-link {{ (request()->is('admin/content/settings*')) ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Initial Settings</p>
                        </a>
                    </li> --}}
                </ul>
            </li>
            {{-- <li class="nav-item {{ (request()->is('admin/content*')) ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ (request()->is('admin/content*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-file-alt"></i>
                    <p>Page content <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.content.seo.list.all') }}" class="nav-link {{ (request()->is('admin/content/seo*')) ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>SEO</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.content.banner.list.all') }}" class="nav-link {{ (request()->is('admin/content/banner*')) ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Homepage Banner</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.content.home') }}" class="nav-link {{ (request()->is('admin/content/home*')) ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Home Page Content</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.content.about') }}" class="nav-link {{ (request()->is('admin/content/about*')) ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>About page</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.content.leads') }}" class="nav-link {{ (request()->is('admin/content/leads*')) ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Leads</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.content.contact') }}" class="nav-link {{ (request()->is('admin/content/contact*')) ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Contact page</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.content.epc') }}" class="nav-link {{ (request()->is('admin/content/epc*')) ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>EPC page</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.content.careers') }}" class="nav-link {{ (request()->is('admin/content/careers*')) ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Careers</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.content.settings') }}" class="nav-link {{ (request()->is('admin/content/settings*')) ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Initial Settings</p>
                        </a>
                    </li>
                </ul>
            </li> --}}
            {{-- <li class="nav-item">
                <a href="{{ route('admin.product.list.all') }}" class="nav-link {{ (request()->is('admin/product*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-shopping-cart"></i>
                    <p>Product</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.nation_product.list.all') }}" class="nav-link {{ (request()->is('admin/nation-product*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-shopping-cart"></i>
                    <p>Nation Product</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.job.list') }}" class="nav-link {{ (request()->is('admin/job*')) ? 'active' : '' }}">
                    <i class="fa fa-link nav-icon"></i>
                    <p>Jobs</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.social_media.list.all') }}" class="nav-link {{ (request()->is('admin/social-media*')) ? 'active' : '' }}">
                    <i class="fa fa-link nav-icon"></i>
                    <p>Social Media</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.partner.list.all') }}" class="nav-link {{ (request()->is('admin/partner*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Clients</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.news.list.all') }}" class="nav-link {{ (request()->is('admin/news-category*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>News</p>
                </a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('logout-form').submit()">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </li>
        </ul>
    </nav>
            