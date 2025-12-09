<!-- Sidebar Logo -->
<div class="sidebar-logo">
    <div class="sidebar-logo-content">
        <img src="https://royelimytravel.com/assets/web/images/logo.png" alt="Royeli Logo">
        <span class="sidebar-logo-text">Admin</span>
    </div>
</div>

<!-- Sidebar Navigation -->
<nav class="sidebar-nav" x-data="{ 
    visaOpen: false, 
    tourOpen: false, 
    hotelOpen: false, 
    cruiseOpen: false, 
    docOpen: false,
    bookingOpen: false,
    partnerOpen: false
}">
    <ul class="sidebar-menu">
        <!-- Dashboard -->
        <li class="sidebar-menu-item">
            <a href="{{ route('admin.dashboard') }}" 
               class="sidebar-menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-home sidebar-menu-icon"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Users -->
        <li class="sidebar-menu-item">
            <a href="{{ route('admin.users.index') }}" 
               class="sidebar-menu-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <i class="fas fa-users sidebar-menu-icon"></i>
                <span>Users</span>
            </a>
        </li>

        <!-- Payments -->
        <li class="sidebar-menu-item">
            <a href="{{ route('admin.payments') }}" 
               class="sidebar-menu-link {{ request()->routeIs('admin.payments') ? 'active' : '' }}">
                <i class="fas fa-credit-card sidebar-menu-icon"></i>
                <span>Payments</span>
            </a>
        </li>

        <!-- Wallet -->
        <li class="sidebar-menu-item">
            <a href="{{ route('admin.wallet-transactions') }}" 
               class="sidebar-menu-link {{ request()->routeIs('admin.wallet-transactions') ? 'active' : '' }}">
                <i class="fas fa-wallet sidebar-menu-icon"></i>
                <span>Wallet</span>
            </a>
        </li>

        <!-- Visa Services (Collapsible) -->
        <li class="sidebar-menu-item">
            <button @click="visaOpen = !visaOpen" 
                    class="sidebar-submenu-toggle"
                    :class="{ 'active': visaOpen }">
                <div class="flex items-center">
                    <i class="fas fa-passport sidebar-menu-icon"></i>
                    <span>Visa Services</span>
                </div>
                <i class="fas fa-chevron-down submenu-chevron" :class="{ 'rotated': visaOpen }"></i>
            </button>
            <ul class="sidebar-submenu" :class="{ 'open': visaOpen }" x-cloak>
                <li><a href="{{ route('admin.visas.index') }}" class="sidebar-submenu-link">All Visas</a></li>
                <li><a href="{{ route('admin.visas.create') }}" class="sidebar-submenu-link">Create Visa</a></li>
            </ul>
        </li>

        <!-- Tour Packages (Collapsible) -->
        <li class="sidebar-menu-item">
            <button @click="tourOpen = !tourOpen" 
                    class="sidebar-submenu-toggle"
                    :class="{ 'active': tourOpen }">
                <div class="flex items-center">
                    <i class="fas fa-map-marked-alt sidebar-menu-icon"></i>
                    <span>Tour Packages</span>
                </div>
                <i class="fas fa-chevron-down submenu-chevron" :class="{ 'rotated': tourOpen }"></i>
            </button>
            <ul class="sidebar-submenu" :class="{ 'open': tourOpen }" x-cloak>
                <li><a href="{{ route('admin.tours.index') }}" class="sidebar-submenu-link">All Tours</a></li>
                <li><a href="{{ route('admin.tours.create') }}" class="sidebar-submenu-link">Create Tour</a></li>
            </ul>
        </li>

        <!-- Hotels (Collapsible) -->
        <li class="sidebar-menu-item">
            <button @click="hotelOpen = !hotelOpen" 
                    class="sidebar-submenu-toggle"
                    :class="{ 'active': hotelOpen }">
                <div class="flex items-center">
                    <i class="fas fa-hotel sidebar-menu-icon"></i>
                    <span>Hotels</span>
                </div>
                <i class="fas fa-chevron-down submenu-chevron" :class="{ 'rotated': hotelOpen }"></i>
            </button>
            <ul class="sidebar-submenu" :class="{ 'open': hotelOpen }" x-cloak>
                <li><a href="{{ route('admin.hotels.index') }}" class="sidebar-submenu-link">All Hotels</a></li>
                <li><a href="{{ route('admin.hotels.create') }}" class="sidebar-submenu-link">Create Hotel</a></li>
            </ul>
        </li>

        <!-- Cruises (Collapsible) -->
        <li class="sidebar-menu-item">
            <button @click="cruiseOpen = !cruiseOpen" 
                    class="sidebar-submenu-toggle"
                    :class="{ 'active': cruiseOpen }">
                <div class="flex items-center">
                    <i class="fas fa-ship sidebar-menu-icon"></i>
                    <span>Cruises</span>
                </div>
                <i class="fas fa-chevron-down submenu-chevron" :class="{ 'rotated': cruiseOpen }"></i>
            </button>
            <ul class="sidebar-submenu" :class="{ 'open': cruiseOpen }" x-cloak>
                <li><a href="{{ route('admin.cruises.index') }}" class="sidebar-submenu-link">All Cruises</a></li>
                <li><a href="{{ route('admin.cruises.create') }}" class="sidebar-submenu-link">Create Cruise</a></li>
            </ul>
        </li>

        <!-- Bookings (Collapsible) -->
        <li class="sidebar-menu-item">
            <button @click="bookingOpen = !bookingOpen" 
                    class="sidebar-submenu-toggle"
                    :class="{ 'active': bookingOpen }">
                <div class="flex items-center">
                    <i class="fas fa-calendar-check sidebar-menu-icon"></i>
                    <span>Bookings</span>
                </div>
                <i class="fas fa-chevron-down submenu-chevron" :class="{ 'rotated': bookingOpen }"></i>
            </button>
            <ul class="sidebar-submenu" :class="{ 'open': bookingOpen }" x-cloak>
                <li><a href="{{ route('admin.bookings.index') }}" class="sidebar-submenu-link">All Bookings</a></li>
                <li><a href="{{ route('admin.bookings.pending') }}" class="sidebar-submenu-link">Pending</a></li>
                <li><a href="{{ route('admin.bookings.confirmed') }}" class="sidebar-submenu-link">Confirmed</a></li>
            </ul>
        </li>

        <!-- Partners (Collapsible) -->
        <li class="sidebar-menu-item">
            <button @click="partnerOpen = !partnerOpen" 
                    class="sidebar-submenu-toggle"
                    :class="{ 'active': partnerOpen }">
                <div class="flex items-center">
                    <i class="fas fa-handshake sidebar-menu-icon"></i>
                    <span>Partners</span>
                </div>
                <i class="fas fa-chevron-down submenu-chevron" :class="{ 'rotated': partnerOpen }"></i>
            </button>
            <ul class="sidebar-submenu" :class="{ 'open': partnerOpen }" x-cloak>
                <li><a href="{{ route('admin.partners.index') }}" class="sidebar-submenu-link">All Partners</a></li>
                <li><a href="{{ route('admin.partners.pending') }}" class="sidebar-submenu-link">Pending Approval</a></li>
            </ul>
        </li>

        <!-- Documentation (Collapsible) -->
        <li class="sidebar-menu-item">
            <button @click="docOpen = !docOpen" 
                    class="sidebar-submenu-toggle"
                    :class="{ 'active': docOpen }">
                <div class="flex items-center">
                    <i class="fas fa-file-alt sidebar-menu-icon"></i>
                    <span>Documentation</span>
                </div>
                <i class="fas fa-chevron-down submenu-chevron" :class="{ 'rotated': docOpen }"></i>
            </button>
            <ul class="sidebar-submenu" :class="{ 'open': docOpen }" x-cloak>
                <li><a href="{{ route('admin.documentation.index') }}" class="sidebar-submenu-link">All Docs</a></li>
                <li><a href="{{ route('admin.documentation.create') }}" class="sidebar-submenu-link">Create Doc</a></li>
            </ul>
        </li>

        <!-- Settings -->
        <li class="sidebar-menu-item">
            <a href="{{ route('admin.settings') }}" 
               class="sidebar-menu-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                <i class="fas fa-cog sidebar-menu-icon"></i>
                <span>Settings</span>
            </a>
        </li>

        <!-- Logs -->
        <li class="sidebar-menu-item">
            <a href="{{ route('admin.logs') }}" 
               class="sidebar-menu-link {{ request()->routeIs('admin.logs') ? 'active' : '' }}">
                <i class="fas fa-list-alt sidebar-menu-icon"></i>
                <span>Activity Logs</span>
            </a>
        </li>

        <!-- Backups -->
        <li class="sidebar-menu-item">
            <a href="{{ route('admin.backups') }}" 
               class="sidebar-menu-link {{ request()->routeIs('admin.backups') ? 'active' : '' }}">
                <i class="fas fa-database sidebar-menu-icon"></i>
                <span>Backups</span>
            </a>
        </li>
    </ul>
</nav>

<!-- Sidebar User Profile -->
<div class="sidebar-user">
    <div class="sidebar-user-content">
        <div class="sidebar-user-avatar">
            {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
        </div>
        <div class="sidebar-user-info">
            <div class="sidebar-user-name">{{ auth()->user()->name ?? 'Admin' }}</div>
            <div class="sidebar-user-role">Administrator</div>
        </div>
    </div>
</div> 