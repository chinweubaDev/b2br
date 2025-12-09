@extends('layouts.app')

@section('title', 'Payment Successful')
@section('page-title', 'Payment Successful')

@section('content')
<div class="max-w-lg mx-auto bg-white shadow rounded-lg p-6 mt-8 text-center">
    <h2 class="text-2xl font-bold mb-4 text-green-700 flex items-center justify-center">
        <i class="fas fa-check-circle mr-2"></i> Payment Successful
    </h2>
    <p class="mb-4 text-gray-600">Thank you! Your payment was successful. Below is your transaction receipt:</p>
    <div class="bg-gray-50 rounded p-4 mb-4 text-left">
        <div><span class="font-semibold">Reference:</span> {{ $payment->payment_reference ?? $payment->id }}</div>
        <div><span class="font-semibold">Amount:</span> ₦{{ number_format($payment->amount) }}</div>
        <div><span class="font-semibold">Date:</span> {{ $payment->created_at->format('Y-m-d H:i') }}</div>
        <div><span class="font-semibold">Status:</span> <span class="text-green-700 font-bold">Completed</span></div>
    </div>
    <a href="{{ route('payments.history') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">View Transaction History</a>
    <a href="{{ route('dashboard') }}" class="inline-block ml-2 text-blue-600 hover:underline">Back to Dashboard</a>
</div>
@endsection 