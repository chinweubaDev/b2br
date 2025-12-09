<?php $__env->startSection('title', 'Payment Details'); ?>
<?php $__env->startSection('page-title', 'Payment Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8" style="padding:20px">
        <h2 class="text-2xl font-bold mb-4">Payment Details</h2>
        <div class="mb-6">
            <div class="flex items-center space-x-4 mb-2">
                <span class="text-gray-600">Reference:</span>
                <span class="font-mono text-blue-700"><?php echo e($payment->payment_reference); ?></span>
            </div>
            <div class="flex items-center space-x-4 mb-2">
                <span class="text-gray-600">Service:</span>
                <span class="font-semibold text-blue-700"><?php echo e(ucfirst($payment->service_type)); ?> - <?php echo e($payment->service_name); ?></span>
            </div>
            <div class="flex items-center space-x-4 mb-2">
                <span class="text-gray-600">Amount:</span>
                <span class="text-green-700 font-semibold"><?php echo e($payment->formatted_amount); ?></span>
            </div>
            <div class="flex items-center space-x-4 mb-2">
                <span class="text-gray-600">Status:</span>
                <span class="inline-block px-2 py-1 rounded <?php echo e($payment->status_badge_class); ?>"><?php echo e(ucfirst($payment->payment_status)); ?></span>
            </div>
            <div class="flex items-center space-x-4 mb-2">
                <span class="text-gray-600">Method:</span>
                <span class="inline-flex items-center px-2 py-1 rounded <?php echo e($payment->status_badge_class); ?>"><i class="<?php echo e($payment->payment_method_icon); ?> mr-1"></i><?php echo e($payment->payment_method_display); ?></span>
            </div>
            <?php if($payment->paid_at): ?>
            <div class="flex items-center space-x-4 mb-2">
                <span class="text-gray-600">Paid At:</span>
                <span class="text-gray-700"><?php echo e($payment->paid_at->format('d M Y, H:i')); ?></span>
            </div>
            <?php endif; ?>
        </div>
        <?php if($payment->payment_method === 'bank_transfer'): ?>
        <div class="bg-gray-50 rounded-lg p-4 mb-4">
            <h3 class="text-lg font-semibold mb-2 text-blue-700"><i class="fas fa-university mr-2"></i>Bank Transfer Details</h3>
            <ul class="space-y-2">
                <li><strong>Bank Name:</strong> <?php echo e($payment->getBankTransferDetails()['bank_name']); ?></li>
                <li><strong>Account Name:</strong> <?php echo e($payment->getBankTransferDetails()['account_name']); ?></li>
                <li><strong>Account Number:</strong> <?php echo e($payment->getBankTransferDetails()['account_number']); ?></li>
                <li><strong>Sort Code:</strong> <?php echo e($payment->getBankTransferDetails()['sort_code']); ?></li>
                <li><strong>Payment Reference:</strong> <span class="text-blue-600 font-mono"><?php echo e($payment->getBankTransferDetails()['reference']); ?></span></li>
            </ul>
        </div>
        <?php endif; ?>
        <a href="<?php echo e(route('payment.history')); ?>" class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors duration-200 mt-2"><i class="fas fa-list mr-2"></i>Back to Transaction History</a>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u363422527/domains/royelimytravel.com/public_html/b2b/resources/views/admin/payments/payments/details.blade.php ENDPATH**/ ?>