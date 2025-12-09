@extends('admin.layouts.app')

@section('title', 'Payment Management - Admin Dashboard')
@section('page-title', 'Payments')

@section('content')
<!-- Header -->
<div class="glass-card p-6 mb-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-200">Payment Management</h1>
            <p class="text-gray-400 mt-1">View and manage all payment transactions</p>
        </div>
        <div class="flex gap-3">
            <button class="px-4 py-2 bg-white bg-opacity-10 text-gray-200 rounded-lg hover:bg-opacity-20 transition">
                <i class="fas fa-filter mr-2"></i>Filter
            </button>
            <button class="px-4 py-2 bg-white bg-opacity-10 text-gray-200 rounded-lg hover:bg-opacity-20 transition">
                <i class="fas fa-download mr-2"></i>Export
            </button>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="stat-card">
        <div class="stat-card-header">
            <div class="stat-card-icon gradient-green">
                <i class="fas fa-check-circle"></i>
            </div>
        </div>
        <div class="stat-card-body">
            <p class="stat-card-label">Successful</p>
            <p class="stat-card-value">₦{{ number_format($totalSuccessful ?? 5420000, 0) }}</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-card-header">
            <div class="stat-card-icon gradient-yellow">
                <i class="fas fa-clock"></i>
            </div>
        </div>
        <div class="stat-card-body">
            <p class="stat-card-label">Pending</p>
            <p class="stat-card-value">₦{{ number_format($totalPending ?? 250000, 0) }}</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-card-header">
            <div class="stat-card-icon gradient-red">
                <i class="fas fa-times-circle"></i>
            </div>
        </div>
        <div class="stat-card-body">
            <p class="stat-card-label">Failed</p>
            <p class="stat-card-value">{{ $failedCount ?? 12 }}</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-card-header">
            <div class="stat-card-icon gradient-blue">
                <i class="fas fa-chart-line"></i>
            </div>
        </div>
        <div class="stat-card-body">
            <p class="stat-card-label">This Month</p>
            <p class="stat-card-value">₦{{ number_format($monthlyTotal ?? 2150000, 0) }}</p>
        </div>
    </div>
</div>

<!-- Payments Table -->
<div class="glass-card p-6">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Reference</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">User</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Service</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Amount</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Method</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Status</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Date</th>
                    <th class="text-right py-3 px-4 text-gray-300 font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($payments ?? [] as $payment)
                <tr class="border-b border-gray-700/50 hover:bg-white hover:bg-opacity-5 transition">
                    <td class="py-4 px-4">
                        <span class="text-gray-200 font-mono text-sm">{{ $payment->reference ?? 'PAY-'.rand(1000, 9999) }}</span>
                    </td>
                    <td class="py-4 px-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-purple-500 to-blue-500 flex items-center justify-center text-white text-xs font-semibold">
                                {{ substr($payment->user->name ?? 'User', 0, 1) }}
                            </div>
                            <span class="text-gray-200">{{ $payment->user->name ?? 'N/A' }}</span>
                        </div>
                    </td>
                    <td class="py-4 px-4 text-gray-300">{{ $payment->service_type ?? 'Visa Service' }}</td>
                    <td class="py-4 px-4">
                        <span class="text-gray-200 font-semibold">₦{{ number_format($payment->amount ?? 500000, 0) }}</span>
                    </td>
                    <td class="py-4 px-4">
                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-500/20 text-blue-400">
                            {{ ucfirst($payment->payment_method ?? 'Paystack') }}
                        </span>
                    </td>
                    <td class="py-4 px-4">
                        @php
                            $status = $payment->status ?? 'success';
                        @endphp
                        <span class="px-3 py-1 rounded-full text-xs font-medium
                            @if($status === 'success') bg-green-500/20 text-green-400
                            @elseif($status === 'pending') bg-yellow-500/20 text-yellow-400
                            @else bg-red-500/20 text-red-400
                            @endif">
                            <i class="fas fa-circle text-xs mr-1"></i>{{ ucfirst($status) }}
                        </span>
                    </td>
                    <td class="py-4 px-4 text-gray-400 text-sm">
                        {{ isset($payment->created_at) ? $payment->created_at->format('M d, Y H:i') : now()->format('M d, Y H:i') }}
                    </td>
                    <td class="py-4 px-4">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('payment.details', $payment->id ?? 1) }}" class="p-2 hover:bg-blue-500/20 rounded-lg transition text-blue-400" title="View Details">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="py-12 text-center">
                        <div class="text-gray-400">
                            <i class="fas fa-receipt text-4xl mb-4 opacity-50"></i>
                            <p class="text-lg">No payments found</p>
                            <p class="text-sm mt-2">Payment transactions will appear here</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if(isset($payments) && $payments->hasPages())
    <div class="mt-6">
        {{ $payments->links() }}
    </div>
    @endif
</div>
@endsection
