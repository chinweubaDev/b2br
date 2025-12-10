<?php $__env->startSection('title', 'Fund Wallet'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .wallet-container {
        max-width: 600px;
        margin: 0 auto;
    }

    .wallet-card {
        background: white;
        border-radius: 24px;
        padding: 3rem 2.5rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        animation: fadeIn 0.6s ease-out;
    }

    .wallet-header {
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .wallet-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        animation: scaleIn 0.5s ease-out;
    }

    .wallet-icon i {
        font-size: 2.5rem;
        color: white;
    }

    .wallet-header h2 {
        font-size: 2rem;
        font-weight: 700;
        color: var(--color-gray-900);
        margin-bottom: 0.5rem;
    }

    .wallet-header p {
        font-size: 1rem;
        color: var(--color-gray-600);
        line-height: 1.6;
    }

    .current-balance {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        border-radius: 16px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        text-align: center;
    }

    .balance-label {
        font-size: 0.9rem;
        color: var(--color-gray-600);
        margin-bottom: 0.5rem;
    }

    .balance-amount {
        font-size: 2.5rem;
        font-weight: 700;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .form-group {
        margin-bottom: 2rem;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        color: var(--color-gray-700);
        margin-bottom: 0.75rem;
        font-size: 1rem;
    }

    .input-wrapper {
        position: relative;
    }

    .currency-symbol {
        position: absolute;
        left: 1.25rem;
        top: 50%;
        transform: translateY(-50%);
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--color-gray-500);
    }

    .amount-input {
        width: 100%;
        padding: 1rem 1.25rem 1rem 3rem;
        font-size: 1.5rem;
        font-weight: 600;
        border: 2px solid var(--color-gray-200);
        border-radius: 16px;
        background: white;
        transition: all 0.3s ease;
        outline: none;
    }

    .amount-input:focus {
        border-color: var(--color-primary);
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    }

    .min-amount-hint {
        margin-top: 0.75rem;
        font-size: 0.875rem;
        color: var(--color-gray-500);
        display: flex;
        align-items: center;
    }

    .min-amount-hint i {
        margin-right: 0.5rem;
    }

    .submit-btn {
        width: 100%;
        padding: 1.25rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
    }

    .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(102, 126, 234, 0.4);
    }

    .submit-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }

    .submit-btn i {
        margin-right: 0.75rem;
    }

    .submit-btn .spinner {
        display: none;
        margin-right: 0.75rem;
    }

    .submit-btn.loading .spinner {
        display: inline-block;
        animation: spin 1s linear infinite;
    }

    .submit-btn.loading .btn-text {
        display: none;
    }

    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .history-link {
        text-align: center;
        margin-top: 2rem;
    }

    .history-link a {
        color: var(--color-primary);
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        display: inline-flex;
        align-items: center;
        transition: all 0.3s ease;
    }

    .history-link a:hover {
        transform: translateX(5px);
    }

    .history-link a i {
        margin-right: 0.5rem;
    }

    @media (max-width: 768px) {
        .wallet-card {
            padding: 2rem 1.5rem;
        }

        .wallet-header h2 {
            font-size: 1.75rem;
        }

        .balance-amount {
            font-size: 2rem;
        }

        .amount-input {
            font-size: 1.25rem;
        }
    }
</style>

<div class="wallet-container">
    <div class="wallet-card">
        <div class="wallet-header">
            <div class="wallet-icon">
                <i class="fas fa-wallet"></i>
            </div>
            <h2>Fund Your Wallet</h2>
            <p>Add funds to your wallet for quick and easy payments. Minimum amount: ₦1,000</p>
        </div>

        <div class="current-balance">
            <div class="balance-label">Current Wallet Balance</div>
            <div class="balance-amount">₦<?php echo e(number_format($user->wallet_balance)); ?></div>
        </div>

        <form x-data="{ loading: false }" @submit="loading = true" action="<?php echo e(route('wallet.fund.initiate')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            
            <div class="form-group">
                <label for="amount">Amount to Add</label>
                <div class="input-wrapper">
                    <span class="currency-symbol">₦</span>
                    <input 
                        type="number" 
                        min="1000" 
                        name="amount" 
                        id="amount" 
                        class="amount-input" 
                        placeholder="0.00"
                        required
                    >
                </div>
                <div class="min-amount-hint">
                    <i class="fas fa-info-circle"></i>
                    <span>Minimum funding amount is ₦1,000</span>
                </div>
            </div>

            <button type="submit" :disabled="loading" class="submit-btn" :class="{ 'loading': loading }">
                <i class="fas fa-spinner spinner"></i>
                <span class="btn-text">
                    <i class="fas fa-credit-card"></i>
                    Proceed to Payment
                </span>
                <span x-show="loading" style="display: none;">Processing...</span>
            </button>
        </form>

        <div class="history-link">
            <a href="<?php echo e(route('payments.history')); ?>">
                <i class="fas fa-history"></i>
                View Transaction History
            </a>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\creat\Downloads\b2b\resources\views/wallet/fund.blade.php ENDPATH**/ ?>