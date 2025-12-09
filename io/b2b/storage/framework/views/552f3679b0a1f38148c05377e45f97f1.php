<?php $__env->startSection('title', $tour->name . ' - Royeli Tours & Travel'); ?>

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
                                <a href="<?php echo e(route('tours.index')); ?>" class="ml-1 text-gray-700 hover:text-blue-600 md:ml-2">Tour Packages</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-gray-500 md:ml-2"><?php echo e($tour->name); ?></span>
                            </div>
                        </li>
                    </ol>
                </nav>
                
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900"><?php echo e($tour->name); ?></h1>
                        <p class="mt-2 text-gray-600"><?php echo e($tour->destination); ?> • <?php echo e($tour->duration_days); ?> Days</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <!-- <a href="<?php echo e(route('tours.edit', $tour)); ?>" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fas fa-edit mr-2"></i>
                            Edit Tour
                        </a> -->
                        <a href="<?php echo e(route('payment.options', ['tour', $tour->id])); ?>" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fas fa-credit-card mr-2"></i>
                            Book Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Featured Image -->
            <?php if($tour->featured_image_url || $tour->image_url): ?>
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <img src="<?php echo e($tour->featured_image_url ?? $tour->image_url); ?>" alt="<?php echo e($tour->name); ?>" class="w-full h-96 object-cover">
                </div>
            <?php endif; ?>

            <!-- Extra Images Gallery -->
            <?php if($tour->images->count() > 0): ?>
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Gallery</h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        <?php $__currentLoopData = $tour->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="group relative overflow-hidden rounded-lg">
                                <img src="<?php echo e($image->image_url); ?>" 
                                     alt="<?php echo e($image->caption ?? $tour->name); ?>" 
                                     class="w-full h-32 object-cover transition-transform duration-300 group-hover:scale-110 cursor-pointer"
                                     onclick="openImageModal('<?php echo e($image->image_url); ?>', '<?php echo e($image->caption ?? $tour->name); ?>')">
                                <?php if($image->caption): ?>
                                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-xs p-2">
                                        <?php echo e($image->caption); ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Tour Details -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Tour Details</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Destination</label>
                            <p class="text-lg font-medium text-gray-900"><?php echo e($tour->destination); ?></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Duration</label>
                            <p class="text-lg font-medium text-gray-900"><?php echo e($tour->duration_days); ?> Days</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Category</label>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                <?php echo e(ucfirst($tour->category)); ?>

                            </span>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Travel Dates</label>
                            <p class="text-lg font-medium text-gray-900">
                                <?php echo e($tour->travel_start_date->format('M d, Y')); ?> - <?php echo e($tour->travel_end_date->format('M d, Y')); ?>

                            </p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Status</label>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium <?php echo e($tour->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'); ?>">
                                <?php echo e($tour->is_active ? 'Active' : 'Inactive'); ?>

                            </span>
                        </div>
                        <?php if($tour->is_featured): ?>
                            <div>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                    <i class="fas fa-star mr-1"></i> Featured Tour
                                </span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Description</h2>
                <div class="prose max-w-none">
                    <p class="text-gray-700 leading-relaxed"><?php echo e($tour->description ?? 'No description available for this tour package.'); ?></p>
                </div>
            </div>

            <!-- Itinerary -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Itinerary</h2>
                <div class="space-y-4">
                    <?php if($tour->itinerary): ?>
                        <div class="prose max-w-none">
                            <?php echo nl2br(e($tour->itinerary)); ?>

                        </div>
                    <?php else: ?>
                        <div class="text-gray-500 italic">
                            <p>Detailed itinerary will be provided upon booking confirmation.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Inclusions & Exclusions -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">What's Included</h2>
                    <div class="space-y-3">
                        <?php if($tour->inclusions): ?>
                            <?php $__currentLoopData = explode("\n", $tour->inclusions); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inclusion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(trim($inclusion)): ?>
                                    <div class="flex items-center">
                                        <i class="fas fa-check text-green-500 mr-3"></i>
                                        <span class="text-gray-700"><?php echo e(trim($inclusion)); ?></span>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div class="text-gray-500 italic">
                                <p>Standard inclusions apply. Contact us for details.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">What's Not Included</h2>
                    <div class="space-y-3">
                        <?php if($tour->exclusions): ?>
                            <?php $__currentLoopData = explode("\n", $tour->exclusions); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exclusion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(trim($exclusion)): ?>
                                    <div class="flex items-center">
                                        <i class="fas fa-times text-red-500 mr-3"></i>
                                        <span class="text-gray-700"><?php echo e(trim($exclusion)); ?></span>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div class="text-gray-500 italic">
                                <p>Standard exclusions apply. Contact us for details.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Pricing Card -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Pricing</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Standard Rate:</span>
                        <span class="text-xl font-bold text-gray-900">₦<?php echo e(number_format($tour->standard_rate)); ?></span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">B2B Rate:</span>
                        <span class="text-xl font-bold text-green-600">₦<?php echo e(number_format($tour->b2b_rate)); ?></span>
                    </div>
                    <div class="pt-4 border-t border-gray-200">
                        <a href="<?php echo e(route('payment.options', ['tour', $tour->id])); ?>" class="w-full bg-green-600 hover:bg-green-700 text-white py-3 px-4 rounded-lg font-medium text-center block">
                            <i class="fas fa-credit-card mr-2"></i>
                            Book This Tour
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Info -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Info</h3>
                <div class="space-y-3">
                    <div class="flex items-center">
                        <i class="fas fa-map-marker-alt text-blue-500 mr-3"></i>
                        <span class="text-gray-700"><?php echo e($tour->destination); ?></span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-calendar-alt text-blue-500 mr-3"></i>
                        <span class="text-gray-700"><?php echo e($tour->duration_days); ?> Days</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-tag text-blue-500 mr-3"></i>
                        <span class="text-gray-700"><?php echo e(ucfirst($tour->category)); ?></span>
                    </div>
                </div>
            </div>

            <!-- Contact Info -->
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
        </div>
    </div>
</div>

<!-- Image Modal -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 hidden z-50 flex items-center justify-center">
    <div class="relative max-w-4xl max-h-full mx-4">
        <button onclick="closeImageModal()" class="absolute top-4 right-4 text-white text-2xl hover:text-gray-300 z-10">
            <i class="fas fa-times"></i>
        </button>
        <img id="modalImage" src="" alt="" class="max-w-full max-h-full object-contain">
        <div id="modalCaption" class="absolute bottom-4 left-4 right-4 text-white text-center bg-black bg-opacity-50 p-2 rounded"></div>
    </div>
</div>

<script>
function openImageModal(imageSrc, caption) {
    document.getElementById('modalImage').src = imageSrc;
    document.getElementById('modalImage').alt = caption;
    document.getElementById('modalCaption').textContent = caption;
    document.getElementById('imageModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeImageModal() {
    document.getElementById('imageModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Close modal when clicking outside
document.getElementById('imageModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeImageModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeImageModal();
    }
});
</script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/simeonuba/Downloads/royeli_travel_portal_final/resources/views/tours/show.blade.php ENDPATH**/ ?>