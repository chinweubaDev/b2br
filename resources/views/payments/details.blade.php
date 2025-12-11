@extends('layouts.app')

@section('title', 'Payment Details')

@section('content')
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --secondary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .details-wrapper {
        max-width: 800px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    /* Breadcrumb */
    .breadcrumb-nav {
        margin-bottom: 2rem;
        font-size: 0.9rem;
        color: #718096;
    }

    .breadcrumb-nav a {
        color: #4a5568;
        text-decoration: none;
        transition: color 0.2s;
    }

    .breadcrumb-nav a:hover {
        color: #4facfe;
    }

    .breadcrumb-nav i {
        margin: 0 0.5rem;
        font-size: 0.7rem;
        color: #cbd5e0;
    }

    /* Header */
    .details-header {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        border: 1px solid #f0f0f0;
    }

    .details-header h1 {
        font-size: 1.75rem;
        font-weight: 800;
        color: #2d3748;
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .details-header h1::before {
        content: '';
        width: 4px;
        height: 32px;
        background: var(--primary-gradient);
        border-radius: 4px;
    }

    .reference-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background: rgba(79, 172, 254, 0.1);
        border: 1px solid rgba(79, 172, 254, 0.2);
        border-radius: 8px;
        font-family: 'Courier New', monospace;
        font-size: 0.9rem;
        font-weight: 700;
        color: #4facfe;
    }

    /* Status Banner */
    .status-banner {
        border-radius: 16px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .status-banner.completed {
        background: linear-gradient(135deg, rgba(72, 187, 120, 0.1) 0%, rgba(56, 161, 105, 0.05) 100%);
        border: 2px solid rgba(72, 187, 120, 0.3);
    }

    .status-banner.pending {
        background: linear-gradient(135deg, rgba(237, 137, 54, 0.1) 0%, rgba(221, 107, 32, 0.05) 100%);
        border: 2px solid rgba(237, 137, 54, 0.3);
    }

    .status-banner.failed {
        background: linear-gradient(135deg, rgba(245, 87, 108, 0.1) 0%, rgba(229, 62, 62, 0.05) 100%);
        border: 2px solid rgba(245, 87, 108, 0.3);
    }

    .status-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .status-banner.completed .status-icon {
        background: #48bb78;
        color: white;
    }

    .status-banner.pending .status-icon {
        background: #ed8936;
        color: white;
    }

    .status-banner.failed .status-icon {
        background: #f5576c;
        color: white;
    }

    .status-content h3 {
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
    }

    .status-banner.completed .status-content h3 {
        color: #2f855a;
    }

    .status-banner.pending .status-content h3 {
        color: #c05621;
    }

    .status-banner.failed .status-content h3 {
        color: #c53030;
    }

    .status-content p {
        font-size: 0.9rem;
        color: #4a5568;
        margin: 0;
    }

    /* Details Grid */
    .details-grid {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        border: 1px solid #f0f0f0;
    }

    .detail-row {
        display: grid;
        grid-template-columns: 180px 1fr;
        gap: 1.5rem;
        padding: 1.25rem 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .detail-label {
        font-size: 0.95rem;
        color: #718096;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .detail-label i {
        color: #cbd5e0;
        font-size: 0.9rem;
    }

    .detail-value {
        font-size: 1rem;
        font-weight: 700;
        color: #2d3748;
    }

    .detail-value.amount {
        font-size: 1.5rem;
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .method-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background: #f7fafc;
        border-radius: 8px;
        font-weight: 600;
        color: #4a5568;
    }

    /* Bank Transfer Details */
    .bank-transfer-section {
        background: linear-gradient(135deg, #f5f7fa 0%, #e8eef5 100%);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .bank-transfer-section h3 {
        font-size: 1.25rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .bank-transfer-section h3 i {
        width: 40px;
        height: 40px;
        background: var(--secondary-gradient);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
    }

    .bank-detail-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem;
        background: white;
        border-radius: 12px;
        margin-bottom: 0.75rem;
    }

    .bank-detail-item:last-child {
        margin-bottom: 0;
    }

    .bank-detail-label {
        font-size: 0.9rem;
        color: #718096;
        font-weight: 600;
    }

    .bank-detail-value {
        font-size: 1rem;
        font-weight: 700;
        color: #2d3748;
    }

    .bank-detail-value.reference {
        font-family: 'Courier New', monospace;
        color: #4facfe;
    }

    /* Action Button */
    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem 2rem;
        background: var(--primary-gradient);
        color: white;
        text-decoration: none;
        border-radius: 12px;
        font-weight: 700;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(79, 172, 254, 0.3);
    }

    .back-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(79, 172, 254, 0.4);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .details-wrapper {
            padding: 1rem;
        }

        .details-header {
            padding: 1.5rem;
        }

        .details-header h1 {
            font-size: 1.4rem;
        }

        .details-grid,
        .bank-transfer-section {
            padding: 1.5rem;
        }

        .detail-row {
            grid-template-columns: 1fr;
            gap: 0.5rem;
        }

        .bank-detail-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }

        .status-banner {
            flex-direction: column;
            text-align: center;
        }
    }
</style>

<div class="details-wrapper">
    <!-- Breadcrumb -->
    <nav class="breadcrumb-nav">
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <i class="fas fa-chevron-right"></i>
        <a href="{{ route('payment.history') }}">Transaction History</a>
        <i class="fas fa-chevron-right"></i>
        <span style="color: #a0aec0; font-weight: 500;">Payment Details</span>
    </nav>

    <!-- Header -->
    <div class="details-header">
        <h1>Payment Details</h1>
        <div class="reference-badge">
            <i class="fas fa-hashtag"></i>
            {{ $payment->payment_reference }}
        </div>
    </div>

    <!-- Status Banner -->
    <div class="status-banner {{ strtolower($payment->payment_status) }}">
        <div class="status-icon">
            @if($payment->payment_status === 'completed')
                <i class="fas fa-check-circle"></i>
            @elseif($payment->payment_status === 'pending')
                <i class="fas fa-clock"></i>
            @else
                <i class="fas fa-times-circle"></i>
            @endif
        </div>
        <div class="status-content">
            <h3>Payment {{ ucfirst($payment->payment_status) }}</h3>
            <p>
                @if($payment->payment_status === 'completed')
                    Your payment has been successfully processed
                @elseif($payment->payment_status === 'pending')
                    Your payment is being processed
                @else
                    This payment transaction failed
                @endif
            </p>
        </div>
    </div>

    <!-- Payment Details -->
    <div class="details-grid">
        <div class="detail-row">
            <div class="detail-label">
                <i class="fas fa-tag"></i>
                Service
            </div>
            <div class="detail-value">{{ ucfirst($payment->service_type) }} - {{ $payment->service_name }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">
                <i class="fas fa-money-bill-wave"></i>
                Amount
            </div>
            <div class="detail-value amount">{{ $payment->formatted_amount }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">
                <i class="fas fa-credit-card"></i>
                Payment Method
            </div>
            <div class="detail-value">
                <span class="method-badge">
                    <i class="{{ $payment->payment_method_icon }}"></i>
                    {{ $payment->payment_method_display }}
                </span>
            </div>
        </div>

        <div class="detail-row">
            <div class="detail-label">
                <i class="fas fa-calendar-alt"></i>
                Transaction Date
            </div>
            <div class="detail-value">{{ $payment->created_at->format('d M Y, H:i') }}</div>
        </div>

        @if($payment->paid_at)
            <div class="detail-row">
                <div class="detail-label">
                    <i class="fas fa-check"></i>
                    Paid At
                </div>
                <div class="detail-value">{{ $payment->paid_at->format('d M Y, H:i') }}</div>
            </div>
        @endif
    </div>

    <!-- Bank Transfer Details (if applicable) -->
    @if($payment->payment_method === 'bank_transfer')
        <div class="bank-transfer-section">
            <h3>
                <i class="fas fa-university"></i>
                Bank Transfer Details
            </h3>

            <div class="bank-detail-item">
                <span class="bank-detail-label">Bank Name</span>
                <span class="bank-detail-value">{{ $payment->getBankTransferDetails()['bank_name'] }}</span>
            </div>

            <div class="bank-detail-item">
                <span class="bank-detail-label">Account Name</span>
                <span class="bank-detail-value">{{ $payment->getBankTransferDetails()['account_name'] }}</span>
            </div>

            <div class="bank-detail-item">
                <span class="bank-detail-label">Account Number</span>
                <span class="bank-detail-value">{{ $payment->getBankTransferDetails()['account_number'] }}</span>
            </div>

            <div class="bank-detail-item">
                <span class="bank-detail-label">Sort Code</span>
                <span class="bank-detail-value">{{ $payment->getBankTransferDetails()['sort_code'] }}</span>
            </div>

            <div class="bank-detail-item">
                <span class="bank-detail-label">Payment Reference</span>
                <span class="bank-detail-value reference">{{ $payment->getBankTransferDetails()['reference'] }}</span>
            </div>
        </div>
    @endif

    <!-- Back Button -->
    <div style="text-align: center;">
        <a href="{{ route('payment.history') }}" class="back-button">
            <i class="fas fa-arrow-left"></i>
            Back to Transaction History
        </a>
    </div>
</div>
@endsection