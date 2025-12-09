@extends('admin.layouts.app')

@section('title', 'System Logs - Admin Dashboard')
@section('page-title', 'System Logs')

@section('content')
<!-- Header -->
<div class="glass-card p-6 mb-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-200">System Logs</h1>
            <p class="text-gray-400 mt-1">Monitor application logs and errors</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition">
                <i class="fas fa-sync-alt mr-2"></i>Refresh
            </button>
            <button class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition">
                <i class="fas fa-trash mr-2"></i>Clear Logs
            </button>
        </div>
    </div>
</div>

<!-- Log Level Filters -->
<div class="glass-card p-6 mb-6">
    <div class="flex flex-wrap gap-2">
        <button class="px-4 py-2 rounded-lg transition bg-purple-500/20 text-purple-400 border border-purple-500/30">
            <i class="fas fa-circle text-xs mr-2"></i>All Logs
        </button>
        <button class="px-4 py-2 rounded-lg transition hover:bg-red-500/20 text-gray-400 hover:text-red-400 border border-gray-700 hover:border-red-500/30">
            <i class="fas fa-circle text-xs mr-2"></i>Errors
        </button>
        <button class="px-4 py-2 rounded-lg transition hover:bg-yellow-500/20 text-gray-400 hover:text-yellow-400 border border-gray-700 hover:border-yellow-500/30">
            <i class="fas fa-circle text-xs mr-2"></i>Warnings
        </button>
        <button class="px-4 py-2 rounded-lg transition hover:bg-blue-500/20 text-gray-400 hover:text-blue-400 border border-gray-700 hover:border-blue-500/30">
            <i class="fas fa-circle text-xs mr-2"></i>Info
        </button>
        <button class="px-4 py-2 rounded-lg transition hover:bg-gray-500/20 text-gray-400 border border-gray-700 hover:border-gray-500/30">
            <i class="fas fa-circle text-xs mr-2"></i>Debug
        </button>
    </div>
</div>

<!-- Logs Display -->
<div class="glass-card p-6">
    <div class="space-y-3">
        <!-- Sample Log Entries -->
        <div class="bg-red-500/10 border border-red-500/30 rounded-lg p-4 hover:bg-red-500/20 transition cursor-pointer">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="px-2 py-1 rounded text-xs font-semibold bg-red-500/30 text-red-300">ERROR</span>
                        <span class="text-xs text-gray-400">2024-12-09 19:30:15</span>
                    </div>
                    <p class="text-gray-200 font-mono text-sm mb-2">
                        SQLSTATE[42S02]: Base table or view not found: 1146 Table 'b2br.cache' doesn't exist
                    </p>
                    <p class="text-xs text-gray-400">
                        <i class="fas fa-file mr-1"></i>vendor/laravel/framework/src/Illuminate/Database/Connection.php:829
                    </p>
                </div>
                <button class="text-gray-400 hover:text-white transition">
                    <i class="fas fa-chevron-down"></i>
                </button>
            </div>
        </div>

        <div class="bg-yellow-500/10 border border-yellow-500/30 rounded-lg p-4 hover:bg-yellow-500/20 transition cursor-pointer">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="px-2 py-1 rounded text-xs font-semibold bg-yellow-500/30 text-yellow-300">WARNING</span>
                        <span class="text-xs text-gray-400">2024-12-09 18:45:32</span>
                    </div>
                    <p class="text-gray-200 font-mono text-sm mb-2">
                        Deprecated function call: mysql_connect() is deprecated
                    </p>
                    <p class="text-xs text-gray-400">
                        <i class="fas fa-file mr-1"></i>app/Services/DatabaseService.php:45
                    </p>
                </div>
                <button class="text-gray-400 hover:text-white transition">
                    <i class="fas fa-chevron-down"></i>
                </button>
            </div>
        </div>

        <div class="bg-blue-500/10 border border-blue-500/30 rounded-lg p-4 hover:bg-blue-500/20 transition cursor-pointer">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="px-2 py-1 rounded text-xs font-semibold bg-blue-500/30 text-blue-300">INFO</span>
                        <span class="text-xs text-gray-400">2024-12-09 17:20:10</span>
                    </div>
                    <p class="text-gray-200 font-mono text-sm mb-2">
                        User login successful: admin@b2br.com
                    </p>
                    <p class="text-xs text-gray-400">
                        <i class="fas fa-file mr-1"></i>app/Http/Controllers/Admin/AdminAuthController.php:67
                    </p>
                </div>
                <button class="text-gray-400 hover:text-white transition">
                    <i class="fas fa-chevron-down"></i>
                </button>
            </div>
        </div>

        <div class="bg-green-500/10 border border-green-500/30 rounded-lg p-4 hover:bg-green-500/20 transition cursor-pointer">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="px-2 py-1 rounded text-xs font-semibold bg-green-500/30 text-green-300">SUCCESS</span>
                        <span class="text-xs text-gray-400">2024-12-09 16:15:45</span>
                    </div>
                    <p class="text-gray-200 font-mono text-sm mb-2">
                        Payment processed successfully: TXN-2024120916154
                    </p>
                    <p class="text-xs text-gray-400">
                        <i class="fas fa-file mr-1"></i>app/Http/Controllers/PaymentController.php:123
                    </p>
                </div>
                <button class="text-gray-400 hover:text-white transition">
                    <i class="fas fa-chevron-down"></i>
                </button>
            </div>
        </div>

        <div class="bg-gray-500/10 border border-gray-500/30 rounded-lg p-4 hover:bg-gray-500/20 transition cursor-pointer">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="px-2 py-1 rounded text-xs font-semibold bg-gray-500/30 text-gray-300">DEBUG</span>
                        <span class="text-xs text-gray-400">2024-12-09 15:30:22</span>
                    </div>
                    <p class="text-gray-200 font-mono text-sm mb-2">
                        Cache hit for key: user_preferences_123
                    </p>
                    <p class="text-xs text-gray-400">
                        <i class="fas fa-file mr-1"></i>app/Services/CacheService.php:89
                    </p>
                </div>
                <button class="text-gray-400 hover:text-white transition">
                    <i class="fas fa-chevron-down"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-6 flex items-center justify-between">
        <p class="text-sm text-gray-400">Showing 1-5 of 247 log entries</p>
        <div class="flex gap-2">
            <button class="px-3 py-1 bg-gray-700 hover:bg-gray-600 text-white rounded transition">Previous</button>
            <button class="px-3 py-1 bg-purple-500 text-white rounded">1</button>
            <button class="px-3 py-1 bg-gray-700 hover:bg-gray-600 text-white rounded transition">2</button>
            <button class="px-3 py-1 bg-gray-700 hover:bg-gray-600 text-white rounded transition">3</button>
            <button class="px-3 py-1 bg-gray-700 hover:bg-gray-600 text-white rounded transition">Next</button>
        </div>
    </div>
</div>

<!-- Info Notice -->
<div class="bg-blue-500/10 border border-blue-500/30 rounded-lg p-4 mt-6">
    <div class="flex items-start gap-3">
        <i class="fas fa-info-circle text-blue-400 mt-1"></i>
        <div>
            <h4 class="text-blue-400 font-semibold mb-1">Log Information</h4>
            <p class="text-sm text-gray-300">
                Logs are stored in <code class="bg-gray-800 px-2 py-1 rounded text-xs">storage/logs/laravel.log</code>. 
                Regular log rotation is recommended to prevent disk space issues.
            </p>
        </div>
    </div>
</div>
@endsection
