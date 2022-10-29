<div class="left-side-menu">
    <div class="media user-profile mt-2 mb-2">
        <img src="assets/images/users/avatar-7.jpg" class="avatar-sm rounded-circle mr-2" alt="" />
        <img src="assets/images/users/avatar-7.jpg" class="avatar-xs rounded-circle mr-2" alt="" />
        <div class="media-body">
            <h6 class="pro-user-name mt-0 mb-0">{{ Auth::user()->name }}</h6>
            <span class="pro-user-desc">Administrator</span>
        </div>
        <div class="dropdown align-self-center profile-dropdown-menu">
            <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                aria-expanded="false">
                <span data-feather="chevron-down"></span>
            </a>
            <div class="dropdown-menu profile-dropdown">
                <a href="pages-profile.html" class="dropdown-item notify-item">
                    <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                    <span>My Account</span>
                </a>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i data-feather="settings" class="icon-dual icon-xs mr-2"></i>
                    <span>Settings</span>
                </a>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i data-feather="help-circle" class="icon-dual icon-xs mr-2"></i>
                    <span>Support</span>
                </a>

                <a href="pages-lock-screen.html" class="dropdown-item notify-item">
                    <i data-feather="lock" class="icon-dual icon-xs mr-2"></i>
                    <span>Lock Screen</span>
                </a>

                <div class="dropdown-divider"></div>

                <form method="POST" :style="" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link class="dropdown-item notify-item" :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i> {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
    <div class="sidebar-content">
        <div id="sidebar-menu" class="slimscroll-menu">
            <ul class="metismenu" id="menu-bar">
                <li class="menu-title">Navigation</li>
                <li>
                    <a href="index.html">
                        <i data-feather="home"></i>
                        <span class="badge badge-success float-right">1</span>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li class="menu-title">Apps</li>
                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="inbox"></i>
                        <span> Manage Post </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('category.list') }}">Category</a>
                        </li>
                        <li>
                            <a href="email-read.html">Sub-category</a>
                        </li>
                        <li>
                            <a href="email-compose.html">Compose</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="briefcase"></i>
                        <span> Projects </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="project-list.html">List</a>
                        </li>
                        <li>
                            <a href="project-detail.html">Detail</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="bookmark"></i>
                        <span> Tasks </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="task-list.html">List</a>
                        </li>
                        <li>
                            <a href="task-board.html">Kanban Board</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>