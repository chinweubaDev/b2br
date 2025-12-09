<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Bookings</h1>
        <a href="<?php echo e(route('bookings.create')); ?>" class="btn-primary">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            New Booking
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <!-- Filters -->
    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label for="status_filter" class="form-label">Status</label>
                <select id="status_filter" class="form-input">
                    <option value="">All Status</option>
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
            <div>
                <label for="type_filter" class="form-label">Type</label>
                <select id="type_filter" class="form-input">
                    <option value="">All Types</option>
                    <option value="visa">Visa</option>
                    <option value="tour">Tour</option>
                    <option value="hotel">Hotel</option>
                    <option value="cruise">Cruise</option>
                    <option value="documentation">Documentation</option>
                </select>
            </div>
            <div>
                <label for="date_from" class="form-label">From Date</label>
                <input type="date" id="date_from" class="form-input">
            </div>
            <div>
                <label for="date_to" class="form-label">To Date</label>
                <input type="date" id="date_to" class="form-input">
            </div>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="table-header">Reference</th>
                        <th class="table-header">Customer</th>
                        <th class="table-header">Service</th>
                        <th class="table-header">Type</th>
                        <th class="table-header">Amount</th>
                        <th class="table-header">Travel Date</th>
                        <th class="table-header">Status</th>
                        <th class="table-header">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php $__empty_1 = true; $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="table-cell">
                                <div class="text-sm font-medium text-gray-900"><?php echo e($booking->reference_number); ?></div>
                                <div class="text-sm text-gray-500"><?php echo e($booking->created_at->format('M d, Y')); ?></div>
                            </td>
                            <td class="table-cell">
                                <div class="text-sm font-medium text-gray-900"><?php echo e($booking->user->name); ?></div>
                                <div class="text-sm text-gray-500"><?php echo e($booking->user->email); ?></div>
                            </td>
                            <td class="table-cell">
                                <div class="text-sm font-medium text-gray-900"><?php echo e($booking->service_name); ?></div>
                                <div class="text-sm text-gray-500"><?php echo e(Str::limit($booking->description, 50)); ?></div>
                            </td>
                            <td class="table-cell">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    <?php if($booking->booking_type == 'visa'): ?> bg-blue-100 text-blue-800
                                    <?php elseif($booking->booking_type == 'tour'): ?> bg-green-100 text-green-800
                                    <?php elseif($booking->booking_type == 'hotel'): ?> bg-purple-100 text-purple-800
                                    <?php elseif($booking->booking_type == 'cruise'): ?> bg-indigo-100 text-indigo-800
                                    <?php else: ?> bg-gray-100 text-gray-800
                                    <?php endif; ?>">
                                    <?php echo e(ucfirst($booking->booking_type)); ?>

                                </span>
                            </td>
                            <td class="table-cell">
                                <div class="text-sm font-medium text-gray-900">₦<?php echo e(number_format($booking->amount, 2)); ?></div>
                                <div class="text-sm text-gray-500"><?php echo e($booking->currency); ?></div>
                            </td>
                            <td class="table-cell">
                                <?php if($booking->travel_date): ?>
                                    <div class="text-sm text-gray-900"><?php echo e($booking->travel_date->format('M d, Y')); ?></div>
                                    <?php if($booking->return_date): ?>
                                        <div class="text-sm text-gray-500">to <?php echo e($booking->return_date->format('M d, Y')); ?></div>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span class="text-sm text-gray-500">Not specified</span>
                                <?php endif; ?>
                            </td>
                            <td class="table-cell">
                                <span class="status-badge 
                                    <?php if($booking->status == 'pending'): ?> status-pending
                                    <?php elseif($booking->status == 'confirmed'): ?> status-confirmed
                                    <?php elseif($booking->status == 'completed'): ?> status-completed
                                    <?php else: ?> status-cancelled
                                    <?php endif; ?>">
                                    <?php echo e(ucfirst($booking->status)); ?>

                                </span>
                            </td>
                            <td class="table-cell">
                                <div class="flex space-x-2">
                                    <a href="<?php echo e(route('bookings.show', $booking)); ?>" class="text-blue-600 hover:text-blue-900">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </a>
                                    <a href="<?php echo e(route('bookings.edit', $booking)); ?>" class="text-indigo-600 hover:text-indigo-900">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <a href="<?php echo e(route('bookings.invoice', $booking)); ?>" class="text-green-600 hover:text-green-900">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </a>
                                    <form action="<?php echo e(route('bookings.destroy', $booking)); ?>" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this booking?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="8" class="table-cell text-center text-gray-500 py-8">
                                No bookings found. <a href="<?php echo e(route('bookings.create')); ?>" class="text-blue-600 hover:text-blue-900">Create your first booking</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <?php if($bookings->hasPages()): ?>
        <div class="mt-6">
            <?php echo e($bookings->links()); ?>

        </div>
    <?php endif; ?>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
    // Filter functionality
    document.addEventListener('DOMContentLoaded', function() {
        const statusFilter = document.getElementById('status_filter');
        const typeFilter = document.getElementById('type_filter');
        const dateFrom = document.getElementById('date_from');
        const dateTo = document.getElementById('date_to');

        function applyFilters() {
            const params = new URLSearchParams();
            if (statusFilter.value) params.append('status', statusFilter.value);
            if (typeFilter.value) params.append('type', typeFilter.value);
            if (dateFrom.value) params.append('date_from', dateFrom.value);
            if (dateTo.value) params.append('date_to', dateTo.value);
            
            window.location.search = params.toString();
        }

        statusFilter.addEventListener('change', applyFilters);
        typeFilter.addEventListener('change', applyFilters);
        dateFrom.addEventListener('change', applyFilters);
        dateTo.addEventListener('change', applyFilters);
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u363422527/domains/royelimytravel.com/public_html/b2b/resources/views/admin/bookings/index.blade.php ENDPATH**/ ?>