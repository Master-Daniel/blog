<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="/" class="logo-link nk-sidebar-logo">
                <h3>{{ config('app.name', 'Soft Delta') }}</h3>
                {{-- <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark"> --}}
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="javascript:void(0)" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
        </div>
    </div>
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="{{ route('dashboard') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                            <span class="nk-menu-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Manage Blog</h6>
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href="{{ route('category.list') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-view-list-fill"></em></span>
                            <span class="nk-menu-text">Category</span>
                        </a>
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-view-list-fill"></em></span>
                            <span class="nk-menu-text">Posts</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('create.post') }}" class="nk-menu-link"><span class="nk-menu-text">Create Post</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('list.post') }}" class="nk-menu-link"><span class="nk-menu-text">List Posts</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>