<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4">

    <!-- Brand Logo -->
    <a href="{{ DiligentCreators('dashboard_url') }}{{ Auth::guard('admin')->user() ? '/admin' : '' }}"
        class="brand-link">
        <img src="{{ asset('/') }}{{ DiligentCreators('logo_small') }}" alt="{{ DiligentCreators('site_name') }}"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ DiligentCreators('site_name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('avatars/avatar.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ URL::to('admin/profile') }}"
                    class="d-block text-theme">{{ Auth::guard('admin')->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul id="sidebarNav" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                {{-- Profile --}}
                <li class="nav-item">
                    <a href="{{ URL::to('admin/profile') }}"
                        class="nav-link {{ request()->is('admin/profile/*') || request()->is('admin/profile') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-user"></i>
                        <p>Profile</p>
                    </a>
                </li>
                {{-- Clients --}}
                <li class="nav-item">
                    <a href="{{ URL::to('admin/clients') }}"
                        class="nav-link {{ request()->is('admin/clients/*') || request()->is('admin/clients') ? 'active' : '' }}">
                        <i class="fa fa-users nav-icon"></i>
                        <p>Clients</p>
                    </a>
                </li>
                {{-- IB Clients --}}
                <li class="nav-item">
                    <a href="{{ URL::to('admin/ib-clients') }}"
                        class="nav-link {{ request()->is('admin/ib-clients') ? 'active' : '' }}">
                        <i class="fa fa-user-tie nav-icon"></i>
                        <p>IB Clients</p>
                    </a>
                </li>
                {{-- Transaction --}}
                <li class="nav-item {{ request()->is('admin/transactions/*') ? 'menu-open' : '' }}">
                    <a href="javascript:void(0)"
                        class="nav-link {{ request()->is('admin/transactions/*') ? 'active' : '' }}">
                        <i class="fa fa-money-bill-transfer nav-icon"></i>
                        <p>Transaction
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/transactions/account-ledger') }}"
                                class="nav-link {{ request()->is('admin/transactions/account-ledger') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Account Ledger</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/transactions/internal-transfers') }}"
                                class="nav-link {{ request()->is('admin/transactions/internal-transfers') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Internal Transfers</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Clients --}}
                <li class="nav-item">
                    <a href="{{ URL::to('admin/payment-wallets') }}"
                        class="nav-link {{ request()->is('admin/payment-wallets') ? 'active' : '' }}">
                        <i class="fa fa-wallet nav-icon"></i>
                        <p>Payment Wallets</p>
                    </a>
                </li>
                {{-- MT5 Group --}}
                <li class="nav-item {{ request()->is('admin/mt5-groups/*') ? 'menu-open' : '' }}">
                    <a href="javascript:void(0)"
                        class="nav-link {{ request()->is('admin/mt5-groups/*') ? 'active' : '' }}">
                        <i class="fa fa-arrow-trend-up nav-icon"></i>
                        <p>MT5 Groups
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{ MT5Groups() }}
                    </ul>
                </li>
                {{-- Manage Users --}}
                <li
                    class="nav-item {{ request()->is('admin/manage-staff/*') || request()->is('admin/manage-staff') ? 'menu-open' : '' }}">
                    <a href="javascript:void(0)"
                        class="nav-link {{ request()->is('admin/manage-staff/*') || request()->is('admin/manage-staff') ? 'active' : '' }}">
                        <i class="fa fa-users-gear nav-icon"></i>
                        <p>Manage Staff
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/manage-staff/create') }}"
                                class="nav-link {{ request()->is('admin/manage-staff/create') ? 'active' : '' }}{{ request()->is('admin/manage-staff/create/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create New Staff</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/manage-staff/') }}"
                                class="nav-link {{ request()->is('admin/manage-staff') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Staff</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Manage Roles --}}
                <li
                    class="nav-item {{ request()->is('admin/manage-roles/*') || request()->is('admin/manage-roles') ? 'menu-open' : '' }}">
                    <a href="javascript:void(0)"
                        class="nav-link {{ request()->is('admin/manage-roles/*') || request()->is('admin/manage-roles') ? 'active' : '' }}">
                        <i class="fa fa-layer-group nav-icon"></i>
                        <p>Manage Roles
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/manage-roles/create') }}"
                                class="nav-link {{ request()->is('admin/manage-roles/create') ? 'active' : '' }}{{ request()->is('admin/manage-roles/create/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create New Role</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/manage-roles/') }}"
                                class="nav-link {{ request()->is('admin/manage-roles') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All User Roles</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Manage Departments --}}
                <li
                    class="nav-item {{ request()->is('admin/manage-departments/*') || request()->is('admin/manage-departments') ? 'menu-open' : '' }}">
                    <a href="javascript:void(0)"
                        class="nav-link {{ request()->is('admin/manage-departments/*') || request()->is('admin/manage-departments') ? 'active' : '' }}">
                        <i class="fa fa-people-group nav-icon"></i>
                        <p>Manage Departments
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/manage-departments/create') }}"
                                class="nav-link {{ request()->is('admin/manage-departments/create') ? 'active' : '' }}{{ request()->is('admin/manage-departments/create/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create New Department</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/manage-departments/') }}"
                                class="nav-link {{ request()->is('admin/manage-departments') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Departments</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Manage Status & Type --}}
                <li class="nav-item {{ request()->is('admin/manage-status/*') ? 'menu-open' : '' }}">
                    <a href="javascript:void(0)"
                        class="nav-link {{ request()->is('admin/manage-status/*') ? 'active' : '' }}">
                        <i class="fa fa-shapes nav-icon"></i>
                        <p>Manage Status & Type
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/manage-status/account-types') }}"
                                class="nav-link {{ request()->is('admin/manage-status/account-types') ? 'active' : '' }}
                            {{ request()->is('admin/manage-status/account-types/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Account Types</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/manage-status/account-status') }}"
                                class="nav-link {{ request()->is('admin/manage-status/account-status') ? 'active' : '' }}
                            {{ request()->is('admin/manage-status/account-status/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Account Status</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/manage-status/transaction-status') }}"
                                class="nav-link {{ request()->is('admin/manage-status/transaction-status') ? 'active' : '' }}
                            {{ request()->is('admin/manage-status/transaction-status/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Transaction Status</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/manage-status/kyc-status') }}"
                                class="nav-link {{ request()->is('admin/manage-status/kyc-status') ? 'active' : '' }}
                            {{ request()->is('admin/manage-status/kyc-status/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>KYC Status</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/manage-status/user-status') }}"
                                class="nav-link {{ request()->is('admin/manage-status/user-status') ? 'active' : '' }}
                            {{ request()->is('admin/manage-status/user-status/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User Status</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/manage-status/ib-status') }}"
                                class="nav-link {{ request()->is('admin/manage-status/ib-status') ? 'active' : '' }}
                            {{ request()->is('admin/manage-status/ib-status/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>IB Status</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/manage-status/ib-commissions') }}"
                                class="nav-link {{ request()->is('admin/manage-status/ib-commissions') ? 'active' : '' }}
                            {{ request()->is('admin/manage-status/ib-commissions/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>IB Commissions</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- App Settings --}}
                <li class="nav-item {{ request()->is('admin/app-settings/*') ? 'menu-open' : '' }}">
                    <a href="javascript:void(0)"
                        class="nav-link {{ request()->is('admin/app-settings/*') ? 'active' : '' }}">
                        <i class="fa fa-gear nav-icon"></i>
                        <p>App Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/app-settings/permissions') }}"
                                class="nav-link {{ request()->is('admin/app-settings/permissions') ? 'active' : '' }}{{ request()->is('admin/app-settings/permissions/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Permissions</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/app-settings/basic') }}"
                                class="nav-link {{ request()->is('admin/app-settings/basic') ? 'active' : '' }}{{ request()->is('admin/app-settings/basic/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Basic Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/app-settings/brand') }}"
                                class="nav-link {{ request()->is('admin/app-settings/brand') ? 'active' : '' }}{{ request()->is('admin/app-settings/brand/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Brand Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/app-settings/automate-transaction') }}"
                                class="nav-link {{ request()->is('admin/app-settings/automate-transaction') ? 'active' : '' }}{{ request()->is('admin/app-settings/automate-transaction/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Automate Transactions</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/app-settings/bank-account') }}"
                                class="nav-link {{ request()->is('admin/app-settings/bank-account') ? 'active' : '' }}{{ request()->is('admin/app-settings/bank-account/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bank Account</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/app-settings/google-recaptcha') }}"
                                class="nav-link {{ request()->is('admin/app-settings/google-recaptcha') ? 'active' : '' }}{{ request()->is('admin/app-settings/google-recaptcha/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Google reCaptcha</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Mail Settings --}}
                <li class="nav-item {{ request()->is('admin/mail-settings/*') ? 'menu-open' : '' }}">
                    <a href="javascript:void(0)"
                        class="nav-link {{ request()->is('admin/mail-settings/*') ? 'active' : '' }}">
                        <i class="fa fa-envelopes-bulk nav-icon"></i>
                        <p>Mail Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/mail-settings/email-setup') }}"
                                class="nav-link {{ request()->is('admin/mail-settings/email-setup') ? 'active' : '' }}{{ request()->is('admin/mail-settings/email-setup/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Email Setup</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- MT5 Settings --}}
                <li class="nav-item {{ request()->is('admin/mt5-settings/*') ? 'menu-open' : '' }}">
                    <a href="javascript:void(0)"
                        class="nav-link {{ request()->is('admin/mt5-settings/*') ? 'active' : '' }}">
                        <i class="fa fa-users-gear nav-icon"></i>
                        <p>MT5 Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/mt5-settings/basic') }}"
                                class="nav-link {{ request()->is('admin/mt5-settings/basic') ? 'active' : '' }}{{ request()->is('admin/mt5-settings/basic/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Basic Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/mt5-settings/downloads') }}"
                                class="nav-link {{ request()->is('admin/mt5-settings/downloads') ? 'active' : '' }}{{ request()->is('admin/mt5-settings/downloads/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Downloads</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/mt5-settings/web-trader') }}"
                                class="nav-link {{ request()->is('admin/mt5-settings/web-trader') ? 'active' : '' }}{{ request()->is('admin/mt5-settings/web-trader/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Web Trader</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Locations --}}
                <li class="nav-item {{ request()->is('admin/locations/*') ? 'menu-open' : '' }}">
                    <a href="javascript:void(0)"
                        class="nav-link {{ request()->is('admin/locations/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-earth-asia"></i>
                        <p>Locations
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/locations/countries') }}"
                                class="nav-link {{ request()->is('admin/locations/countries') || request()->is('admin/locations/countries/*') ? 'active' : '' }}
                            {{ request()->is('admin/settiongs/locations/countries/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Countries</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/locations/states') }}"
                                class="nav-link {{ request()->is('admin/locations/states') || request()->is('admin/locations/states/*') ? 'active' : '' }}
                                {{ request()->is('admin/settiongs/locations/states/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>States</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/locations/cities') }}"
                                class="nav-link {{ request()->is('admin/locations/cities') || request()->is('admin/locations/cities/*') ? 'active' : '' }}
                                {{ request()->is('admin/settiongs/locations/cities/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cities</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Log Activity --}}
                <li class="nav-item {{ request()->is('admin/log-activity/*') ? 'menu-open' : '' }}">
                    <a href="{{ URL::to('admin/log-activity') }}"
                        class="nav-link {{ request()->is('admin/log-activity/*') || request()->is('admin/log-activity') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-file-lines"></i>
                        <p>Log Activity
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/log-activity/admin') }}"
                                class="nav-link {{ request()->is('admin/log-activity/admin') || request()->is('admin/log-activity/admin/*') ? 'active' : '' }}
                                {{ request()->is('admin/settiongs/locations/states/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Admin Activity</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/log-activity/user') }}"
                                class="nav-link {{ request()->is('admin/log-activity/user') || request()->is('admin/log-activity/user/*') ? 'active' : '' }}
                                {{ request()->is('admin/settiongs/locations/states/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User Activity</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Logout --}}
                <li class="nav-item">
                    <a href="javascript:void(0)" onclick="$('#logout-form').submit();" class="nav-link">
                        <i class="fa fa-right-from-bracket nav-icon"></i>
                        <p>Logout</p>
                    </a>
                    {{-- Logout --}}
                    <form action="{{ route('admin.logout') }}" id="logout-form" method="POST">
                        @csrf
                        @method('POST')
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
