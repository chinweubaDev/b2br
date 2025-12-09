<?php $__env->startSection('title', 'Transaction History'); ?>
<?php $__env->startSection('page-title', 'My Payments & Transactions'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto bg-white shadow rounded-lg p-6 mt-8">
    <h2 class="text-2xl font-bold mb-4 text-blue-700 flex items-center">
        <img src="/assets/images/logo-light.png" alt="Royeli Logo" class="h-8 mr-2"> Transaction History
    </h2>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Service</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Method</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-4 py-2"></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="px-4 py-3 whitespace-nowrap text-gray-700"><?php echo e($payment->created_at->format('d M Y, H:i')); ?></td>
                        <td class="px-4 py-3 whitespace-nowrap text-blue-700 font-semibold"><?php echo e(ucfirst($payment->service_type)); ?><br><span class="text-xs text-gray-500"><?php echo e($payment->service_name); ?></span></td>
                        <td class="px-4 py-3 whitespace-nowrap text-green-700 font-semibold"><?php echo e($payment->formatted_amount); ?></td>
                        <td class="px-4 py-3 whitespace-nowrap"><span class="inline-flex items-center px-2 py-1 rounded <?php echo e($payment->status_badge_class); ?>"><i class="<?php echo e($payment->payment_method_icon); ?> mr-1"></i><?php echo e($payment->payment_method_display); ?></span></td>
                        <td class="px-4 py-3 whitespace-nowrap"><span class="inline-block px-2 py-1 rounded <?php echo e($payment->status_badge_class); ?>"><?php echo e(ucfirst($payment->payment_status)); ?></span></td>
                        <td class="px-4 py-3 whitespace-nowrap text-right">
                            <a href="<?php echo e(route('payment.details', $payment)); ?>" class="text-blue-600 hover:underline"><i class="fas fa-eye mr-1"></i>Details</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-400">No payments found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="mt-6">
        <?php echo e($payments->links()); ?>

    </div>
    <div class="mt-6 text-center">
        <a href="<?php echo e(route('dashboard')); ?>" class="text-blue-600 hover:underline">Back to Dashboard</a>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/simeonuba/Downloads/royeli_travel_portal_final/resources/views/payments/history.blade.php ENDPATH**/ ?>