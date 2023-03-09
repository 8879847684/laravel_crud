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
            <li class="sidebar-item {{ $controller === 'vps' ? 'active': '' }}">
                <a data-bs-target="#vps-sidebar" data-bs-toggle="collapse" class="sidebar-link">
                    <i class="align-middle" data-feather="target"></i>
                    <span class="align-middle">VPS</span>
                </a>
                <ul id="vps-sidebar" class="sidebar-dropdown list-unstyled collapse {{ $controller === 'vps' ? 'show': '' }}" data-bs-parent="#sidebar">
                    <li class="sidebar-item {{ $controller === 'vps' && $action === 'create' ? 'active': '' }}">
                        <a class="sidebar-link" href="{{ route('vps.create') }}">Add VPS</a>
                    </li>
                    <li class="sidebar-item {{ $controller === 'vps' && $action === 'index' ? 'active': '' }}">
                        <a class="sidebar-link" href="{{ route('vps.index') }}">VPS List</a>
                    </li>
                     <!--  <li class="sidebar-item {{ $controller === 'payments' && $action === 'index' ? 'active': '' }}">
                        <a class="sidebar-link" href="{{ route('payments.index') }}">P List</a>
                    </li> -->
                </ul>
            </li>
            <li class="sidebar-item {{ $controller === 'payments' ? 'active': '' }}">
                <a data-bs-target="#payments-sidebar" data-bs-toggle="collapse" class="sidebar-link">
                    <i class="align-middle" data-feather="target"></i>
                    <span class="align-middle">Payments</span>
                </a>
                <ul id="payments-sidebar" class="sidebar-dropdown list-unstyled collapse {{ $controller === 'payments' ? 'show': '' }}" data-bs-parent="#sidebar">
                    <li class="sidebar-item {{ $controller === 'payments' && $action === 'create' ? 'active': '' }}">
                        <a class="sidebar-link" href="{{ route('payments.create') }}">Add Payments</a>
                    </li>
                    <li class="sidebar-item {{ $controller === 'payments' && $action === 'index' ? 'active': '' }}">
                        <a class="sidebar-link" href="{{ route('payments.index') }}">Payments List</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item {{ $controller === 'bills' ? 'active': '' }}">
                <a data-bs-target="#unbilled-sidebar" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="credit-card"></i>
                    <span class="align-middle">UNBILLED</span>
                </a>
                <ul id="unbilled-sidebar" class="sidebar-dropdown list-unstyled collapse {{ $controller === 'bills' ? 'show': '' }}" data-bs-parent="#sidebar">
                    <li class="sidebar-item {{ $controller === 'bills' && $action === 'create' ? 'active': '' }}">
                        <a class="sidebar-link" href="{{ route('bills.create') }}">Add Unbilled</a>
                    </li>
                    <li class="sidebar-item {{ $controller === 'bills' && $action === 'index' ? 'active': '' }}">
                        <a class="sidebar-link" href="{{ route('bills.index') }}">Unbilled / Inbound List</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item {{ $controller === 'vehicles' ? 'active': '' }}">
                <a data-bs-target="#vehicles-sidebar" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="cpu"></i>
                    <span class="align-middle">VEHICLE</span>
                </a>
                <ul id="vehicles-sidebar" class="sidebar-dropdown list-unstyled collapse {{ $controller === 'vehicles' ? 'show': '' }}" data-bs-parent="#sidebar">
                    <li class="sidebar-item {{ $controller === 'vehicles' && $action === 'create' ? 'active': '' }}">
                        <a class="sidebar-link" href="{{ route('vehicles.create') }}">Add Vehicle</a>
                    </li>
                    <li class="sidebar-item {{ $controller === 'vehicles' && $action === 'index' ? 'active': '' }}">
                        <a class="sidebar-link" href="{{ route('vehicles.index') }}">Vehicle List</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#banking-system-sidebar" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="dollar-sign"></i>
                    <span class="align-middle">BANKING</span>
                </a>
                <ul id="banking-system-sidebar" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="#">Add payment</a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="#">Payment List</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#scan-copy-sidebar" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="copy"></i>
                    <span class="align-middle">SCAN</span>
                </a>
                <ul id="scan-copy-sidebar" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="#">Add scan copy</a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="#">Scan Copy List</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#outbound-sidebar" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="wind"></i>
                    <span class="align-middle">OUTBOUND</span>
                </a>
                <ul id="outbound-sidebar" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="#">Add Outbound</a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="#">Outbound List</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>