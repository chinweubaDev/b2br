<?php $__env->startSection('title', 'Booking #' . $booking->reference_number . ' - Royeli Tours & Travel'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <nav class="flex mb-4" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="<?php echo e(route('dashboard')); ?>" class="text-gray-700 hover:text-blue-600">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <a href="<?php echo e(route('bookings.index')); ?>" class="ml-1 text-gray-700 hover:text-blue-600 md:ml-2">Bookings</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-gray-500 md:ml-2">Booking #<?php echo e($booking->reference_number); ?></span>
                            </div>
                        </li>
                    </ol>
                </nav>
                
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Booking #<?php echo e($booking->reference_number); ?></h1>
                        <p class="mt-2 text-gray-600"><?php echo e($booking->service_name); ?> • <?php echo e(ucfirst($booking->booking_type)); ?></p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <a href="<?php echo e(route('bookings.edit', $booking)); ?>" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fas fa-edit mr-2"></i>
                            Edit Booking
                        </a>
                        <a href="<?php echo e(route('bookings.invoice', $booking)); ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fas fa-file-invoice mr-2"></i>
                            View Invoice
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Booking Status -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-semibold text-gray-900">Booking Status</h2>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                        <?php if($booking->status == 'confirmed'): ?> bg-green-100 text-green-800
                        <?php elseif($booking->status == 'pending'): ?> bg-yellow-100 text-yellow-800
                        <?php elseif($booking->status == 'completed'): ?> bg-blue-100 text-blue-800
                        <?php else: ?> bg-red-100 text-red-800
                        <?php endif; ?>">
                        <i class="fas fa-circle mr-2 text-xs"></i>
                        <?php echo e(ucfirst($booking->status)); ?>

                    </span>
                </div>
                
                <!-- Status Timeline -->
                <div class="mt-6">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">Booking Created</p>
                            <p class="text-sm text-gray-500"><?php echo e($booking->created_at->format('M d, Y H:i')); ?></p>
                        </div>
                    </div>
                    
                    <?php if($booking->status != 'pending'): ?>
                        <div class="flex items-center space-x-4 mt-4">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-check text-white text-sm"></i>
                                </div>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">Booking Confirmed</p>
                                <p class="text-sm text-gray-500"><?php echo e($booking->updated_at->format('M d, Y H:i')); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Service Details -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Service Details</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Service Type</label>
                            <p class="text-lg font-medium text-gray-900"><?php echo e(ucfirst($booking->booking_type)); ?></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Service Name</label>
                            <p class="text-lg font-medium text-gray-900"><?php echo e($booking->service_name); ?></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Reference Number</label>
                            <p class="text-lg font-medium text-gray-900"><?php echo e($booking->reference_number); ?></p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Amount</label>
                            <p class="text-lg font-medium text-gray-900"><?php echo e($booking->currency); ?> <?php echo e(number_format($booking->amount, 2)); ?></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Passengers</label>
                            <p class="text-lg font-medium text-gray-900"><?php echo e($booking->passengers ?? 'Not specified'); ?></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Booking Date</label>
                            <p class="text-lg font-medium text-gray-900"><?php echo e($booking->created_at->format('M d, Y')); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Travel Details -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Travel Details</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Travel Date</label>
                            <p class="text-lg font-medium text-gray-900">
                                <?php echo e($booking->travel_date ? \Carbon\Carbon::parse($booking->travel_date)->format('M d, Y') : 'Not specified'); ?>

                            </p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Return Date</label>
                            <p class="text-lg font-medium text-gray-900">
                                <?php echo e($booking->return_date ? \Carbon\Carbon::parse($booking->return_date)->format('M d, Y') : 'Not specified'); ?>

                            </p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Duration</label>
                            <p class="text-lg font-medium text-gray-900">
                                <?php if($booking->travel_date && $booking->return_date): ?>
                                    <?php echo e(\Carbon\Carbon::parse($booking->travel_date)->diffInDays(\Carbon\Carbon::parse($booking->return_date))); ?> Days
                                <?php else: ?>
                                    Not specified
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Description</h2>
                <div class="prose max-w-none">
                    <p class="text-gray-700 leading-relaxed"><?php echo e($booking->description ?? 'No description available for this booking.'); ?></p>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Special Requirements</h2>
                    <div class="prose max-w-none">
                        <p class="text-gray-700 leading-relaxed"><?php echo e($booking->special_requirements ?? 'No special requirements specified.'); ?></p>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Notes</h2>
                    <div class="prose max-w-none">
                        <p class="text-gray-700 leading-relaxed"><?php echo e($booking->notes ?? 'No additional notes.'); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Pricing Summary -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Pricing Summary</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Service Amount:</span>
                        <span class="text-lg font-bold text-gray-900"><?php echo e($booking->currency); ?> <?php echo e(number_format($booking->amount, 2)); ?></span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Taxes & Fees:</span>
                        <span class="text-lg font-bold text-gray-900"><?php echo e($booking->currency); ?> 0.00</span>
                    </div>
                    <div class="pt-4 border-t border-gray-200">
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-semibold text-gray-900">Total:</span>
                            <span class="text-xl font-bold text-green-600"><?php echo e($booking->currency); ?> <?php echo e(number_format($booking->amount, 2)); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <a href="<?php echo e(route('bookings.edit', $booking)); ?>" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg font-medium text-center block">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Booking
                    </a>
                    <a href="<?php echo e(route('bookings.invoice', $booking)); ?>" class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg font-medium text-center block">
                        <i class="fas fa-file-invoice mr-2"></i>
                        Download Invoice
                    </a>
                    <button onclick="window.print()" class="w-full bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded-lg font-medium text-center block">
                        <i class="fas fa-print mr-2"></i>
                        Print Booking
                    </button>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Need Help?</h3>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <i class="fas fa-phone text-blue-500 mr-3"></i>
                        <div>
                            <p class="text-sm text-gray-500">Call Us</p>
                            <p class="font-medium text-gray-900">+234 123 456 7890</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-envelope text-blue-500 mr-3"></i>
                        <div>
                            <p class="text-sm text-gray-500">Email Us</p>
                            <p class="font-medium text-gray-900">info@royeli.com</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-clock text-blue-500 mr-3"></i>
                        <div>
                            <p class="text-sm text-gray-500">Business Hours</p>
                            <p class="font-medium text-gray-900">Mon-Fri: 9AM-6PM</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booking Timeline -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Booking Timeline</h3>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-check text-white text-xs"></i>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Booking Created</p>
                            <p class="text-xs text-gray-500"><?php echo e($booking->created_at->format('M d, Y H:i')); ?></p>
                        </div>
                    </div>
                    
                    <?php if($booking->status != 'pending'): ?>
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-check text-white text-xs"></i>
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Booking Confirmed</p>
                                <p class="text-xs text-gray-500"><?php echo e($booking->updated_at->format('M d, Y H:i')); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if($booking->status == 'completed'): ?>
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-6 h-6 bg-purple-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-check text-white text-xs"></i>
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Service Completed</p>
                                <p class="text-xs text-gray-500"><?php echo e($booking->updated_at->format('M d, Y H:i')); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add any interactive functionality here
        console.log('Booking details page loaded');
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u363422527/domains/royelimytravel.com/public_html/b2b/resources/views/bookings/show.blade.php ENDPATH**/ ?>