@extends('layouts.app')

@section('title', 'Payment Options')

@section('content')
<style>
    .payment-container {
        max-width: 700px;
        margin: 0 auto;
    }

    .payment-card {
        background: white;
        border-radius: 24px;
        padding: 3rem 2.5rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        animation: fadeIn 0.6s ease-out;
    }

    .payment-header {
        margin-bottom: 2.5rem;
    }

    .payment-header h2 {
        font-size: 2rem;
        font-weight: 700;
        color: var(--color-gray-900);
        margin-bottom: 0.5rem;
    }

    .payment-header .service-name {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .payment-summary {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        border-radius: 16px;
        padding: 1.5rem;
        margin-bottom: 2.5rem;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }

    .summary-row:last-child {
        margin-bottom: 0;
        padding-top: 1rem;
        border-top: 2px solid rgba(0, 0, 0, 0.1);
    }

    .summary-label {
        font-size: 0.95rem;
        color: var(--color-gray-600);
    }

    .summary-value {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--color-gray-900);
    }

    .summary-value.amount {
        font-size: 1.5rem;
        font-weight: 700;
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .payment-methods {
        margin-bottom: 2rem;
    }

    .payment-method {
        background: white;
        border: 2px solid var(--color-gray-200);
        border-radius: 16px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .payment-method::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: var(--gradient);
        transform: scaleY(0);
        transition: transform 0.3s ease;
    }

    .payment-method:hover {
        border-color: var(--color);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        transform: translateY(-3px);
    }

    .payment-method:hover::before {
        transform: scaleY(1);
    }

    .payment-method.disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .payment-method.disabled:hover {
        transform: none;
        box-shadow: none;
    }

    .method-content {
        display: flex;
        align-items: center;
    }

    .method-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        background: var(--gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1.25rem;
        flex-shrink: 0;
    }

    .method-icon i {
        font-size: 1.75rem;
        color: white;
    }

    .method-info {
        flex: 1;
    }

    .method-info h3 {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--color-gray-900);
        margin-bottom: 0.25rem;
    }

    .method-info p {
        font-size: 0.9rem;
        color: var(--color-gray-600);
    }

    .method-badge {
        padding: 0.375rem 0.75rem;
        background: linear-gradient(135deg, #f5576c 0%, #f093fb 100%);
        color: white;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .insufficient-notice {
        background: rgba(245, 87, 108, 0.1);
        border: 1px solid rgba(245, 87, 108, 0.3);
        border-radius: 12px;
        padding: 1rem;
        margin-top: 1rem;
        color: var(--color-danger);
        font-size: 0.9rem;
    }

    .insufficient-notice a {
        color: var(--color-danger);
        font-weight: 600;
        text-decoration: underline;
    }

    .submit-btn {
        width: 100%;
        padding: 1.25rem;
        background: var(--gradient);
        color: white;
        border: none;
        border-radius: 16px;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .submit-btn:hover:not(:disabled) {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
    }

    .submit-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .submit-btn i {
        margin-right: 0.75rem;
    }

    .back-link {
        text-align: center;
        margin-top: 2rem;
    }

    .back-link a {
        color: var(--color-gray-600);
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        transition: all 0.3s ease;
    }

    .back-link a:hover {
        color: var(--color-gray-900);
        transform: translateX(-5px);
    }

    .back-link a i {
        margin-right: 0.5rem;
    }

    @media (max-width: 768px) {
        .payment-card {
            padding: 2rem 1.5rem;
        }

        .payment-header h2 {
            font-size: 1.5rem;
        }

        .method-content {
            flex-direction: column;
            text-align: center;
        }

        .method-icon {
            margin-right: 0;
            margin-bottom: 1rem;
        }
    }
</style>

<div class="payment-container">
    <div class="payment-card">
        <div class="payment-header">
            <h2>Pay for <span class="service-name">{{ ucfirst($serviceType) }}: {{ $serviceName }}</span></h2>
        </div>

        <div class="payment-summary">
            <div class="summary-row">
                <span class="summary-label">Service</span>
                <span class="summary-value">{{ ucfirst($serviceType) }}</span>
            </div>
            <div class="summary-row">
                <span class="summary-label">Wallet Balance</span>
                <span class="summary-value">{{ (auth()->user()->formatted_wallet_balance ?? '₦0.00') }}</span>
            </div>
            <div class="summary-row">
                <span class="summary-label">Amount to Pay</span>
                <span class="summary-value amount">₦{{ number_format($amount, 2) }}</span>
            </div>
        </div>

        <div class="payment-methods">
            <!-- Wallet Payment -->
            <form action="{{ route('payment.wallet', [$serviceType, $serviceId]) }}" method="POST">
                @csrf
                <button 
                    type="submit" 
                    class="payment-method" 
                    style="--gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%); --color: #fa709a;"
                    @if(auth()->user()->wallet_balance < $amount) disabled @endif
                >
                    <div class="method-content">
                        <div class="method-icon">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <div class="method-info">
                            <h3>Pay with Wallet</h3>
                            <p>Use your wallet balance for instant payment</p>
                        </div>
                        @if(auth()->user()->wallet_balance >= $amount)
                            <div class="method-badge">Recommended</div>
                        @endif
                    </div>
                </button>
                @if(auth()->user()->wallet_balance < $amount)
                    <div class="insufficient-notice">
                        <i class="fas fa-exclamation-circle"></i> Insufficient wallet balance. 
                        <a href="{{ route('wallet.fund') }}">Fund your wallet</a> to use this option.
                    </div>
                @endif
            </form>

            <!-- Bank Transfer -->
            <form action="{{ route('payment.bank-transfer', [$serviceType, $serviceId]) }}" method="POST">
                @csrf
                <input type="hidden" name="amount" value="{{ $amount }}">
                <button 
                    type="submit" 
                    class="payment-method" 
                    style="--gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%); --color: #667eea;"
                >
                    <div class="method-content">
                        <div class="method-icon">
                            <i class="fas fa-university"></i>
                        </div>
                        <div class="method-info">
                            <h3>Bank Transfer</h3>
                            <p>Transfer directly to our bank account</p>
                        </div>
                    </div>
                </button>
            </form>

            <!-- Paystack (Card) -->
            <form action="{{ route('payment.paystack', [$serviceType, $serviceId]) }}" method="POST">
                @csrf
                <input type="hidden" name="amount" value="{{ $amount }}">
                <button 
                    type="submit" 
                    class="payment-method" 
                    style="--gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); --color: #4facfe;"
                >
                    <div class="method-content">
                        <div class="method-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <div class="method-info">
                            <h3>Pay with Card (Paystack)</h3>
                            <p>Secure payment with debit/credit card</p>
                        </div>
                    </div>
                </button>
            </form>
        </div>

        <div class="back-link">
            <a href="{{ url()->previous() }}">
                <i class="fas fa-arrow-left"></i>
                Back to Previous Page
            </a>
        </div>
    </div>
</div>
@endsection