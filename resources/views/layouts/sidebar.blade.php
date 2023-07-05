<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4">

    <!-- Brand Logo -->
    <a href="{{ DiligentCreators('site_url') }}" class="brand-link">
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
                <a href="{{ URL::to('profile') }}" class="d-block text-theme">{{ auth()->user()->first_name }}
                    {{ auth()->user()->last_name }}</a>
            </div>
        </div>

        @if (Auth::guard('admin')->user())
            <div class="user-panel mt-0 pb-2 mb-2">
                <div class="info  py-0 px-1">
                    <a href="{{ URL::to('admin/login-back') }}" class="d-block btn btn-primary btn-theme">
                        Login as {{ Auth::guard('admin')->user()->name }}
                    </a>
                </div>
            </div>
        @endif

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul id="sidebarNav" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                {{-- Profile --}}
                <li class="nav-item">
                    <a href="{{ URL::to('profile') }}"
                        class="nav-link {{ request()->is('profile/*') || request()->is('profile') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-user"></i>
                        <p>Profile</p>
                    </a>
                </li>

                {{-- Wallet --}}
                <li class="nav-item">
                    <a href="{{ URL::to('wallet') }}"
                        class="nav-link {{ request()->is('wallet/*') || request()->is('wallet') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-wallet"></i>
                        <p>Wallet</p>
                    </a>
                </li>

                {{-- Deposit / Withdraw --}}
                <li class="nav-item {{ request()->is('deposit-withdraw/*') ? 'menu-open' : '' }}">
                    <a href="javascript:void(0)"
                        class="nav-link {{ request()->is('deposit-withdraw/*') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-piggy-bank"></i>
                        <p>Deposit / Withdraw
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to('deposit-withdraw/wallet-ledger') }}"
                                class="nav-link {{ request()->is('deposit-withdraw/wallet-ledger') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Wallet Ledger</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('deposit-withdraw/deposit-fund') }}"
                                class="nav-link {{ request()->is('deposit-withdraw/deposit-fund') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Deposit Fund</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('deposit-withdraw/withdraw-fund') }}"
                                class="nav-link {{ request()->is('deposit-withdraw/withdraw-fund') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Withdraw Fund</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Internal Transfers --}}
                <li class="nav-item {{ request()->is('internal-transfer/*') ? 'menu-open' : '' }}">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fa-solid fa-money-bill-transfer"></i>
                        <p>Internal Transfers
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to('internal-transfer/transfer-history') }}"
                                class="nav-link {{ request()->is('internal-transfer/transfer-history') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Transfer History</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('internal-transfer/wallet-to-mt5') }}"
                                class="nav-link {{ request()->is('internal-transfer/wallet-to-mt5') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Wallet to MT5</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('internal-transfer/mt5-to-wallet') }}"
                                class="nav-link {{ request()->is('internal-transfer/mt5-to-wallet') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>MT5 to Wallet</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Online Chat --}}
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fa-solid fa-headset"></i>
                        <p>Online Chat
                        </p>
                    </a>
                </li>

                {{-- Web Trader --}}
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fa-solid fa-window-restore"></i>
                        <p>Web Trader
                        </p>
                    </a>
                </li>

                {{-- Downloads --}}
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fa-solid fa-window-restore"></i>
                        <p>Downloads
                        </p>
                    </a>
                </li>

                {{-- Logout --}}
                <li class="nav-item">
                    <a href="javascript:void(0)" onclick="$('#logout-form').submit();"
                        class="nav-link {{ request()->is('logout') ? 'active' : '' }}">
                        <i class="fa fa-right-from-bracket nav-icon"></i>
                        <p>Logout</p>
                    </a>
                    {{-- Logout --}}
                    <form action="{{ route('logout') }}" id="logout-form" method="POST">
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
