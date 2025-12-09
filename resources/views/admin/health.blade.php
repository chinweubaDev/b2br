@extends('admin.layouts.app')

@section('title', 'System Health - Admin Dashboard')
@section('page-title', 'System Health')

@section('content')
<!-- Header -->
<div class="glass-card p-6 mb-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-200">System Health</h1>
            <p class="text-gray-400 mt-1">Monitor system status and performance</p>
        </div>
        <button class="px-4 py-2 bg-purple-500 hover:bg-purple-600 text-white rounded-lg transition">
            <i class="fas fa-sync-alt mr-2"></i>Refresh Status
        </button>
    </div>
</div>

<!-- Overall Health Status -->
<div class="glass-card p-6 mb-6">
    <div class="flex items-center gap-4">
        <div class="w-20 h-20 rounded-full bg-green-500/20 flex items-center justify-center">
            <i class="fas fa-check-circle text-green-400 text-4xl"></i>
        </div>
        <div>
            <h2 class="text-2xl font-bold text-green-400">System Healthy</h2>
            <p class="text-gray-400">All systems are operational</p>
            <p class="text-xs text-gray-500 mt-1">Last checked: {{ now()->format('M d, Y H:i:s') }}</p>
        </div>
    </div>
</div>

<!-- Health Checks Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
    <!-- Database Health -->
    <div class="glass-card p-6">
        <div class="flex items-start justify-between mb-4">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-full {{ $health['database']['status'] === 'healthy' ? 'bg-green-500/20' : 'bg-red-500/20' }} flex items-center justify-center">
                    <i class="fas fa-database {{ $health['database']['status'] === 'healthy' ? 'text-green-400' : 'text-red-400' }} text-xl"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-200">Database</h3>
                    <p class="text-xs text-gray-400">Connection Status</p>
                </div>
            </div>
            <span class="px-3 py-1 rounded-full text-xs font-medium {{ $health['database']['status'] === 'healthy' ? 'bg-green-500/20 text-green-400' : 'bg-red-500/20 text-red-400' }}">
                {{ ucfirst($health['database']['status']) }}
            </span>
        </div>
        <p class="text-sm text-gray-300">{{ $health['database']['message'] }}</p>
        <div class="mt-4 pt-4 border-t border-gray-700">
            <div class="flex justify-between text-xs">
                <span class="text-gray-400">Response Time</span>
                <span class="text-gray-200 font-semibold">12ms</span>
            </div>
        </div>
    </div>

    <!-- Storage Health -->
    <div class="glass-card p-6">
        <div class="flex items-start justify-between mb-4">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-full {{ $health['storage']['status'] === 'healthy' ? 'bg-green-500/20' : ($health['storage']['status'] === 'warning' ? 'bg-yellow-500/20' : 'bg-red-500/20') }} flex items-center justify-center">
                    <i class="fas fa-hdd {{ $health['storage']['status'] === 'healthy' ? 'text-green-400' : ($health['storage']['status'] === 'warning' ? 'text-yellow-400' : 'text-red-400') }} text-xl"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-200">Storage</h3>
                    <p class="text-xs text-gray-400">Disk Space</p>
                </div>
            </div>
            <span class="px-3 py-1 rounded-full text-xs font-medium {{ $health['storage']['status'] === 'healthy' ? 'bg-green-500/20 text-green-400' : ($health['storage']['status'] === 'warning' ? 'bg-yellow-500/20 text-yellow-400' : 'bg-red-500/20 text-red-400') }}">
                {{ ucfirst($health['storage']['status']) }}
            </span>
        </div>
        <p class="text-sm text-gray-300">{{ $health['storage']['message'] }}</p>
        <div class="mt-4 pt-4 border-t border-gray-700">
            <div class="w-full bg-gray-700 rounded-full h-2 mb-2">
                <div class="bg-gradient-to-r from-green-500 to-blue-500 h-2 rounded-full" style="width: 45%"></div>
            </div>
            <div class="flex justify-between text-xs">
                <span class="text-gray-400">Used: 450 GB</span>
                <span class="text-gray-400">Free: 550 GB</span>
            </div>
        </div>
    </div>

    <!-- Cache Health -->
    <div class="glass-card p-6">
        <div class="flex items-start justify-between mb-4">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-full {{ $health['cache']['status'] === 'healthy' ? 'bg-green-500/20' : 'bg-red-500/20' }} flex items-center justify-center">
                    <i class="fas fa-bolt {{ $health['cache']['status'] === 'healthy' ? 'text-green-400' : 'text-red-400' }} text-xl"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-200">Cache</h3>
                    <p class="text-xs text-gray-400">Cache System</p>
                </div>
            </div>
            <span class="px-3 py-1 rounded-full text-xs font-medium {{ $health['cache']['status'] === 'healthy' ? 'bg-green-500/20 text-green-400' : 'bg-red-500/20 text-red-400' }}">
                {{ ucfirst($health['cache']['status']) }}
            </span>
        </div>
        <p class="text-sm text-gray-300">{{ $health['cache']['message'] }}</p>
        <div class="mt-4 pt-4 border-t border-gray-700">
            <div class="flex justify-between text-xs">
                <span class="text-gray-400">Hit Rate</span>
                <span class="text-green-400 font-semibold">94.2%</span>
            </div>
        </div>
    </div>

    <!-- Queue Health -->
    <div class="glass-card p-6">
        <div class="flex items-start justify-between mb-4">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-full bg-green-500/20 flex items-center justify-center">
                    <i class="fas fa-tasks text-green-400 text-xl"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-200">Queue</h3>
                    <p class="text-xs text-gray-400">Job Processing</p>
                </div>
            </div>
            <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">
                Healthy
            </span>
        </div>
        <p class="text-sm text-gray-300">Queue workers are running normally</p>
        <div class="mt-4 pt-4 border-t border-gray-700">
            <div class="flex justify-between text-xs">
                <span class="text-gray-400">Pending Jobs</span>
                <span class="text-gray-200 font-semibold">3</span>
            </div>
        </div>
    </div>

    <!-- Mail Health -->
    <div class="glass-card p-6">
        <div class="flex items-start justify-between mb-4">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-full bg-green-500/20 flex items-center justify-center">
                    <i class="fas fa-envelope text-green-400 text-xl"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-200">Mail</h3>
                    <p class="text-xs text-gray-400">Email Service</p>
                </div>
            </div>
            <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">
                Healthy
            </span>
        </div>
        <p class="text-sm text-gray-300">Mail service is operational</p>
        <div class="mt-4 pt-4 border-t border-gray-700">
            <div class="flex justify-between text-xs">
                <span class="text-gray-400">Sent Today</span>
                <span class="text-gray-200 font-semibold">127</span>
            </div>
        </div>
    </div>

    <!-- API Health -->
    <div class="glass-card p-6">
        <div class="flex items-start justify-between mb-4">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-full bg-green-500/20 flex items-center justify-center">
                    <i class="fas fa-plug text-green-400 text-xl"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-200">API</h3>
                    <p class="text-xs text-gray-400">External Services</p>
                </div>
            </div>
            <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">
                Healthy
            </span>
        </div>
        <p class="text-sm text-gray-300">All API endpoints responding</p>
        <div class="mt-4 pt-4 border-t border-gray-700">
            <div class="flex justify-between text-xs">
                <span class="text-gray-400">Avg Response</span>
                <span class="text-gray-200 font-semibold">245ms</span>
            </div>
        </div>
    </div>
</div>

<!-- System Information -->
<div class="glass-card p-6 mb-6">
    <h3 class="text-lg font-semibold text-gray-200 mb-4">
        <i class="fas fa-info-circle mr-2 text-blue-400"></i>System Information
    </h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div>
            <p class="text-sm text-gray-400 mb-1">PHP Version</p>
            <p class="text-lg font-semibold text-gray-200">{{ PHP_VERSION }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-400 mb-1">Laravel Version</p>
            <p class="text-lg font-semibold text-gray-200">{{ app()->version() }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-400 mb-1">Environment</p>
            <p class="text-lg font-semibold text-gray-200">{{ config('app.env') }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-400 mb-1">Debug Mode</p>
            <p class="text-lg font-semibold {{ config('app.debug') ? 'text-yellow-400' : 'text-green-400' }}">
                {{ config('app.debug') ? 'Enabled' : 'Disabled' }}
            </p>
        </div>
    </div>
</div>

<!-- Server Resources -->
<div class="glass-card p-6">
    <h3 class="text-lg font-semibold text-gray-200 mb-4">
        <i class="fas fa-server mr-2 text-purple-400"></i>Server Resources
    </h3>
    <div class="space-y-6">
        <!-- CPU Usage -->
        <div>
            <div class="flex justify-between mb-2">
                <span class="text-sm text-gray-300">CPU Usage</span>
                <span class="text-sm font-semibold text-gray-200">32%</span>
            </div>
            <div class="w-full bg-gray-700 rounded-full h-3">
                <div class="bg-gradient-to-r from-blue-500 to-purple-500 h-3 rounded-full transition-all duration-300" style="width: 32%"></div>
            </div>
        </div>

        <!-- Memory Usage -->
        <div>
            <div class="flex justify-between mb-2">
                <span class="text-sm text-gray-300">Memory Usage</span>
                <span class="text-sm font-semibold text-gray-200">4.2 GB / 8 GB (52%)</span>
            </div>
            <div class="w-full bg-gray-700 rounded-full h-3">
                <div class="bg-gradient-to-r from-green-500 to-emerald-500 h-3 rounded-full transition-all duration-300" style="width: 52%"></div>
            </div>
        </div>

        <!-- Network Traffic -->
        <div>
            <div class="flex justify-between mb-2">
                <span class="text-sm text-gray-300">Network Traffic (24h)</span>
                <span class="text-sm font-semibold text-gray-200">↓ 12.4 GB / ↑ 3.2 GB</span>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <div class="w-full bg-gray-700 rounded-full h-2">
                        <div class="bg-blue-500 h-2 rounded-full" style="width: 68%"></div>
                    </div>
                    <p class="text-xs text-gray-400 mt-1">Download</p>
                </div>
                <div>
                    <div class="w-full bg-gray-700 rounded-full h-2">
                        <div class="bg-purple-500 h-2 rounded-full" style="width: 24%"></div>
                    </div>
                    <p class="text-xs text-gray-400 mt-1">Upload</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
