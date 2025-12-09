@extends('admin.layouts.app')

@section('title', 'Backup Management - Admin Dashboard')
@section('page-title', 'Backup Management')

@section('content')
<!-- Header -->
<div class="glass-card p-6 mb-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-200">Backup Management</h1>
            <p class="text-gray-400 mt-1">Create and manage database backups</p>
        </div>
        <form method="POST" action="{{ route('admin.backups.create') }}" class="inline">
            @csrf
            <button 
                type="submit"
                class="px-4 py-2 bg-gradient-to-r from-green-500 to-emerald-500 text-white rounded-lg hover:shadow-lg transition"
                onclick="return confirm('Create a new backup? This may take a few moments.');"
            >
                <i class="fas fa-plus mr-2"></i>Create New Backup
            </button>
        </form>
    </div>
</div>

<!-- Backup Statistics -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
    <div class="glass-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-400 mb-1">Total Backups</p>
                <p class="text-2xl font-bold text-white">12</p>
            </div>
            <div class="w-12 h-12 rounded-full bg-blue-500/20 flex items-center justify-center">
                <i class="fas fa-database text-blue-400 text-xl"></i>
            </div>
        </div>
    </div>
    
    <div class="glass-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-400 mb-1">Total Size</p>
                <p class="text-2xl font-bold text-white">2.4 GB</p>
            </div>
            <div class="w-12 h-12 rounded-full bg-purple-500/20 flex items-center justify-center">
                <i class="fas fa-hdd text-purple-400 text-xl"></i>
            </div>
        </div>
    </div>
    
    <div class="glass-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-400 mb-1">Last Backup</p>
                <p class="text-2xl font-bold text-white">2h ago</p>
            </div>
            <div class="w-12 h-12 rounded-full bg-green-500/20 flex items-center justify-center">
                <i class="fas fa-clock text-green-400 text-xl"></i>
            </div>
        </div>
    </div>
    
    <div class="glass-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-400 mb-1">Auto Backup</p>
                <p class="text-2xl font-bold text-green-400">Enabled</p>
            </div>
            <div class="w-12 h-12 rounded-full bg-green-500/20 flex items-center justify-center">
                <i class="fas fa-sync-alt text-green-400 text-xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Backup Settings -->
<div class="glass-card p-6 mb-6">
    <h3 class="text-lg font-semibold text-gray-200 mb-4">
        <i class="fas fa-cog mr-2 text-purple-400"></i>Backup Settings
    </h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="flex items-center">
                <input 
                    type="checkbox" 
                    checked
                    class="w-4 h-4 text-purple-600 bg-gray-800 border-gray-700 rounded focus:ring-purple-500 focus:ring-2"
                >
                <span class="ml-2 text-sm font-medium text-gray-300">Enable Automatic Daily Backups</span>
            </label>
        </div>
        <div>
            <label class="flex items-center">
                <input 
                    type="checkbox" 
                    class="w-4 h-4 text-purple-600 bg-gray-800 border-gray-700 rounded focus:ring-purple-500 focus:ring-2"
                >
                <span class="ml-2 text-sm font-medium text-gray-300">Email Notification on Backup Completion</span>
            </label>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Retention Period (days)</label>
            <input 
                type="number" 
                value="30"
                min="1"
                class="w-full px-4 py-2 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
            >
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Backup Time</label>
            <input 
                type="time" 
                value="02:00"
                class="w-full px-4 py-2 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
            >
        </div>
    </div>
    <div class="mt-4">
        <button class="px-4 py-2 bg-purple-500 hover:bg-purple-600 text-white rounded-lg transition">
            <i class="fas fa-save mr-2"></i>Save Settings
        </button>
    </div>
</div>

<!-- Backup List -->
<div class="glass-card p-6">
    <h3 class="text-lg font-semibold text-gray-200 mb-4">
        <i class="fas fa-list mr-2 text-blue-400"></i>Available Backups
    </h3>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Backup Name</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Date Created</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Size</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Type</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Status</th>
                    <th class="text-right py-3 px-4 text-gray-300 font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sample Backup Entries -->
                <tr class="border-b border-gray-700/50 hover:bg-white hover:bg-opacity-5 transition">
                    <td class="py-4 px-4">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-database text-blue-400"></i>
                            <span class="text-gray-200 font-mono text-sm">backup_2024-12-09_17-30.sql</span>
                        </div>
                    </td>
                    <td class="py-4 px-4 text-gray-300 text-sm">
                        Dec 9, 2024 17:30
                        <span class="text-xs text-gray-500 block">2 hours ago</span>
                    </td>
                    <td class="py-4 px-4 text-gray-300">245 MB</td>
                    <td class="py-4 px-4">
                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-500/20 text-blue-400">
                            <i class="fas fa-sync-alt mr-1"></i>Automatic
                        </span>
                    </td>
                    <td class="py-4 px-4">
                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">
                            <i class="fas fa-check-circle mr-1"></i>Complete
                        </span>
                    </td>
                    <td class="py-4 px-4">
                        <div class="flex items-center justify-end gap-2">
                            <button class="p-2 hover:bg-blue-500/20 rounded-lg transition text-blue-400" title="Download">
                                <i class="fas fa-download"></i>
                            </button>
                            <button class="p-2 hover:bg-green-500/20 rounded-lg transition text-green-400" title="Restore">
                                <i class="fas fa-undo"></i>
                            </button>
                            <button class="p-2 hover:bg-red-500/20 rounded-lg transition text-red-400" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <tr class="border-b border-gray-700/50 hover:bg-white hover:bg-opacity-5 transition">
                    <td class="py-4 px-4">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-database text-blue-400"></i>
                            <span class="text-gray-200 font-mono text-sm">backup_2024-12-08_02-00.sql</span>
                        </div>
                    </td>
                    <td class="py-4 px-4 text-gray-300 text-sm">
                        Dec 8, 2024 02:00
                        <span class="text-xs text-gray-500 block">1 day ago</span>
                    </td>
                    <td class="py-4 px-4 text-gray-300">238 MB</td>
                    <td class="py-4 px-4">
                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-500/20 text-blue-400">
                            <i class="fas fa-sync-alt mr-1"></i>Automatic
                        </span>
                    </td>
                    <td class="py-4 px-4">
                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">
                            <i class="fas fa-check-circle mr-1"></i>Complete
                        </span>
                    </td>
                    <td class="py-4 px-4">
                        <div class="flex items-center justify-end gap-2">
                            <button class="p-2 hover:bg-blue-500/20 rounded-lg transition text-blue-400" title="Download">
                                <i class="fas fa-download"></i>
                            </button>
                            <button class="p-2 hover:bg-green-500/20 rounded-lg transition text-green-400" title="Restore">
                                <i class="fas fa-undo"></i>
                            </button>
                            <button class="p-2 hover:bg-red-500/20 rounded-lg transition text-red-400" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <tr class="border-b border-gray-700/50 hover:bg-white hover:bg-opacity-5 transition">
                    <td class="py-4 px-4">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-database text-purple-400"></i>
                            <span class="text-gray-200 font-mono text-sm">backup_manual_2024-12-07.sql</span>
                        </div>
                    </td>
                    <td class="py-4 px-4 text-gray-300 text-sm">
                        Dec 7, 2024 14:22
                        <span class="text-xs text-gray-500 block">2 days ago</span>
                    </td>
                    <td class="py-4 px-4 text-gray-300">235 MB</td>
                    <td class="py-4 px-4">
                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-purple-500/20 text-purple-400">
                            <i class="fas fa-hand-pointer mr-1"></i>Manual
                        </span>
                    </td>
                    <td class="py-4 px-4">
                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">
                            <i class="fas fa-check-circle mr-1"></i>Complete
                        </span>
                    </td>
                    <td class="py-4 px-4">
                        <div class="flex items-center justify-end gap-2">
                            <button class="p-2 hover:bg-blue-500/20 rounded-lg transition text-blue-400" title="Download">
                                <i class="fas fa-download"></i>
                            </button>
                            <button class="p-2 hover:bg-green-500/20 rounded-lg transition text-green-400" title="Restore">
                                <i class="fas fa-undo"></i>
                            </button>
                            <button class="p-2 hover:bg-red-500/20 rounded-lg transition text-red-400" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Warning Notice -->
<div class="bg-yellow-500/10 border border-yellow-500/30 rounded-lg p-4 mt-6">
    <div class="flex items-start gap-3">
        <i class="fas fa-exclamation-triangle text-yellow-400 mt-1"></i>
        <div>
            <h4 class="text-yellow-400 font-semibold mb-1">Important Backup Information</h4>
            <ul class="text-sm text-gray-300 space-y-1 list-disc list-inside">
                <li>Always verify backups before deleting old ones</li>
                <li>Store critical backups in multiple locations</li>
                <li>Test restore procedures regularly</li>
                <li>Ensure sufficient disk space for backup operations</li>
            </ul>
        </div>
    </div>
</div>
@endsection
