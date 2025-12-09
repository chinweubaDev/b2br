<?php $__env->startSection('title', 'Fund Wallet'); ?>
<?php $__env->startSection('content'); ?>
<div class="max-w-lg mx-auto bg-white shadow rounded-lg p-6 mt-8">
    <h2 class="text-2xl font-bold mb-4 text-blue-700 flex items-center">
        Fund Your Wallet
    </h2>
    <p class="mb-4 text-gray-600">Enter the amount you wish to add to your wallet. You will be redirected to Paystack to complete your payment. Minimum amount: ₦1,000.</p>
    <div class="mb-4 text-sm text-gray-700">Current Wallet Balance: <span class="font-bold text-green-700">₦<?php echo e(number_format($user->wallet_balance)); ?></span></div>
    <form x-data="{ loading: false }" @submit="loading = true" action="<?php echo e(route('wallet.fund.initiate')); ?>" method="POST" class="space-y-4">
        <?php echo csrf_field(); ?>
        <div>
            <label for="amount" class="block text-gray-700 font-semibold mb-2">Amount</label>
            <input type="number" min="1000" name="amount" id="amount" class="w-full border rounded px-3 py-2" required>
        </div>
        <button type="submit" :disabled="loading" class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 flex items-center justify-center">
            <span x-show="!loading">Fund Wallet</span>
            <span x-show="loading"><i class="fas fa-spinner fa-spin mr-2"></i>Processing...</span>
        </button>
    </form>
    <div class="mt-6 text-center">
        <a href="<?php echo e(route('payments.history')); ?>" class="text-blue-600 hover:underline">View Transaction History</a>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u363422527/domains/royelimytravel.com/public_html/b2b/resources/views/admin/wallet/wallet/fund.blade.php ENDPATH**/ ?>