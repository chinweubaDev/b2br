<!DOCTYPE html>
<html lang="en" data-startbar="light" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Royeli Travel Portal')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('assets/css/portal.css') }}" rel="stylesheet">
                      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}">

     <!-- App css -->
     <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
     <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
     <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Additional CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .text-dark {
    --bs-text-opacity: 1;
    color: rgb(0 0 0) !important;
}
</style>
    @stack('styles')
</head>
<body class="bg-gray-50" x-data="{ sidebarOpen: false }">
    <div class="min-h-screen flex">
        <!-- Mobile sidebar overlay -->
        <div x-show="sidebarOpen" 
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-gray-600 bg-opacity-75 z-40 lg:hidden"
             @click="sidebarOpen = false">
        </div>
        <div class="startbar d-print-none">
            <!--start brand-->
            <div class="brand">
                <a href="" class="logo">
                    <span>
                        <img src="https://royelimytravel.com/assets/web/images/logo.png" alt="logo-small" class="logo-sm">
                    </span>
                  
                </a>
            </div>
            <div class="topbar d-print-none" style="background:#0281b8;margin-bottom:100px"> 
        <div class="container-xxl">
            <nav class="topbar-custom d-flex justify-content-between" id="topbar-custom">    
        

                <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">                        
                    <li>
                        <button class="nav-link mobile-menu-btn nav-icon" id="togglemenu">
                            <i class="iconoir-menu-scale"></i>
                        </button>
                    </li> 
                    <li class="mx-3 welcome-text">
                        <h3 class="mb-0 fw-bold text-truncate">Welcome, {{ auth()->user()->name }}!</h3>
                        <h6 class="mb-0 fw-normal text-muted text-truncate fs-14">start exploring your business.</h6> 
                    </li>                   
                </ul>
                <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">
                     
                  <!--end topbar-language-->
        
                   
                    <li class="nav-item">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="text-white hover:underline">Logout</button>
    </form>
</li>
                   
                </ul><!--end topbar-nav-->
            </nav>
            <!-- end navbar-->
        </div>
    </div>
            <!--end brand-->
            <!--start startbar-menu-->
            <div class="startbar-menu">
                <div class="startbar-collapse simplebar-scrollable-y" id="startbarCollapse" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px -16px -16px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px 16px 16px;">
                    <div class="d-flex align-items-start flex-column w-100">
                        <!-- Navigation -->
                        <ul class="navbar-nav mb-auto w-100">
                            <li class="menu-label pt-0 mt-0">
                                <!-- <small class="label-border">
                                    <div class="border_left hidden-xs"></div>
                                    <div class="border_right"></div>
                                </small> -->
                                <span>Main Menu</span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard') }}"  role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                                    <i class="iconoir-home-simple menu-icon"></i>
                                    
                                    <span>Dashboards</span>
                                </a>
                             
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('tours.index') }}"  role="button" aria-expanded="false" aria-controls="sidebarApplications">
                                    <i class="iconoir-view-grid menu-icon"></i>
                                    <span>Tour Packages</span>
                                </a>
                           
                            </li><!--end nav-item-->
                          
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('visas.index') }}" drole="button" aria-expanded="false" aria-controls="sidebarElements">
                                    <i class="iconoir-compact-disc menu-icon"></i>
                                    <span>Visa Services</span>
                                </a>
                               
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('hotels.index') }}" role="button" aria-expanded="false" aria-controls="sidebarAdvancedUI">
                                    <i class="iconoir-peace-hand menu-icon"></i>
                                    <span>Hotels</span><span class="badge rounded text-success bg-success-subtle ms-1">New</span>
                                </a>
                               
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cruises.index') }}"  role="button" aria-expanded="false" aria-controls="sidebarForms">
                                    <i class="iconoir-journal-page menu-icon"></i>
                                    <span>cruises</span>
                                </a>
                              
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('documentation.index') }}"
                                role="button" aria-expanded="false" aria-controls="sidebarCharts">
                                    <i class="iconoir-candlestick-chart menu-icon"></i>
                                    <span>Documentation</span>
                                </a>
                             
                            </li><!--end nav-item-->
                           
                           <li class="nav-item">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="text-red-600 hover:underline">Logout</button>
    </form>
</li>
                          
                        </ul><!--end navbar-nav--->
                        <div class="update-msg text-center" style="margin-top:150px"> 
                            <div class="d-flex justify-content-center align-items-center thumb-lg update-icon-box  rounded-circle mx-auto">
                                <i class="iconoir-peace-hand h3 align-self-center mb-0 text-primary"></i>
                            </div>                   
                            <h5 class="mt-3">Royeli Travel</h5>
                            <p class="mb-3 text-muted">B2B Portal </p>
                            <a href="{{ route('wallet.fund') }}" class="btn text-primary shadow-sm rounded-pill">Fund Wallet</a>
                        </div>
                    </div>
                </div></div></div></div><div class="simplebar-placeholder" style="width: 270px; height: 1311px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 164px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></div><!--end startbar-collapse-->
            </div><!--end startbar-menu-->    
        </div>
        <!-- Sidebar -->
      
          
        
      

        <!-- Main Content -->
        <div class=" content flex-1 flex flex-col lg:ml-0">
         
<div class="container">
<main class="flex-1 p-4 lg:p-6" style="margin-top:100px">
                @yield('content')
            </main>
</div>
            <!-- Page Content -->
           
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    

<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    @stack('scripts')
</body>
</html> 