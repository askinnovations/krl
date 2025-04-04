

<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="{{ route('admin.dashboard.index') }}">
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
                        <li><a href="{{ route('admin.order-booking.index') }}" data-key="t-order-booking">Order Booking</a></li>
                        <li><a href="{{ route('admin.consignment_note.index') }}" data-key="t-lr">LR / Consignment Note</a></li>
                        <li><a href="{{ route('admin.freight_bill.index') }}" data-key="t-freight-bill">Freight Bill</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="has-arrow">
                        <i data-feather="database"></i>
                        <span data-key="t-warehouse">Warehouse</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.warehouse.index') }}" data-key="t-warehouse-list">Warehouse List</a></li>
                        <li><a href="{{ route('admin.stock_transfer.index') }}" data-key="t-stock-transfer">Stock In/Transfer/Out</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="has-arrow">
                        <i data-feather="file-text"></i>
                        <span data-key="t-accounts">Accounts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="javascript:void(0);" class="has-arrow" data-key="t-voucher">Voucher</a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="voucher-sales.html" data-key="t-voucher-sales">Sales</a></li>
                                <li><a href="purchase.html" data-key="t-purchase">Purchase</a></li>
                                <li><a href="for-tally.html" data-key="t-for-tally">For Tally</a></li>
                            </ul>
                        </li>
                        <li><a href="ledgers.html" data-key="t-ledgers">Ledgers</a></li>
                        <li><a href="accounts-receivable.html" data-key="t-accounts-receivable">Accounts
                                Receivable</a></li>
                        <li><a href="accounts-payable.html" data-key="t-accounts-payable">Accounts Payable</a>
                        </li>
                        <li><a href="profit-loss.html" data-key="t-profit-loss">Profit & Loss Statement</a></li>
                        <li><a href="balance-sheet.html" data-key="t-balance-sheet">Balance Sheet</a></li>
                        <li><a href="cash-flow.html" data-key="t-cash-flow">Cash Flow</a></li>
                        <li><a href="fund-flow.html" data-key="t-fund-flow">Fund Flow</a></li>
                        <li><a href="tds.html" data-key="t-tds">TDS</a></li>
                        <li><a href="gst.html" data-key="t-gst">GST</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span data-key="t-hr">HR</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.employess.index') }}" data-key="t-employees">Employees</a></li>
                        <li><a href="{{ route('admin.drivers.index') }}" data-key="t-drivers">Drivers</a></li>
                        <li><a href="{{ route('admin.attendance.index') }}" data-key="t-attendance">Attendance</a></li>
                        <li><a href="{{ route('admin.payroll.index') }}" data-key="t-payroll">Payroll</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="has-arrow">
                        <i data-feather="truck"></i>
                        <span data-key="t-fleet">Fleet</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="vehicle.html" data-key="t-vehicles">Vehicles</a></li>
                        <li><a href="{{ route('admin.maintenance.index') }}" data-key="t-maintenance">Maintenance</a></li>
                        <li><a href="{{ route('admin.tyres.index') }}" data-key="t-tyres">Tyres</a></li>
                    </ul>
                </li>

                <li>
                    <a href="task-management.html">
                        <i data-feather="clipboard"></i>
                        <span data-key="t-task-management">Task Management</span>
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0);" class="has-arrow">
                        <i data-feather="database"></i>
                        <span data-key="t-master">Master</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="customer.html" data-key="t-customer">Customer</a></li>
                        <li><a href="vendor.html" data-key="t-vendor">Vendor</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="has-arrow">
                        <i data-feather="bar-chart-2"></i>
                        <span data-key="t-reports">Reports</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="order-report.html" data-key="t-order-report">Order Report</a></li>
                        <li><a href="lr-report.html" data-key="t-lr-report">LR Report</a></li>
                        <li><a href="freight-bill-report.html" data-key="t-freight-bill-report">Freight Bill
                                Report</a></li>
                    </ul>
                </li>

                <li>
                    <a href="tabs_view.html">
                        <i data-feather="clipboard"></i>
                        <span data-key="t-task-management">Tabs View</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>