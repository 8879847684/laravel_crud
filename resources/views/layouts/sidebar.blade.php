<?php 
$controllerAction = Route::currentRouteName();
list($controller, $action) = explode('.', $controllerAction);
?>
<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('dashboard.index') }}">
            <span class="sidebar-brand-text align-middle">
                Transportation
            </span>
            <svg class="sidebar-brand-icon align-middle" width="32px" height="32px" viewBox="0 0 24 24" fill="none"
                stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="miter" color="#FFFFFF"
                style="margin-left: -3px">
                <path d="M12 4L20 8.00004L12 12L4 8.00004L12 4Z"></path>
                <path d="M20 12L12 16L4 12"></path>
                <path d="M20 16L12 20L4 16"></path>
            </svg>
        </a>

        <div class="sidebar-user">
            <div class="d-flex justify-content-center">
                <div class="flex-shrink-0">
                    <img src="{{ asset('public/images/avatar.jpg') }}" alt="Avatar" class="avatar img-fluid rounded me-1" />
                </div>
                @if(Auth::user())
                    <div class="flex-grow-1 ps-2">
                        <a class="sidebar-user-title dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-start">
                            <a class="dropdown-item" href="#">
                                <i class="align-middle me-1" data-feather="user"></i>
                                Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <form class="form-inline" action="{{ route('login.logout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn mb-1">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i> Log out
                                </button>
                            </form>
                        </div>
                        <div class="sidebar-user-subtitle">{{ Auth::user()->role }}</div>
                    </div>
                @endif
            </div>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-item {{ $controller === 'vendors' ? 'active': '' }}">
                <a data-bs-target="#vendors-sidebar" data-bs-toggle="collapse" class="sidebar-link">
                    <i class="align-middle" data-feather="target"></i>
                    <span class="align-middle">Vendors</span>
                </a>
                <ul id="vendors-sidebar" class="sidebar-dropdown list-unstyled collapse {{ $controller === 'vendors' ? 'show': '' }}" data-bs-parent="#sidebar">
                    <li class="sidebar-item {{ $controller === 'vendors' && $action === 'create' ? 'active': '' }}">
                        <a class="sidebar-link" href="{{ route('vendors.create') }}">Add vendor</a>
                    </li>
                    <li class="sidebar-item {{ $controller === 'vendors' && $action === 'index' ? 'active': '' }}">
                        <a class="sidebar-link" href="{{ route('vendors.index') }}">Vendor List</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>