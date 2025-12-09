<?php $__env->startSection('title', 'Bank Transfer Details'); ?>
<?php $__env->startSection('page-title', 'Bank Transfer Instructions'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 " style="padding:20px">
        <h2 class="text-2xl font-bold mb-4" style="color:#000 !important">Complete Your Payment</h2>
        <div class="mb-6">
            <div class="flex items-center space-x-4">
                <span class="text-gray-600">Amount:</span>
                <span class="text-xl font-semibold text-green-700"><?php echo e($payment->formatted_amount); ?></span>
            </div>
            <div class="flex items-center space-x-4 mt-2">
                <span class="text-gray-600">Service:</span>
                <span class="font-semibold text-blue-700"><?php echo e(ucfirst($payment->service_type)); ?> - <?php echo e($payment->service_name); ?></span>
            </div>
        </div>
        <div class="bg-gray-50 rounded-lg p-6 mb-6">
            <h3 class="text-lg font-semibold mb-2 text-blue-700"><i class="fas fa-university mr-2"></i>Bank Account Details</h3>
            <ul class="space-y-2" style="color:#000">
                <li><strong>Bank Name:</strong> <?php echo e($payment->getBankTransferDetails()['bank_name']); ?></li>
                <li><strong>Account Name:</strong> <?php echo e($payment->getBankTransferDetails()['account_name']); ?></li>
                <li><strong>Account Number:</strong> <?php echo e($payment->getBankTransferDetails()['account_number']); ?></li>
                <li><strong>Sort Code:</strong> <?php echo e($payment->getBankTransferDetails()['sort_code']); ?></li>
                <li><strong>Payment Reference:</strong> <span class="text-blue-600 font-mono"><?php echo e($payment->getBankTransferDetails()['reference']); ?></span></li>
            </ul>
            <div class="mt-4 text-sm text-gray-600">
                <i class="fas fa-info-circle mr-1 text-blue-400"></i>
                Please use the payment reference above when making your transfer. Your booking will be confirmed once payment is received and verified.
            </div>
        </div>
        <div class="flex flex-col md:flex-row md:space-x-4">
            <a href="<?php echo e(route('payment.history')); ?>" class="w-full mb-2 md:mb-0 px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded-lg hover:bg-gray-200 text-center"><i class="fas fa-list mr-2"></i>View Transaction History</a>
            <a href="/" class="w-full px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 text-center"><i class="fas fa-home mr-2"></i>Back to Home</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u363422527/domains/royelimytravel.com/public_html/b2b/resources/views/admin/payments/payments/bank-transfer.blade.php ENDPATH**/ ?>