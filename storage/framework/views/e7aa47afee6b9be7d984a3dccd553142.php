<?php $__env->startSection('title', $documentation->service_name . ' - Royeli Tours & Travel'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-8">
    <div class="max-w-6xl mx-auto">
        <!-- Breadcrumb -->
        <nav class="flex mb-6" aria-label="Breadcrumb">
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
                        <a href="<?php echo e(route('documentation.index')); ?>" class="ml-1 text-gray-700 hover:text-blue-600 md:ml-2">Documentation Services</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-gray-500 md:ml-2"><?php echo e($documentation->service_name); ?></span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Header Section -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-purple-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-file-alt text-purple-600 text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900"><?php echo e($documentation->service_name); ?></h1>
                        <p class="text-gray-600 mt-1">Professional documentation service</p>
                        <div class="flex items-center mt-2 space-x-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?php echo e($documentation->status_badge_class); ?>">
                                <?php echo e($documentation->is_active ? 'Active' : 'Inactive'); ?>

                            </span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?php echo e($documentation->category_badge_class); ?>">
                                <?php echo e(ucfirst($documentation->category)); ?>

                            </span>
                            <?php if($documentation->processing_time): ?>
                                <span class="text-sm text-gray-500">Processing: <?php echo e($documentation->processing_time); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="<?php echo e(route('documentation.edit', $documentation)); ?>" class="btn-secondary">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit
                    </a>
                    <a href="<?php echo e(route('payment.options', ['documentation', $documentation->id])); ?>" class="btn-primary">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Order Now
                    </a>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Description Section -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Service Description</h2>
                    <div class="prose max-w-none">
                        <p class="text-gray-700 leading-relaxed"><?php echo e($documentation->description); ?></p>
                    </div>
                </div>

                <!-- Requirements Section -->
                <?php if($documentation->requirements): ?>
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Requirements</h2>
                    <div class="prose max-w-none">
                        <?php echo nl2br(e($documentation->requirements)); ?>

                    </div>
                </div>
                <?php endif; ?>

                <!-- Processing Information -->
                <?php if($documentation->processing_time): ?>
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Processing Information</h2>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-blue-50 rounded-lg">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <h3 class="font-medium text-gray-900">Processing Time</h3>
                                    <p class="text-sm text-gray-600"><?php echo e($documentation->processing_time); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Pricing Section -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Pricing Information</h3>
                    <div class="space-y-4">
                        <div class="bg-gray-50 rounded-lg p-4">
                            <h4 class="text-lg font-medium text-gray-900 mb-2">Standard Rate</h4>
                            <div class="text-3xl font-bold text-gray-900 mb-2"><?php echo e($documentation->formatted_standard_rate); ?></div>
                            <p class="text-sm text-gray-600">Regular processing fee</p>
                        </div>
                        <div class="bg-green-50 rounded-lg p-4 border border-green-200">
                            <h4 class="text-lg font-medium text-green-900 mb-2">B2B Rate</h4>
                            <div class="text-3xl font-bold text-green-600 mb-2"><?php echo e($documentation->formatted_b2b_rate); ?></div>
                            <p class="text-sm text-green-700">Special rate for travel agents</p>
                            <div class="mt-2">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Save <?php echo e($documentation->formatted_savings); ?> (<?php echo e($documentation->savings_percentage); ?>%)
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                    <div class="space-y-3">
                        <a href="<?php echo e(route('payment.options', ['documentation', $documentation->id])); ?>" class="w-full btn-primary text-center">
                            <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Order This Service
                        </a>
                    
                        <button onclick="window.print()" class="w-full btn-outline text-center">
                            <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                            </svg>
                            Print Details
                        </button>
                    </div>
                </div>

                <!-- Service Details -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Service Details</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Category:</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?php echo e($documentation->category_badge_class); ?>">
                                <?php echo e(ucfirst($documentation->category)); ?>

                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Status:</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?php echo e($documentation->status_badge_class); ?>">
                                <?php echo e($documentation->is_active ? 'Active' : 'Inactive'); ?>

                            </span>
                        </div>
                        <?php if($documentation->processing_time): ?>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Processing:</span>
                            <span class="font-medium"><?php echo e($documentation->processing_time); ?></span>
                        </div>
                        <?php endif; ?>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Created:</span>
                            <span class="font-medium"><?php echo e($documentation->created_at->format('M d, Y')); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Last Updated:</span>
                            <span class="font-medium"><?php echo e($documentation->updated_at->format('M d, Y')); ?></span>
                        </div>
                    </div>
                </div>

                <!-- Related Services -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Other <?php echo e(ucfirst($documentation->category)); ?> Services</h3>
                    <div class="space-y-3">
                        <a href="<?php echo e(route('documentation.index')); ?>?category=<?php echo e($documentation->category); ?>" class="block p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                            <div class="font-medium text-gray-900">View All <?php echo e(ucfirst($documentation->category)); ?> Services</div>
                            <div class="text-sm text-gray-600">Browse our complete <?php echo e($documentation->category); ?> documentation services</div>
                        </a>
                        <a href="<?php echo e(route('visas.index')); ?>" class="block p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                            <div class="font-medium text-gray-900">Visa Services</div>
                            <div class="text-sm text-gray-600">Professional visa processing</div>
                        </a>
                        <a href="<?php echo e(route('tours.index')); ?>" class="block p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                            <div class="font-medium text-gray-900">Tour Packages</div>
                            <div class="text-sm text-gray-600">Explore amazing destinations</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Information -->
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
    // Add any interactive functionality here
    document.addEventListener('DOMContentLoaded', function() {
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/simeonuba/b2br/resources/views/documentation/show.blade.php ENDPATH**/ ?>