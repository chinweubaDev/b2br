<?php $__env->startSection('title', 'Payment Failed'); ?>
<?php $__env->startSection('page-title', 'Payment Failed'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-lg mx-auto bg-white shadow rounded-lg p-6 mt-8 text-center">
    <h2 class="text-2xl font-bold mb-4 text-red-700 flex items-center justify-center">
        <i class="fas fa-times-circle mr-2"></i> Payment Failed
    </h2>
    <p class="mb-4 text-gray-600">Unfortunately, your payment could not be completed. Please try again or contact support if the issue persists.</p>
    <a href="<?php echo e(url()->previous()); ?>" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Try Again</a>
    <a href="mailto:support@royelitravel.com" class="inline-block ml-2 text-blue-600 hover:underline">Contact Support</a>
    <div class="text-sm text-gray-500 mt-4">Secured by Paystack</div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u363422527/domains/royelimytravel.com/public_html/b2b/resources/views/payments/failed.blade.php ENDPATH**/ ?>