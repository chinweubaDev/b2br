@extends('admin.layouts.app')

@section('title', 'Wallet Transactions - Admin Dashboard')
@section('page-title', 'Wallet Transactions')

@section('content')
<!-- Header -->
<div class="glass-card p-6 mb-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-200">Wallet Transactions</h1>
            <p class="text-gray-400 mt-1">View all wallet transactions across the platform</p>
        </div>
        <div class="flex items-center gap-3">
            <span class="text-sm text-gray-400">
                Total: <strong class="text-white">{{ $transactions->total() }}</strong> transactions
            </span>
        </div>
    </div>
</div>

<!-- Transactions Table -->
<div class="glass-card p-6">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Reference</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">User</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Type</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Amount</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Status</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Date</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Description</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transactions as $transaction)
                <tr class="border-b border-gray-700/50 hover:bg-white hover:bg-opacity-5 transition">
                    <td class="py-4 px-4">
                        <span class="font-mono text-sm text-gray-300">{{ $transaction->reference }}</span>
                    </td>
                    <td class="py-4 px-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-purple-500 to-blue-500 flex items-center justify-center text-white text-sm font-semibold">
                                {{ substr($transaction->user->name ?? 'U', 0, 1) }}
                            </div>
                            <div>
                                <p class="text-gray-200 font-medium">{{ $transaction->user->name ?? 'Unknown' }}</p>
                                <p class="text-xs text-gray-400">{{ $transaction->user->email ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="py-4 px-4">
                        @if($transaction->type === 'credit')
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">
                                <i class="fas fa-arrow-down mr-1"></i>Credit
                            </span>
                        @else
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-red-500/20 text-red-400">
                                <i class="fas fa-arrow-up mr-1"></i>Debit
                            </span>
                        @endif
                    </td>
                    <td class="py-4 px-4">
                        <span class="font-semibold {{ $transaction->type === 'credit' ? 'text-green-400' : 'text-red-400' }}">
                            {{ $transaction->type === 'credit' ? '+' : '-' }}₦{{ number_format($transaction->amount, 2) }}
                        </span>
                    </td>
                    <td class="py-4 px-4">
                        @if($transaction->status === 'completed')
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">
                                <i class="fas fa-check-circle mr-1"></i>Completed
                            </span>
                        @elseif($transaction->status === 'pending')
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-yellow-500/20 text-yellow-400">
                                <i class="fas fa-clock mr-1"></i>Pending
                            </span>
                        @else
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-red-500/20 text-red-400">
                                <i class="fas fa-times-circle mr-1"></i>Failed
                            </span>
                        @endif
                    </td>
                    <td class="py-4 px-4 text-gray-300 text-sm">
                        {{ $transaction->created_at->format('M d, Y H:i') }}
                        <span class="text-xs text-gray-500 block">{{ $transaction->created_at->diffForHumans() }}</span>
                    </td>
                    <td class="py-4 px-4 text-gray-400 text-sm">
                        {{ $transaction->description ?? 'N/A' }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="py-12 text-center">
                        <div class="text-gray-400">
                            <i class="fas fa-wallet text-4xl mb-4 opacity-50"></i>
                            <p class="text-lg">No transactions found</p>
                            <p class="text-sm mt-2">Wallet transactions will appear here</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($transactions->hasPages())
    <div class="mt-6">
        {{ $transactions->links() }}
    </div>
    @endif
</div>

<!-- Summary Cards -->
@if($transactions->isNotEmpty())
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
    <div class="glass-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-400 mb-1">Total Credits</p>
                <p class="text-2xl font-bold text-green-400">
                    ₦{{ number_format($transactions->where('type', 'credit')->sum('amount'), 2) }}
                </p>
            </div>
            <div class="w-12 h-12 rounded-full bg-green-500/20 flex items-center justify-center">
                <i class="fas fa-arrow-down text-green-400 text-xl"></i>
            </div>
        </div>
    </div>
    
    <div class="glass-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-400 mb-1">Total Debits</p>
                <p class="text-2xl font-bold text-red-400">
                    ₦{{ number_format($transactions->where('type', 'debit')->sum('amount'), 2) }}
                </p>
            </div>
            <div class="w-12 h-12 rounded-full bg-red-500/20 flex items-center justify-center">
                <i class="fas fa-arrow-up text-red-400 text-xl"></i>
            </div>
        </div>
    </div>
    
    <div class="glass-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-400 mb-1">Net Flow</p>
                @php
                    $netFlow = $transactions->where('type', 'credit')->sum('amount') - $transactions->where('type', 'debit')->sum('amount');
                @endphp
                <p class="text-2xl font-bold {{ $netFlow >= 0 ? 'text-green-400' : 'text-red-400' }}">
                    {{ $netFlow >= 0 ? '+' : '' }}₦{{ number_format($netFlow, 2) }}
                </p>
            </div>
            <div class="w-12 h-12 rounded-full bg-blue-500/20 flex items-center justify-center">
                <i class="fas fa-chart-line text-blue-400 text-xl"></i>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
