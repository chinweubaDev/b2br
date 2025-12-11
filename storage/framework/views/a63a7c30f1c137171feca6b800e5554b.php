<?php $__env->startSection('title', 'Bank Transfer Details'); ?>

<?php $__env->startSection('content'); ?>
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --secondary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .bank-transfer-wrapper {
        max-width: 700px;
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

    /* Success Banner */
    .success-banner {
        background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        color: white;
        text-align: center;
        box-shadow: 0 8px 25px rgba(72, 187, 120, 0.3);
    }

    .success-banner i {
        font-size: 3rem;
        margin-bottom: 1rem;
        opacity: 0.9;
    }

    .success-banner h2 {
        font-size: 1.5rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
    }

    .success-banner p {
        opacity: 0.95;
        font-size: 0.95rem;
    }

    /* Payment Summary */
    .payment-summary {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        border: 1px solid #f0f0f0;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .summary-row:last-child {
        border-bottom: none;
        padding-top: 1.5rem;
        margin-top: 0.5rem;
        border-top: 2px solid #e2e8f0;
    }

    .summary-label {
        font-size: 0.95rem;
        color: #718096;
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

    /* Bank Details Card */
    .bank-details-card {
        background: linear-gradient(135deg, #f5f7fa 0%, #e8eef5 100%);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .bank-details-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(102, 126, 234, 0.1) 0%, transparent 70%);
        border-radius: 50%;
    }

    .bank-details-card h3 {
        font-size: 1.25rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        position: relative;
        z-index: 1;
    }

    .bank-details-card h3 i {
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

    .detail-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem;
        background: white;
        border-radius: 12px;
        margin-bottom: 0.75rem;
        position: relative;
        z-index: 1;
    }

    .detail-item:last-of-type {
        margin-bottom: 0;
    }

    .detail-label {
        font-size: 0.9rem;
        color: #718096;
        font-weight: 600;
    }

    .detail-value {
        font-size: 1rem;
        font-weight: 700;
        color: #2d3748;
    }

    .detail-value.reference {
        font-family: 'Courier New', monospace;
        color: #4facfe;
        background: rgba(79, 172, 254, 0.1);
        padding: 0.5rem 1rem;
        border-radius: 8px;
    }

    /* Info Notice */
    .info-notice {
        background: rgba(79, 172, 254, 0.08);
        border: 1px solid rgba(79, 172, 254, 0.2);
        border-radius: 12px;
        padding: 1.25rem;
        margin-top: 1.5rem;
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        position: relative;
        z-index: 1;
    }

    .info-notice i {
        font-size: 1.5rem;
        color: #4facfe;
        flex-shrink: 0;
        margin-top: 0.1rem;
    }

    .info-notice p {
        color: #2d3748;
        font-size: 0.9rem;
        line-height: 1.6;
        margin: 0;
    }

    /* Action Buttons */
    .action-buttons {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 1rem 1.5rem;
        border-radius: 12px;
        font-weight: 700;
        font-size: 0.95rem;
        text-decoration: none;
        transition: all 0.3s ease;
        text-align: center;
    }

    .btn-secondary {
        background: white;
        color: #4a5568;
        border: 2px solid #e2e8f0;
    }

    .btn-secondary:hover {
        background: #f7fafc;
        border-color: #cbd5e0;
        transform: translateY(-2px);
    }

    .btn-primary {
        background: var(--primary-gradient);
        color: white;
        box-shadow: 0 4px 15px rgba(79, 172, 254, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(79, 172, 254, 0.4);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .bank-transfer-wrapper {
            padding: 1rem;
        }

        .success-banner {
            padding: 1.5rem;
        }

        .success-banner h2 {
            font-size: 1.25rem;
        }

        .payment-summary,
        .bank-details-card {
            padding: 1.5rem;
        }

        .action-buttons {
            grid-template-columns: 1fr;
        }

        .summary-row {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }

        .detail-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }
    }
</style>

<div class="bank-transfer-wrapper">
    <!-- Breadcrumb -->
    <nav class="breadcrumb-nav">
        <a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
        <i class="fas fa-chevron-right"></i>
        <a href="<?php echo e(route('payment.history')); ?>">Payments</a>
        <i class="fas fa-chevron-right"></i>
        <span style="color: #a0aec0; font-weight: 500;">Bank Transfer</span>
    </nav>

    <!-- Success Banner -->
    <div class="success-banner">
        <i class="fas fa-check-circle"></i>
        <h2>Payment Initiated Successfully</h2>
        <p>Please complete your transfer using the details below</p>
    </div>

    <!-- Payment Summary -->
    <div class="payment-summary">
        <div class="summary-row">
            <span class="summary-label">Service</span>
            <span class="summary-value"><?php echo e(ucfirst($payment->service_type)); ?> - <?php echo e($payment->service_name); ?></span>
        </div>
        <div class="summary-row">
            <span class="summary-label">Amount to Transfer</span>
            <span class="summary-value amount"><?php echo e($payment->formatted_amount); ?></span>
        </div>
    </div>

    <!-- Bank Details -->
    <div class="bank-details-card">
        <h3>
            <i class="fas fa-university"></i>
            Bank Account Details
        </h3>

        <div class="detail-item">
            <span class="detail-label">Bank Name</span>
            <span class="detail-value"><?php echo e($payment->getBankTransferDetails()['bank_name']); ?></span>
        </div>

        <div class="detail-item">
            <span class="detail-label">Account Name</span>
            <span class="detail-value"><?php echo e($payment->getBankTransferDetails()['account_name']); ?></span>
        </div>

        <div class="detail-item">
            <span class="detail-label">Account Number</span>
            <span class="detail-value"><?php echo e($payment->getBankTransferDetails()['account_number']); ?></span>
        </div>

        <div class="detail-item">
            <span class="detail-label">Sort Code</span>
            <span class="detail-value"><?php echo e($payment->getBankTransferDetails()['sort_code']); ?></span>
        </div>

        <div class="detail-item">
            <span class="detail-label">Payment Reference</span>
            <span class="detail-value reference"><?php echo e($payment->getBankTransferDetails()['reference']); ?></span>
        </div>

        <div class="info-notice">
            <i class="fas fa-info-circle"></i>
            <p><strong>Important:</strong> Please use the payment reference above when making your transfer. Your booking will be confirmed once payment is received and verified by our team.</p>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="action-buttons">
        <a href="<?php echo e(route('payment.history')); ?>" class="btn btn-secondary">
            <i class="fas fa-list"></i>
            View History
        </a>
        <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-primary">
            <i class="fas fa-home"></i>
            Back to Dashboard
        </a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/simeonuba/b2br/resources/views/payments/bank-transfer.blade.php ENDPATH**/ ?>