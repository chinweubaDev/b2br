@extends('layouts.app')

@section('title', 'Payment Options')
@section('page-title', 'Choose Payment Method')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8" style='padding:20px'>
        <h2 class="text-2xl font-bold mb-4" style='color:#000'>Pay for {{ ucfirst($serviceType) }}: <span class="text-blue-600">{{ $serviceName }}</span></h2>
        <div class="mb-6">
            <div class="flex items-center space-x-4">
                <span class="text-gray-600">Amount:</span>
                <span class="text-xl font-semibold text-green-700">₦{{ number_format($amount, 2) }}</span>
            </div>
            <div class="flex items-center space-x-4 mt-2">
                <span class="text-gray-600">Wallet Balance:</span>
                <span class="text-lg font-semibold text-green-600">{{ (auth()->user()->formatted_wallet_balance ?? '₦0.00') }}</span>
            </div>
        </div>
        <form action="{{ route('payment.wallet', [$serviceType, $serviceId]) }}" method="POST" class="mb-4">
            @csrf
            @if(auth()->user()->wallet_balance >= $amount)
                <button type="submit" class="w-full flex items-center justify-center px-6 py-3 bg-yellow-500 text-white font-semibold rounded-lg hover:bg-yellow-600 transition-colors duration-200 mb-2">
                    <i class="fas fa-wallet mr-2"></i> Pay with Wallet
                </button>
            @else
                <button type="button" disabled class="w-full flex items-center justify-center px-6 py-3 bg-gray-200 text-gray-400 font-semibold rounded-lg mb-2 cursor-not-allowed" title="Insufficient wallet balance">
                    <i class="fas fa-wallet mr-2"></i> Pay with Wallet (Insufficient Balance)
                </button>
                <div class="text-xs text-red-500 text-center mt-1">
                    <a href="{{ route('wallet.fund') }}" class="underline">Fund your wallet</a> to use this option.
                </div>
            @endif
        </form>
        <form action="{{ route('payment.bank-transfer', [$serviceType, $serviceId]) }}" method="POST" class="mb-4">
            @csrf
            <input type="hidden" name="amount" value="{{ $amount }}">
            <button type="submit" class="w-full flex items-center justify-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors duration-200 mb-2">
                <i class="fas fa-university mr-2"></i> Pay with Bank Transfer
            </button>
        </form>
        <form action="{{ route('payment.paystack', [$serviceType, $serviceId]) }}" method="POST">
            @csrf
            <input type="hidden" name="amount" value="{{ $amount }}">
            <button type="submit" class="w-full flex items-center justify-center px-6 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition-colors duration-200">
                <i class="fas fa-credit-card mr-2"></i> Pay with Paystack (Card)
            </button>
        </form>
        <div class="mt-6 text-center">
            <a href="{{ url()->previous() }}" class="text-gray-500 hover:text-blue-600"><i class="fas fa-arrow-left mr-1"></i>Back</a>
        </div>
    </div>
</div>
@endsection 