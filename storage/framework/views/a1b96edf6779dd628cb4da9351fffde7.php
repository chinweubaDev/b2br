<?php $__env->startSection('title', 'Pay with Paystack'); ?>
<?php $__env->startSection('page-title', 'Paystack Payment'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8" style="padding:20px;">
        <h2 class="text-2xl font-bold mb-4" style="color:#000">Pay with Paystack</h2>
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
            <h3 class="text-lg font-semibold mb-2 text-green-700"><i class="fas fa-credit-card mr-2"></i>Paystack Checkout</h3>
            <div class="text-gray-700 mb-4">Click the button below to proceed to Paystack and complete your payment securely.</div>
            <form action="<?php echo e(route('payment.paystack.callback')); ?>" method="GET">
                <input type="hidden" name="reference" value="<?php echo e($payment->payment_reference); ?>">
                <button type="submit" class="w-full flex items-center justify-center px-6 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition-colors duration-200">
                    <i class="fas fa-credit-card mr-2"></i> Simulate Paystack Payment
                </button>
            </form>
        </div>
        <div class="flex flex-col md:flex-row md:space-x-4">
            <a href="<?php echo e(route('payment.history')); ?>" class="w-full mb-2 md:mb-0 px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded-lg hover:bg-gray-200 text-center"><i class="fas fa-list mr-2"></i>View Transaction History</a>
            <a href="/" class="w-full px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 text-center"><i class="fas fa-home mr-2"></i>Back to Home</a>
        </div>
    </div>
</div>

<div class="max-w-lg mx-auto bg-white shadow rounded-lg p-6 mt-8 text-center">
    <h2 class="text-2xl font-bold mb-4 text-blue-700 flex items-center justify-center">
        <img src="/assets/images/logo-light.png" alt="Royeli Logo" class="h-8 mr-2"> Secure Payment
    </h2>
    <p class="mb-4 text-gray-600">You are being redirected to Paystack to complete your payment. Please do not close this window.</p>
    <div class="flex justify-center my-6">
        <i class="fas fa-spinner fa-spin text-3xl text-blue-600"></i>
    </div>
    <div class="text-sm text-gray-500 mt-4">Secured by Paystack</div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u363422527/domains/royelimytravel.com/public_html/b2b/resources/views/admin/payments/payments/paystack.blade.php ENDPATH**/ ?>