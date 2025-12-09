<?php $__env->startSection('title', $visa->country->name . ' ' . ucfirst($visa->visa_type) . ' Visa Requirements - Royeli Tours & Travel'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
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
                        <a href="<?php echo e(route('visas.index')); ?>" class="ml-1 text-gray-700 hover:text-blue-600 md:ml-2">Visa Services</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="<?php echo e(route('visas.show', $visa)); ?>" class="ml-1 text-gray-700 hover:text-blue-600 md:ml-2"><?php echo e($visa->country->name); ?> <?php echo e(ucfirst($visa->visa_type)); ?> Visa</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-gray-500 md:ml-2">Requirements</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Header -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900"><?php echo e($visa->country->name); ?> <?php echo e(ucfirst($visa->visa_type)); ?> Visa Requirements</h1>
                    <p class="text-gray-600 mt-2">Complete list of documents and requirements needed for your visa application</p>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="<?php echo e(route('visas.show', $visa)); ?>" class="btn-secondary">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Details
                    </a>
                    <a href="<?php echo e(route('bookings.create')); ?>?type=visa&service=<?php echo e($visa->country->name); ?> <?php echo e($visa->visa_type); ?> visa" class="btn-primary">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Apply Now
                    </a>
                </div>
            </div>
        </div>

        <!-- Requirements Content -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="prose max-w-none">
                <div class="mb-6">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Required Documents</h2>
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-blue-600 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <h3 class="font-medium text-blue-900 mb-2">Important Notice</h3>
                                <p class="text-blue-800 text-sm">All documents must be original or certified copies. Photocopies are not accepted unless specifically mentioned. Documents not in English must be accompanied by certified translations.</p>
                            </div>
                        </div>
                    </div>
                    
                    <?php echo nl2br(e($visa->requirements)); ?>

                </div>

                <!-- Processing Information -->
                <div class="border-t border-gray-200 pt-6">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Processing Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 rounded-lg p-4">
                            <h3 class="font-medium text-gray-900 mb-2">Processing Time</h3>
                            <p class="text-gray-700"><?php echo e($visa->processing_time); ?></p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <h3 class="font-medium text-gray-900 mb-2">Service Fee</h3>
                            <p class="text-gray-700">B2B Rate: <?php echo e($visa->formatted_b2b_rate); ?></p>
                        </div>
                    </div>
                </div>

                <!-- What's Included -->
                <?php if($visa->cost_includes): ?>
                <div class="border-t border-gray-200 pt-6">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">What's Included in Your Fee</h2>
                    <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                        <?php echo nl2br(e($visa->cost_includes)); ?>

                    </div>
                </div>
                <?php endif; ?>

                <!-- Additional Notes -->
                <?php if($visa->additional_notes): ?>
                <div class="border-t border-gray-200 pt-6">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Additional Notes</h2>
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                        <?php echo nl2br(e($visa->additional_notes)); ?>

                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Application Steps -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mt-6">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">How to Apply</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-blue-600 font-bold text-lg">1</span>
                    </div>
                    <h3 class="font-medium text-gray-900 mb-2">Gather Documents</h3>
                    <p class="text-sm text-gray-600">Collect all required documents as listed above</p>
                </div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-blue-600 font-bold text-lg">2</span>
                    </div>
                    <h3 class="font-medium text-gray-900 mb-2">Submit Application</h3>
                    <p class="text-sm text-gray-600">Book our service and submit your documents</p>
                </div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-blue-600 font-bold text-lg">3</span>
                    </div>
                    <h3 class="font-medium text-gray-900 mb-2">Track Progress</h3>
                    <p class="text-sm text-gray-600">We'll keep you updated on your application status</p>
                </div>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mt-6">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Need Help?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    <div>
                        <div class="font-medium text-gray-900">Call Us</div>
                        <div class="text-sm text-gray-600">+234 123 456 7890</div>
                    </div>
                </div>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <div>
                        <div class="font-medium text-gray-900">Email Us</div>
                        <div class="text-sm text-gray-600">info@royelitours.com</div>
                    </div>
                </div>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <div>
                        <div class="font-medium text-gray-900">Visit Us</div>
                        <div class="text-sm text-gray-600">Lagos, Nigeria</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-center space-x-4 mt-8">
            <a href="<?php echo e(route('visas.show', $visa)); ?>" class="btn-secondary">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Details
            </a>
            <a href="<?php echo e(route('bookings.create')); ?>?type=visa&service=<?php echo e($visa->country->name); ?> <?php echo e($visa->visa_type); ?> visa" class="btn-primary">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Start Application
            </a>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add print functionality
        function printRequirements() {
            window.print();
        }
        
        // Add smooth scrolling
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/simeonuba/Downloads/royeli_travel_portal_final/resources/views/visas/requirements.blade.php ENDPATH**/ ?>