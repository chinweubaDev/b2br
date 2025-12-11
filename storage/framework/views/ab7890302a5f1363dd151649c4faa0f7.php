<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Royeli Travel Portal'); ?></title>
    
    <!-- Modern CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/user-modern.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-body);
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }

        .app-container {
            display: flex;
            min-height: 100vh;
        }

        /* Modern Sidebar */
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #141E30 0%, #243B55 100%);
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
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transform: translateX(5px);
        }

        .nav-link:hover::before {
            transform: scaleY(1);
        }

        .nav-link.active {
            background: rgba(255, 255, 255, 0.15);
            color: white;
        }

        .nav-link.active::before {
            transform: scaleY(1);
        }

        .nav-link i {
            width: 24px;
            font-size: 1.1rem;
            margin-right: 0.875rem;
        }

        .nav-link .badge {
            margin-left: auto;
            padding: 0.25rem 0.5rem;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        /* Wallet Card in Sidebar */
        .sidebar-wallet {
            margin: 1.5rem 1rem;
            padding: 1.5rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 16px;
            color: white;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        }

        .wallet-label {
            font-size: 0.85rem;
            opacity: 0.9;
            margin-bottom: 0.5rem;
        }

        .wallet-amount {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .wallet-btn {
            display: block;
            width: 100%;
            padding: 0.625rem;
            background: white;
            color: #667eea;
            text-align: center;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .wallet-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
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

        .topbar-left {
            display: flex;
            align-items: center;
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--color-gray-700);
            cursor: pointer;
            margin-right: 1rem;
        }

        .topbar-welcome h3 {
            font-size: 1.25rem;
            color: var(--color-gray-900);
            margin-bottom: 0.25rem;
        }

        .topbar-welcome p {
            font-size: 0.9rem;
            color: var(--color-gray-500);
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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

            .topbar-welcome h3 {
                font-size: 1.1rem;
            }

            .topbar-welcome p {
                display: none;
            }

            .page-content {
                padding: 1rem;
            }
        }

        /* Mobile Overlay */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .sidebar-overlay.active {
            display: block;
        }
    </style>
    
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
    <div class="app-container">
        <!-- Sidebar Overlay for Mobile -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="sidebar-logo">
                    <img src="https://royelimytravel.com/assets/web/images/logo.png" alt="Royeli Travel">
                    <h2>B2B Portal</h2>
                </div>
            </div>

            <nav class="sidebar-nav">
                <div class="nav-section-title">Main Menu</div>
                
                <div class="nav-item">
                    <a href="<?php echo e(route('dashboard')); ?>" class="nav-link <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </div>

                <div class="nav-section-title">Services</div>

                <div class="nav-item">
                    <a href="<?php echo e(route('tours.index')); ?>" class="nav-link <?php echo e(request()->routeIs('tours.*') ? 'active' : ''); ?>">
                        <i class="fas fa-map-marked-alt"></i>
                        <span>Tour Packages</span>
                    </a>
                </div>

                <div class="nav-item">
                    <a href="<?php echo e(route('visas.index')); ?>" class="nav-link <?php echo e(request()->routeIs('visas.*') ? 'active' : ''); ?>">
                        <i class="fas fa-passport"></i>
                        <span>Visa Services</span>
                    </a>
                </div>

                <div class="nav-item">
                    <a href="<?php echo e(route('hotels.index')); ?>" class="nav-link <?php echo e(request()->routeIs('hotels.*') ? 'active' : ''); ?>">
                        <i class="fas fa-hotel"></i>
                        <span>Hotels</span>
                        <span class="badge">New</span>
                    </a>
                </div>

                <div class="nav-item">
                    <a href="<?php echo e(route('cruises.index')); ?>" class="nav-link <?php echo e(request()->routeIs('cruises.*') ? 'active' : ''); ?>">
                        <i class="fas fa-ship"></i>
                        <span>Cruises</span>
                    </a>
                </div>

                <div class="nav-item">
                    <a href="<?php echo e(route('documentation.index')); ?>" class="nav-link <?php echo e(request()->routeIs('documentation.*') ? 'active' : ''); ?>">
                        <i class="fas fa-file-alt"></i>
                        <span>Documentation</span>
                    </a>
                </div>
            </nav>

            <!-- Wallet Card -->
            <div class="sidebar-wallet">
                <div class="wallet-label">Wallet Balance</div>
                <div class="wallet-amount"><?php echo e(($user ?? auth()->user())->formatted_wallet_balance ?? '₦0.00'); ?></div>
                <a href="<?php echo e(route('wallet.fund')); ?>" class="wallet-btn">
                    <i class="fas fa-plus"></i> Fund Wallet
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Topbar -->
            <header class="topbar">
                <div class="topbar-left">
                    <button class="menu-toggle" id="menuToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="topbar-welcome">
                        <h3>Welcome, <?php echo e(auth()->user()->name); ?>!</h3>
                        <p>Start exploring your business opportunities</p>
                    </div>
                </div>
                <div class="topbar-right">
                    <div class="topbar-user">
                        <div class="user-avatar">
                            <?php echo e(strtoupper(substr(auth()->user()->name, 0, 1))); ?>

                        </div>
                    </div>
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="logout-btn">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
            </header>

            <!-- Page Content -->
            <main class="page-content">
                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Mobile Menu Toggle
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        if (menuToggle) {
            menuToggle.addEventListener('click', () => {
                sidebar.classList.toggle('active');
                sidebarOverlay.classList.toggle('active');
            });
        }

        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', () => {
                sidebar.classList.remove('active');
                sidebarOverlay.classList.remove('active');
            });
        }
    </script>
    
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH /Users/simeonuba/b2br/resources/views/layouts/app.blade.php ENDPATH**/ ?>