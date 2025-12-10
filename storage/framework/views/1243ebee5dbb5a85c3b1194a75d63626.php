<?php $__env->startSection('title', 'Documentation Services - Royeli Tours & Travel'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Documentation Services</h1>
                <p class="text-gray-600">Assistance with supporting documents for applicants and travelers</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="<?php echo e(route('documentation.create')); ?>" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-plus mr-2"></i>
                    New Service
                </a>
            </div>
        </div>
    </div>

    <!-- Service Categories -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Legal Documents -->
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-blue-500">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-gavel text-blue-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Legal Documents</h3>
                    <p class="text-sm text-gray-500">Official legal documentation</p>
                </div>
            </div>
            <div class="space-y-2 text-sm text-gray-600">
                <p>• Affidavits</p>
                <p>• Notarization</p>
                <p>• Police Character Reports</p>
                <p>• Authorized Translations</p>
            </div>
        </div>

        <!-- Travel Documents -->
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-green-500">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-plane text-green-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Travel Documents</h3>
                    <p class="text-sm text-gray-500">Travel-related documentation</p>
                </div>
            </div>
            <div class="space-y-2 text-sm text-gray-600">
                <p>• Flight Reservations</p>
                <p>• Hotel Reservations</p>
                <p>• Travel Insurance</p>
                <p>• Travel Itineraries</p>
            </div>
        </div>

        <!-- Personal Documents -->
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-purple-500">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-user text-purple-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Personal Documents</h3>
                    <p class="text-sm text-gray-500">Personal identification documents</p>
                </div>
            </div>
            <div class="space-y-2 text-sm text-gray-600">
                <p>• Birth Certificates</p>
                <p>• Marriage Certificates</p>
                <p>• NIN Registration</p>
                <p>• Yellow Card</p>
            </div>
        </div>
    </div>

    <!-- Documentation Services Grid -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h2 class="text-xl font-semibold text-gray-900 mb-6">Available Services</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php $__empty_1 = true; $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="border border-gray-200 rounded-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-file-alt text-blue-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900"><?php echo e($service->service_name); ?></h3>
                            <p class="text-sm text-gray-500"><?php echo e(Str::limit($service->description, 50)); ?></p>
                        </div>
                    </div>
                    <?php if($service->is_active): ?>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Active
                        </span>
                    <?php else: ?>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                            Inactive
                        </span>
                    <?php endif; ?>
                </div>
                
                <div class="space-y-3">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Category:</span>
                        <span class="font-medium"><?php echo e(ucfirst($service->category)); ?></span>
                    </div>
                    <?php if($service->processing_time): ?>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Processing:</span>
                        <span class="font-medium"><?php echo e($service->processing_time); ?></span>
                    </div>
                    <?php endif; ?>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Standard Rate:</span>
                        <span class="font-medium"><?php echo e($service->formatted_standard_rate); ?></span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">B2B Rate:</span>
                        <span class="font-medium text-green-600"><?php echo e($service->formatted_b2b_rate); ?></span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">You Save:</span>
                        <span class="font-medium text-green-600"><?php echo e($service->formatted_savings); ?> (<?php echo e($service->savings_percentage); ?>%)</span>
                    </div>
                </div>
                
                <div class="mt-4 pt-4 border-t border-gray-200">
                    <div class="flex space-x-2">
                        <a href="<?php echo e(route('documentation.show', $service)); ?>" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium">
                            <i class="fas fa-eye mr-1"></i>
                            View Details
                        </a>
                        <?php if(auth()->guard()->check()): ?>
                            <a href="<?php echo e(route('payment.options', ['documentation', $service->id])); ?>" class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium">
                                <i class="fas fa-credit-card mr-1"></i>
                                Order Now
                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>" class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium" title="Please log in to order this service">
                                <i class="fas fa-sign-in-alt mr-1"></i>
                                Login to Order
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-full">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8 text-center">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-file-alt text-gray-400 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No Documentation Services Available</h3>
                    <p class="text-gray-500 mb-4">There are currently no documentation services available. Please check back later or contact us for assistance.</p>
                    <a href="<?php echo e(route('documentation.create')); ?>" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        <i class="fas fa-plus mr-2"></i>
                        Add Service
                    </a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Special Services -->
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\creat\Downloads\b2b\resources\views/documentation/index.blade.php ENDPATH**/ ?>