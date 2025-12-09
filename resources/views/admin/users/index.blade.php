@extends('admin.layouts.app')

@section('title', 'User Management - Admin Dashboard')
@section('page-title', 'User Management')

@section('content')
<!-- Header -->
<div class="glass-card p-6 mb-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-200">User Management</h1>
            <p class="text-gray-400 mt-1">Manage all users and their permissions</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="px-4 py-2 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition">
            <i class="fas fa-plus mr-2"></i>Add New User
        </a>
    </div>
</div>

<!-- Users Table -->
<div class="glass-card p-6">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Name</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Email</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Role</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Status</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Wallet</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Last Login</th>
                    <th class="text-right py-3 px-4 text-gray-300 font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users ?? [] as $user)
                <tr class="border-b border-gray-700/50 hover:bg-white hover:bg-opacity-5 transition">
                    <td class="py-4 px-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-purple-500 to-blue-500 flex items-center justify-center text-white font-semibold">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                            <span class="text-gray-200 font-medium">{{ $user->name }}</span>
                        </div>
                    </td>
                    <td class="py-4 px-4 text-gray-300">{{ $user->email }}</td>
                    <td class="py-4 px-4">
                        <span class="px-3 py-1 rounded-full text-xs font-medium
                            @if($user->role === 'admin') bg-red-500/20 text-red-400
                            @elseif($user->role === 'manager') bg-blue-500/20 text-blue-400
                            @elseif($user->role === 'agent') bg-green-500/20 text-green-400
                            @else bg-gray-500/20 text-gray-400
                            @endif">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                    <td class="py-4 px-4">
                        @if($user->is_active)
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">
                                <i class="fas fa-circle text-xs mr-1"></i>Active
                            </span>
                        @else
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-red-500/20 text-red-400">
                                <i class="fas fa-circle text-xs mr-1"></i>Inactive
                            </span>
                        @endif
                    </td>
                    <td class="py-4 px-4 text-gray-300">{{ $user->formatted_wallet_balance ?? '₦0.00' }}</td>
                    <td class="py-4 px-4 text-gray-400 text-sm">
                        {{ $user->last_login_at ? $user->last_login_at->diffForHumans() : 'Never' }}
                    </td>
                    <td class="py-4 px-4">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.users.edit', $user) }}" class="p-2 hover:bg-blue-500/20 rounded-lg transition text-blue-400" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('admin.users.fund', $user) }}" class="p-2 hover:bg-green-500/20 rounded-lg transition text-green-400" title="Fund Wallet">
                                <i class="fas fa-wallet"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 hover:bg-red-500/20 rounded-lg transition text-red-400" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="py-12 text-center">
                        <div class="text-gray-400">
                            <i class="fas fa-users text-4xl mb-4 opacity-50"></i>
                            <p class="text-lg">No users found</p>
                            <p class="text-sm mt-2">Add your first user to get started</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if(isset($users) && $users->hasPages())
    <div class="mt-6">
        {{ $users->links() }}
    </div>
    @endif
</div>
@endsection
