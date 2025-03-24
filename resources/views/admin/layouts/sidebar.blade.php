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
                <a href="{{ route('admin.users') }}">
                    <i data-feather="users"></i>
                    <span data-key="t-dashboard">Profile</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.complaint.index') }}">
                    <i data-feather="share-2"></i>
                    <span data-key="t-dashboard">complaint</span>
                </a>
            </li>
        </ul>

       
    </div>
    <!-- Sidebar -->
</div>
</div>
<!-- Left Sidebar End -->
