

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
                    <i data-feather="package"></i>
                    <span data-key="t-consignment-booking">Consignment Booking</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('admin.orders.index') }}" data-key="t-order-booking">Order Booking</a></li>
                    <li><a href="{{ route('admin.consignments.index') }}" data-key="t-lr">LR / Consignment Note</a></li>
                    <li><a href="{{ route('admin.freight-bill.index') }}" data-key="t-freight-bill">Freight Bill</a></li>
                </ul>
            </li>
            
        </ul>

               
         
        </div>
        <!-- Sidebar -->
    </div>
</div>