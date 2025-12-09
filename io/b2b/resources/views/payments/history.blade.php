@extends('layouts.app')

@section('title', 'Transaction History')
@section('page-title', 'My Payments & Transactions')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow rounded-lg p-6 mt-8">
    <h2 class="text-2xl font-bold mb-4 text-blue-700 flex items-center">
        <img src="/assets/images/logo-light.png" alt="Royeli Logo" class="h-8 mr-2"> Transaction History
    </h2>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Service</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Method</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-4 py-2"></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @forelse($payments as $payment)
                    <tr>
                        <td class="px-4 py-3 whitespace-nowrap text-gray-700">{{ $payment->created_at->format('d M Y, H:i') }}</td>
                        <td class="px-4 py-3 whitespace-nowrap text-blue-700 font-semibold">{{ ucfirst($payment->service_type) }}<br><span class="text-xs text-gray-500">{{ $payment->service_name }}</span></td>
                        <td class="px-4 py-3 whitespace-nowrap text-green-700 font-semibold">{{ $payment->formatted_amount }}</td>
                        <td class="px-4 py-3 whitespace-nowrap"><span class="inline-flex items-center px-2 py-1 rounded {{ $payment->status_badge_class }}"><i class="{{ $payment->payment_method_icon }} mr-1"></i>{{ $payment->payment_method_display }}</span></td>
                        <td class="px-4 py-3 whitespace-nowrap"><span class="inline-block px-2 py-1 rounded {{ $payment->status_badge_class }}">{{ ucfirst($payment->payment_status) }}</span></td>
                        <td class="px-4 py-3 whitespace-nowrap text-right">
                            <a href="{{ route('payment.details', $payment) }}" class="text-blue-600 hover:underline"><i class="fas fa-eye mr-1"></i>Details</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-400">No payments found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-6">
        {{ $payments->links() }}
    </div>
    <div class="mt-6 text-center">
        <a href="{{ route('dashboard') }}" class="text-blue-600 hover:underline">Back to Dashboard</a>
    </div>
</div>
@endsection 