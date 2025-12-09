@extends('layouts.app')

@section('title', 'Payment Details')
@section('page-title', 'Payment Details')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8" style="padding:20px">
        <h2 class="text-2xl font-bold mb-4">Payment Details</h2>
        <div class="mb-6">
            <div class="flex items-center space-x-4 mb-2">
                <span class="text-gray-600">Reference:</span>
                <span class="font-mono text-blue-700">{{ $payment->payment_reference }}</span>
            </div>
            <div class="flex items-center space-x-4 mb-2">
                <span class="text-gray-600">Service:</span>
                <span class="font-semibold text-blue-700">{{ ucfirst($payment->service_type) }} - {{ $payment->service_name }}</span>
            </div>
            <div class="flex items-center space-x-4 mb-2">
                <span class="text-gray-600">Amount:</span>
                <span class="text-green-700 font-semibold">{{ $payment->formatted_amount }}</span>
            </div>
            <div class="flex items-center space-x-4 mb-2">
                <span class="text-gray-600">Status:</span>
                <span class="inline-block px-2 py-1 rounded {{ $payment->status_badge_class }}">{{ ucfirst($payment->payment_status) }}</span>
            </div>
            <div class="flex items-center space-x-4 mb-2">
                <span class="text-gray-600">Method:</span>
                <span class="inline-flex items-center px-2 py-1 rounded {{ $payment->status_badge_class }}"><i class="{{ $payment->payment_method_icon }} mr-1"></i>{{ $payment->payment_method_display }}</span>
            </div>
            @if($payment->paid_at)
            <div class="flex items-center space-x-4 mb-2">
                <span class="text-gray-600">Paid At:</span>
                <span class="text-gray-700">{{ $payment->paid_at->format('d M Y, H:i') }}</span>
            </div>
            @endif
        </div>
        @if($payment->payment_method === 'bank_transfer')
        <div class="bg-gray-50 rounded-lg p-4 mb-4">
            <h3 class="text-lg font-semibold mb-2 text-blue-700"><i class="fas fa-university mr-2"></i>Bank Transfer Details</h3>
            <ul class="space-y-2">
                <li><strong>Bank Name:</strong> {{ $payment->getBankTransferDetails()['bank_name'] }}</li>
                <li><strong>Account Name:</strong> {{ $payment->getBankTransferDetails()['account_name'] }}</li>
                <li><strong>Account Number:</strong> {{ $payment->getBankTransferDetails()['account_number'] }}</li>
                <li><strong>Sort Code:</strong> {{ $payment->getBankTransferDetails()['sort_code'] }}</li>
                <li><strong>Payment Reference:</strong> <span class="text-blue-600 font-mono">{{ $payment->getBankTransferDetails()['reference'] }}</span></li>
            </ul>
        </div>
        @endif
        <a href="{{ route('payment.history') }}" class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors duration-200 mt-2"><i class="fas fa-list mr-2"></i>Back to Transaction History</a>
    </div>
</div>
@endsection 