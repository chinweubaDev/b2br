<?php $__env->startSection('title', 'Payment Options'); ?>

<?php $__env->startSection('content'); ?>
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --secondary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --success-gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        --glass-bg: rgba(255, 255, 255, 0.95);
    }

    .payment-wrapper {
        max-width: 900px;
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
        display: inline-flex;
        align-items: center;
    }

    .breadcrumb-nav a:hover {
        color: #4facfe;
    }

    .breadcrumb-nav i {
        margin: 0 0.5rem;
        font-size: 0.7rem;
        color: #cbd5e0;
    }

    .breadcrumb-current {
        color: #a0aec0;
        font-weight: 500;
    }

    /* Header Section */
    .payment-header {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        border: 1px solid #f0f0f0;
    }

    .payment-header h1 {
        font-size: 1.75rem;
        font-weight: 800;
        color: #2d3748;
        margin-bottom: 0.5rem;
    }

    .service-name {
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-size: 1.1rem;
        font-weight: 600;
    }

    .payment-header p {
        color: #718096;
        font-size: 0.95rem;
    }

    /* Summary Card */
    .summary-card {
        background: linear-gradient(135deg, #f5f7fa 0%, #e8eef5 100%);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .summary-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(79, 172, 254, 0.1) 0%, transparent 70%);
        border-radius: 50%;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.75rem 0;
        position: relative;
        z-index: 1;
    }

    .summary-row:not(:last-child) {
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .summary-row:last-child {
        margin-top: 0.5rem;
        padding-top: 1.25rem;
        border-top: 2px solid rgba(0, 0, 0, 0.1);
    }

    .summary-label {
        font-size: 0.95rem;
        color: #4a5568;
        font-weight: 500;
    }

    .summary-value {
        font-size: 1rem;
        font-weight: 700;
        color: #2d3748;
    }

    .summary-value.amount {
        font-size: 1.75rem;
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .balance-indicator {
        display: inline-flex;
        align-items: center;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        margin-left: 0.5rem;
    }

    .balance-indicator.sufficient {
        background: rgba(72, 187, 120, 0.1);
        color: #48bb78;
    }

    .balance-indicator.insufficient {
        background: rgba(245, 87, 108, 0.1);
        color: #f5576c;
    }

    /* Payment Methods */
    .methods-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
    }

    .methods-title::before {
        content: '';
        width: 4px;
        height: 24px;
        background: var(--primary-gradient);
        border-radius: 4px;
        margin-right: 0.75rem;
    }

    .payment-methods {
        display: grid;
        gap: 1.25rem;
        margin-bottom: 2rem;
    }

    .payment-method {
        background: white;
        border: 2px solid #e2e8f0;
        border-radius: 16px;
        padding: 0;
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }

    .payment-method::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 5px;
        height: 100%;
        background: var(--method-gradient);
        transform: scaleX(0);
        transition: transform 0.3s ease;
        transform-origin: left;
    }

    .payment-method:hover:not(.disabled) {
        border-color: var(--method-color);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        transform: translateY(-3px);
    }

    .payment-method:hover:not(.disabled)::before {
        transform: scaleX(1);
    }

    .payment-method.disabled {
        opacity: 0.6;
        cursor: not-allowed;
        background: #f7fafc;
    }

    .payment-method.disabled:hover {
        transform: none;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }

    .method-button {
        width: 100%;
        background: none;
        border: none;
        padding: 1.75rem;
        text-align: left;
        cursor: inherit;
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }

    .method-icon {
        width: 70px;
        height: 70px;
        border-radius: 16px;
        background: var(--method-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
    }

    .method-icon i {
        font-size: 2rem;
        color: white;
    }

    .method-info {
        flex: 1;
    }

    .method-info h3 {
        font-size: 1.15rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 0.35rem;
    }

    .method-info p {
        font-size: 0.9rem;
        color: #718096;
        margin: 0;
    }

    .method-badge {
        padding: 0.5rem 1rem;
        background: var(--success-gradient);
        color: white;
        border-radius: 25px;
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        box-shadow: 0 4px 10px rgba(250, 112, 154, 0.3);
        flex-shrink: 0;
    }

    /* Insufficient Notice */
    .insufficient-notice {
        background: rgba(245, 87, 108, 0.08);
        border: 1px solid rgba(245, 87, 108, 0.2);
        border-radius: 12px;
        padding: 1rem 1.25rem;
        margin: -0.5rem 1.75rem 1rem 1.75rem;
        color: #c53030;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .insufficient-notice i {
        font-size: 1.1rem;
        flex-shrink: 0;
    }

    .insufficient-notice a {
        color: #c53030;
        font-weight: 700;
        text-decoration: underline;
        transition: opacity 0.2s;
    }

    .insufficient-notice a:hover {
        opacity: 0.8;
    }

    /* Back Link */
    .back-link {
        text-align: center;
        margin-top: 2.5rem;
    }

    .back-link a {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: #718096;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
    }

    .back-link a:hover {
        color: #2d3748;
        background: #f7fafc;
        transform: translateX(-5px);
    }

    /* Animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .payment-header,
    .summary-card,
    .payment-method {
        animation: fadeIn 0.5s ease-out backwards;
    }

    .payment-header {
        animation-delay: 0.1s;
    }

    .summary-card {
        animation-delay: 0.2s;
    }

    .payment-method:nth-child(1) {
        animation-delay: 0.3s;
    }

    .payment-method:nth-child(2) {
        animation-delay: 0.4s;
    }

    .payment-method:nth-child(3) {
        animation-delay: 0.5s;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .payment-wrapper {
            padding: 1rem;
        }

        .payment-header {
            padding: 1.5rem;
        }

        .payment-header h1 {
            font-size: 1.4rem;
        }

        .summary-card {
            padding: 1.5rem;
        }

        .method-button {
            flex-direction: column;
            text-align: center;
            padding: 1.5rem;
        }

        .method-icon {
            width: 60px;
            height: 60px;
        }

        .method-icon i {
            font-size: 1.5rem;
        }

        .method-badge {
            margin-top: 0.75rem;
        }

        .insufficient-notice {
            margin: -0.5rem 1rem 1rem 1rem;
        }
    }
</style>

<div class="payment-wrapper">
    <!-- Breadcrumb -->
    <nav class="breadcrumb-nav">
        <a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
        <i class="fas fa-chevron-right"></i>
        <span class="breadcrumb-current">Payment Options</span>
    </nav>

    <!-- Header -->
    <div class="payment-header">
        <h1>Complete Your Payment</h1>
        <p>Service: <span class="service-name"><?php echo e(ucfirst($serviceType)); ?> - <?php echo e($service->service_name ?? $service->name ?? 'Service'); ?></span></p>
    </div>

    <!-- Summary Card -->
    <div class="summary-card">
        <div class="summary-row">
            <span class="summary-label">Service Type</span>
            <span class="summary-value"><?php echo e(ucfirst($serviceType)); ?></span>
        </div>
        <div class="summary-row">
            <span class="summary-label">Your Wallet Balance</span>
            <span class="summary-value">
                <?php echo e(auth()->user()->formatted_wallet_balance ?? '₦0.00'); ?>

                <?php if(auth()->user()->wallet_balance >= $amount): ?>
                    <span class="balance-indicator sufficient">
                        <i class="fas fa-check-circle"></i> Sufficient
                    </span>
                <?php else: ?>
                    <span class="balance-indicator insufficient">
                        <i class="fas fa-exclamation-circle"></i> Low
                    </span>
                <?php endif; ?>
            </span>
        </div>
        <div class="summary-row">
            <span class="summary-label">Amount to Pay</span>
            <span class="summary-value amount">₦<?php echo e(number_format($amount, 2)); ?></span>
        </div>
    </div>

    <!-- Payment Methods -->
    <h2 class="methods-title">Choose Payment Method</h2>
    <div class="payment-methods">
        <!-- Wallet Payment -->
        <form action="<?php echo e(route('payment.wallet', [$serviceType, $serviceId])); ?>" method="POST" class="payment-method <?php echo e(auth()->user()->wallet_balance < $amount ? 'disabled' : ''); ?>" style="--method-gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%); --method-color: #fa709a;">
            <?php echo csrf_field(); ?>
            <button type="submit" class="method-button" <?php echo e(auth()->user()->wallet_balance < $amount ? 'disabled' : ''); ?>>
                <div class="method-icon">
                    <i class="fas fa-wallet"></i>
                </div>
                <div class="method-info">
                    <h3>Pay with Wallet</h3>
                    <p>Instant payment using your wallet balance</p>
                </div>
                <?php if(auth()->user()->wallet_balance >= $amount): ?>
                    <div class="method-badge">Fastest</div>
                <?php endif; ?>
            </button>
            <?php if(auth()->user()->wallet_balance < $amount): ?>
                <div class="insufficient-notice">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span>Insufficient balance. <a href="<?php echo e(route('wallet.fund')); ?>">Fund your wallet</a> to use this option.</span>
                </div>
            <?php endif; ?>
        </form>

        <!-- Bank Transfer -->
        <form action="<?php echo e(route('payment.bank-transfer', [$serviceType, $serviceId])); ?>" method="POST" class="payment-method" style="--method-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%); --method-color: #667eea;">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="amount" value="<?php echo e($amount); ?>">
            <button type="submit" class="method-button">
                <div class="method-icon">
                    <i class="fas fa-university"></i>
                </div>
                <div class="method-info">
                    <h3>Bank Transfer</h3>
                    <p>Transfer directly to our bank account</p>
                </div>
            </button>
        </form>

        <!-- Paystack (Card) -->
        <form action="<?php echo e(route('payment.paystack', [$serviceType, $serviceId])); ?>" method="POST" class="payment-method" style="--method-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); --method-color: #4facfe;">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="amount" value="<?php echo e($amount); ?>">
            <button type="submit" class="method-button">
                <div class="method-icon">
                    <i class="fas fa-credit-card"></i>
                </div>
                <div class="method-info">
                    <h3>Pay with Card (Paystack)</h3>
                    <p>Secure payment with debit or credit card</p>
                </div>
            </button>
        </form>
    </div>

    <!-- Back Link -->
    <div class="back-link">
        <a href="<?php echo e(url()->previous()); ?>">
            <i class="fas fa-arrow-left"></i>
            Back to Previous Page
        </a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/simeonuba/b2br/resources/views/payments/options.blade.php ENDPATH**/ ?>