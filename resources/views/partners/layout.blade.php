<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Partner Portal - Royeli Travel')</title>
    
    <link rel="stylesheet" href="{{ asset('assets/css/user-modern.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #fce4ec 100%);
            min-height: 100vh;
        }

        .app-container {
            display: flex;
            min-height: 100vh;
        }

        /* Partner Sidebar */
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #880e4f 0%, #ad1457 100%);
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            z-index: 1000;
            transition: transform 0.3s ease;
            overflow-y: auto;
        }

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
        }

        .sidebar-header {
            padding: 2rem 1.5rem;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-logo img {
            width: 120px;
            height: auto;
            margin-bottom: 0.5rem;
        }

        .sidebar-logo h2 {
            color: white;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .partner-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.75rem;
            color: white;
            margin-top: 0.5rem;
        }

        .sidebar-nav {
            padding: 1.5rem 0;
        }

        .nav-section-title {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0 1.5rem;
            margin-bottom: 0.75rem;
            margin-top: 1.5rem;
        }

        .nav-section-title:first-child {
            margin-top: 0;
        }

        .nav-item {
            margin: 0.25rem 1rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.875rem 1rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transform: translateX(5px);
        }

        .nav-link.active {
            background: rgba(255, 255, 255, 0.15);
            color: white;
        }

        .nav-link i {
            width: 24px;
            font-size: 1.1rem;
            margin-right: 0.875rem;
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            flex: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Topbar */
        .topbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 1.25rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .topbar-left h3 {
            font-size: 1.25rem;
            color: #333;
            margin-bottom: 0.25rem;
        }

        .topbar-left p {
            font-size: 0.9rem;
            color: #666;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .logout-btn {
            padding: 0.5rem 1.25rem;
            background: linear-gradient(135deg, #f5576c 0%, #f093fb 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(245, 87, 108, 0.3);
        }

        /* Page Content */
        .page-content {
            flex: 1;
            padding: 2rem;
        }

        /* Mobile Responsive */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .menu-toggle {
                display: block;
            }
        }

        @media (max-width: 768px) {
            .topbar {
                padding: 1rem;
            }

            .page-content {
                padding: 1rem;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <div class="app-container">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="sidebar-logo">
                    <img src="https://royelimytravel.com/assets/web/images/logo.png" alt="Royeli Travel">
                    <h2>Partner Portal</h2>
                    <span class="partner-badge">
                        <i class="fas fa-handshake"></i> Partner
                    </span>
                </div>
            </div>

            <nav class="sidebar-nav">
                <div class="nav-section-title">Main Menu</div>
                
                <div class="nav-item">
                    <a href="{{ route('partner.dashboard') }}" class="nav-link {{ request()->routeIs('partner.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </div>

                <div class="nav-item">
                    <a href="{{ route('partner.bookings') }}" class="nav-link {{ request()->routeIs('partner.bookings') ? 'active' : '' }}">
                        <i class="fas fa-calendar-check"></i>
                        <span>My Bookings</span>
                    </a>
                </div>

                <div class="nav-item">
                    <a href="{{ route('partner.transactions') }}" class="nav-link {{ request()->routeIs('partner.transactions') ? 'active' : '' }}">
                        <i class="fas fa-receipt"></i>
                        <span>Transactions</span>
                    </a>
                </div>

                <div class="nav-section-title">Account</div>

                <div class="nav-item">
                    <a href="{{ route('partner.profile') }}" class="nav-link {{ request()->routeIs('partner.profile') ? 'active' : '' }}">
                        <i class="fas fa-user-circle"></i>
                        <span>Profile</span>
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Topbar -->
            <header class="topbar">
                <div class="topbar-left">
                    <h3>Welcome, {{ Auth::guard('partner')->user()->company_name }}!</h3>
                    <p>Manage your bookings and track your commissions</p>
                </div>
                <div class="topbar-right">
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::guard('partner')->user()->company_name, 0, 1)) }}
                    </div>
                    <form method="POST" action="{{ route('partner.logout') }}">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
            </header>

            <!-- Page Content -->
            <main class="page-content">
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
