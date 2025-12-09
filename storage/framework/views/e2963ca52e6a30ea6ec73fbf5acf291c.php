<?php $__env->startSection('title', 'Payment Successful'); ?>
<?php $__env->startSection('page-title', 'Payment Successful'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-lg mx-auto bg-white shadow rounded-lg p-6 mt-8 text-center">
    <h2 class="text-2xl font-bold mb-4 text-green-700 flex items-center justify-center">
        <i class="fas fa-check-circle mr-2"></i> Payment Successful
    </h2>
    <p class="mb-4 text-gray-600">Thank you! Your payment was successful. Below is your transaction receipt:</p>
    <div class="bg-gray-50 rounded p-4 mb-4 text-left">
        <div><span class="font-semibold">Reference:</span> <?php echo e($payment->payment_reference ?? $payment->id); ?></div>
        <div><span class="font-semibold">Amount:</span> ₦<?php echo e(number_format($payment->amount)); ?></div>
        <div><span class="font-semibold">Date:</span> <?php echo e($payment->created_at->format('Y-m-d H:i')); ?></div>
        <div><span class="font-semibold">Status:</span> <span class="text-green-700 font-bold">Completed</span></div>
    </div>
    <a href="<?php echo e(route('payments.history')); ?>" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">View Transaction History</a>
    <a href="<?php echo e(route('dashboard')); ?>" class="inline-block ml-2 text-blue-600 hover:underline">Back to Dashboard</a>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u363422527/domains/royelimytravel.com/public_html/b2b/resources/views/admin/payments/payments/success.blade.php ENDPATH**/ ?>