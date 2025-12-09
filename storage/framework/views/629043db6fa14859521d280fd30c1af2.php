<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Cruise Details</h1>
            <div class="flex space-x-3">
                <a href="<?php echo e(route('cruises.edit', $cruise)); ?>" class="btn-secondary">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit
                </a>
                <a href="<?php echo e(route('cruises.index')); ?>" class="btn-primary">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Cruises
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Cruise Image -->
                <?php if($cruise->image): ?>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="<?php echo e(asset('storage/' . $cruise->image)); ?>" alt="<?php echo e($cruise->name); ?>" class="w-full h-64 object-cover">
                    </div>
                <?php endif; ?>

                <!-- Basic Information -->
                <div class="card">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Cruise Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm font-medium text-gray-500">Cruise Name</label>
                            <p class="text-gray-900"><?php echo e($cruise->name); ?></p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-500">Cruise Line</label>
                            <p class="text-gray-900"><?php echo e($cruise->cruise_line); ?></p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-500">Ship Name</label>
                            <p class="text-gray-900"><?php echo e($cruise->ship_name); ?></p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-500">Route</label>
                            <p class="text-gray-900"><?php echo e($cruise->route); ?></p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-500">Duration</label>
                            <p class="text-gray-900"><?php echo e($cruise->duration_nights); ?> nights</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-500">Status</label>
                            <span class="status-badge <?php echo e($cruise->is_active ? 'status-confirmed' : 'status-cancelled'); ?>">
                                <?php echo e($cruise->is_active ? 'Active' : 'Inactive'); ?>

                            </span>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="card">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Description</h2>
                    <p class="text-gray-700 leading-relaxed"><?php echo e($cruise->description); ?></p>
                </div>

                <!-- Ports of Call -->
                <div class="card">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Ports of Call</h2>
                    <div class="text-gray-700 whitespace-pre-line"><?php echo e($cruise->ports_of_call); ?></div>
                </div>

                <!-- Inclusions -->
                <div class="card">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Inclusions</h2>
                    <div class="text-gray-700 whitespace-pre-line"><?php echo e($cruise->inclusions); ?></div>
                </div>

                <!-- Exclusions -->
                <?php if($cruise->exclusions): ?>
                    <div class="card">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">Exclusions</h2>
                        <div class="text-gray-700 whitespace-pre-line"><?php echo e($cruise->exclusions); ?></div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Pricing -->
                <div class="card">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Pricing</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Standard Rate:</span>
                            <span class="text-lg font-semibold text-gray-900">₦<?php echo e(number_format($cruise->standard_rate, 2)); ?></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">B2B Rate:</span>
                            <span class="text-lg font-semibold text-blue-600">₦<?php echo e(number_format($cruise->b2b_rate, 2)); ?></span>
                        </div>
                        <div class="border-t pt-3">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Savings:</span>
                                <span class="text-green-600 font-semibold">₦<?php echo e(number_format($cruise->standard_rate - $cruise->b2b_rate, 2)); ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Travel Dates -->
                <div class="card">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Travel Dates</h2>
                    <div class="space-y-3">
                        <div>
                            <label class="text-sm font-medium text-gray-500">Departure Date</label>
                            <p class="text-gray-900"><?php echo e($cruise->departure_date->format('F d, Y')); ?></p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-500">Return Date</label>
                            <p class="text-gray-900"><?php echo e($cruise->return_date->format('F d, Y')); ?></p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-500">Days Until Departure</label>
                            <p class="text-gray-900"><?php echo e($cruise->departure_date->diffInDays(now())); ?> days</p>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="card">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Quick Actions</h2>
                    <div class="space-y-3">
                        <a href="<?php echo e(route('payment.options', ['cruise', $cruise->id])); ?>" class="w-full btn-primary text-center">
                            <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            Book This Cruise
                        </a>
                        <button onclick="window.print()" class="w-full btn-secondary">
                            <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                            </svg>
                            Print Details
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u363422527/domains/royelimytravel.com/public_html/b2b/resources/views/admin/cruises/cruises/show.blade.php ENDPATH**/ ?>