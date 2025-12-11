<?php $__env->startSection('title', 'Fund Wallet'); ?>

<?php $__env->startSection('content'); ?>
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --secondary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --success-gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
    }

    .fund-wrapper {
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

    /* Header Card */
    .fund-header {
        background: white;
        border-radius: 20px;
        padding: 2.5rem 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        border: 1px solid #f0f0f0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .fund-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 250px;
        height: 250px;
        background: radial-gradient(circle, rgba(79, 172, 254, 0.08) 0%, transparent 70%);
        border-radius: 50%;
    }

    .wallet-icon-wrapper {
        width: 90px;
        height: 90px;
        background: var(--secondary-gradient);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        position: relative;
        z-index: 1;
        animation: scaleIn 0.5s ease-out;
    }

    .wallet-icon-wrapper i {
        font-size: 2.5rem;
        color: white;
    }

    .fund-header h1 {
        font-size: 1.75rem;
        font-weight: 800;
        color: #2d3748;
        margin-bottom: 0.5rem;
        position: relative;
        z-index: 1;
    }

    .fund-header p {
        color: #718096;
        font-size: 0.95rem;
        position: relative;
        z-index: 1;
    }

    /* Balance Card */
    .balance-card {
        background: linear-gradient(135deg, #f5f7fa 0%, #e8eef5 100%);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .balance-card::before {
        content: '';
        position: absolute;
        bottom: -30%;
        left: -10%;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(102, 126, 234, 0.1) 0%, transparent 70%);
        border-radius: 50%;
    }

    .balance-label {
        font-size: 0.9rem;
        color: #4a5568;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 0.75rem;
        position: relative;
        z-index: 1;
    }

    .balance-amount {
        font-size: 2.75rem;
        font-weight: 800;
        background: var(--secondary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        position: relative;
        z-index: 1;
        line-height: 1;
    }

    /* Form Card */
    .form-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        border: 1px solid #f0f0f0;
    }

    .form-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .form-title::before {
        content: '';
        width: 4px;
        height: 24px;
        background: var(--primary-gradient);
        border-radius: 4px;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 0.75rem;
        font-size: 0.95rem;
    }

    .input-wrapper {
        position: relative;
    }

    .currency-symbol {
        position: absolute;
        left: 1.5rem;
        top: 50%;
        transform: translateY(-50%);
        font-size: 1.5rem;
        font-weight: 800;
        color: #718096;
        z-index: 1;
    }

    .amount-input {
        width: 100%;
        padding: 1.25rem 1.5rem 1.25rem 3.5rem;
        font-size: 1.75rem;
        font-weight: 700;
        border: 2px solid #e2e8f0;
        border-radius: 16px;
        background: white;
        transition: all 0.3s ease;
        outline: none;
        color: #2d3748;
    }

    .amount-input:focus {
        border-color: #4facfe;
        box-shadow: 0 0 0 4px rgba(79, 172, 254, 0.1);
    }

    .amount-input::placeholder {
        color: #cbd5e0;
    }

    /* Quick Amount Buttons */
    .quick-amounts {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 0.75rem;
        margin-top: 1rem;
    }

    .quick-amount-btn {
        padding: 0.75rem;
        background: #f7fafc;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-weight: 700;
        font-size: 0.9rem;
        color: #4a5568;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
    }

    .quick-amount-btn:hover {
        background: white;
        border-color: #4facfe;
        color: #4facfe;
        transform: translateY(-2px);
    }

    .hint-text {
        margin-top: 0.75rem;
        font-size: 0.85rem;
        color: #718096;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .hint-text i {
        color: #4facfe;
    }

    /* Submit Button */
    .submit-btn {
        width: 100%;
        padding: 1.25rem;
        background: var(--primary-gradient);
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
        gap: 0.75rem;
        box-shadow: 0 8px 20px rgba(79, 172, 254, 0.3);
    }

    .submit-btn:hover:not(:disabled) {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(79, 172, 254, 0.4);
    }

    .submit-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }

    .submit-btn.loading .spinner {
        display: inline-block;
        animation: spin 1s linear infinite;
    }

    .submit-btn.loading .btn-text {
        display: none;
    }

    .spinner {
        display: none;
    }

    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    /* Links */
    .action-links {
        display: flex;
        justify-content: center;
        gap: 2rem;
        margin-top: 2rem;
    }

    .action-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: #718096;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .action-link:hover {
        color: #4facfe;
        transform: translateX(3px);
    }

    /* Animations */
    @keyframes scaleIn {
        from {
            transform: scale(0);
            opacity: 0;
        }
        to {
            transform: scale(1);
            opacity: 1;
        }
    }

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

    .fund-header,
    .balance-card,
    .form-card {
        animation: fadeIn 0.5s ease-out backwards;
    }

    .fund-header {
        animation-delay: 0.1s;
    }

    .balance-card {
        animation-delay: 0.2s;
    }

    .form-card {
        animation-delay: 0.3s;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .fund-wrapper {
            padding: 1rem;
        }

        .fund-header {
            padding: 2rem 1.5rem;
        }

        .fund-header h1 {
            font-size: 1.4rem;
        }

        .balance-amount {
            font-size: 2.25rem;
        }

        .amount-input {
            font-size: 1.5rem;
            padding: 1rem 1.25rem 1rem 3rem;
        }

        .currency-symbol {
            font-size: 1.25rem;
            left: 1.25rem;
        }

        .quick-amounts {
            grid-template-columns: repeat(2, 1fr);
        }

        .action-links {
            flex-direction: column;
            gap: 1rem;
        }
    }
</style>

<div class="fund-wrapper">
    <!-- Breadcrumb -->
    <nav class="breadcrumb-nav">
        <a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
        <i class="fas fa-chevron-right"></i>
        <span style="color: #a0aec0; font-weight: 500;">Fund Wallet</span>
    </nav>

    <!-- Header -->
    <div class="fund-header">
        <div class="wallet-icon-wrapper">
            <i class="fas fa-wallet"></i>
        </div>
        <h1>Fund Your Wallet</h1>
        <p>Add funds to your wallet for quick and seamless payments</p>
    </div>

    <!-- Current Balance -->
    <div class="balance-card">
        <div class="balance-label">Current Wallet Balance</div>
        <div class="balance-amount">₦<?php echo e(number_format($user->wallet_balance, 2)); ?></div>
    </div>

    <!-- Form -->
    <div class="form-card">
        <h2 class="form-title">Enter Amount</h2>

        <form x-data="{ loading: false, amount: '' }" @submit="loading = true" action="<?php echo e(route('wallet.fund.initiate')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            
            <div class="form-group">
                <label for="amount" class="form-label">Amount to Add</label>
                <div class="input-wrapper">
                    <span class="currency-symbol">₦</span>
                    <input 
                        type="number" 
                        min="1000" 
                        step="0.01"
                        name="amount" 
                        id="amount" 
                        class="amount-input" 
                        placeholder="0.00"
                        x-model="amount"
                        required
                    >
                </div>

                <!-- Quick Amount Buttons -->
                <div class="quick-amounts">
                    <button type="button" class="quick-amount-btn" @click="amount = 5000">₦5,000</button>
                    <button type="button" class="quick-amount-btn" @click="amount = 10000">₦10,000</button>
                    <button type="button" class="quick-amount-btn" @click="amount = 20000">₦20,000</button>
                    <button type="button" class="quick-amount-btn" @click="amount = 50000">₦50,000</button>
                    <button type="button" class="quick-amount-btn" @click="amount = 100000">₦100,000</button>
                    <button type="button" class="quick-amount-btn" @click="amount = 200000">₦200,000</button>
                </div>

                <div class="hint-text">
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
    </div>

    <!-- Action Links -->
    <div class="action-links">
        <a href="<?php echo e(route('payment.history')); ?>" class="action-link">
            <i class="fas fa-history"></i>
            Transaction History
        </a>
        <a href="<?php echo e(route('dashboard')); ?>" class="action-link">
            <i class="fas fa-arrow-left"></i>
            Back to Dashboard
        </a>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/simeonuba/b2br/resources/views/wallet/fund.blade.php ENDPATH**/ ?>