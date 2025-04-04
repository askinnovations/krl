 <!-- ========== Left Sidebar Start ========== -->
 <div class="vertical-menu">

<div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title" data-key="t-menu">Menu</li>

            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i data-feather="home"></i>
                    <span data-key="t-dashboard">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="has-arrow">
                    <i data-feather="truck"></i>
                    <span data-key="t-fleet">Fleet</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('admin.vehicles.index') }}" data-key="t-vehicles">Vehicles</a></li>
                    <li><a href="#" data-key="t-maintenance">Maintenance</a></li>
                    <li><a href="#" data-key="t-tyres">Tyres</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="has-arrow">
                <i data-feather="database"></i>
                <span data-key="t-master">Master</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('admin.users.index') }}" data-key="t-customer">Customer</a></li>
                </ul>
            </li>

            

            
        </ul>

       
    </div>
    <!-- Sidebar -->
</div>
</div>
<!-- Left Sidebar End -->
