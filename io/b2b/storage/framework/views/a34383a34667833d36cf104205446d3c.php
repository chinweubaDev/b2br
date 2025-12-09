<?php $__env->startSection('title', 'Tour Packages - Royeli Tours & Travel'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Tour Packages</h1>
                <p class="text-gray-600">Explore amazing destinations with our curated tour packages</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="<?php echo e(route('tours.create')); ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-plus mr-2"></i>
                    New Tour Package
                </a>
            </div>
        </div>
    </div>

    <!-- Search and Filters -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                <input type="text" id="search" placeholder="Search tours..." class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="destination" class="block text-sm font-medium text-gray-700 mb-1">Destination</label>
                <select id="destination" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Destinations</option>
                    <option value="cape-town">Cape Town</option>
                    <option value="dubai">Dubai</option>
                    <option value="paris">Paris</option>
                    <option value="london">London</option>
                    <option value="new-york">New York</option>
                </select>
            </div>
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <select id="category" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Categories</option>
                    <option value="luxury">Luxury</option>
                    <option value="adventure">Adventure</option>
                    <option value="romance">Romance</option>
                    <option value="family">Family</option>
                    <option value="cultural">Cultural</option>
                    <option value="beach">Beach</option>
                </select>
            </div>
            <div>
                <label for="duration" class="block text-sm font-medium text-gray-700 mb-1">Duration</label>
                <select id="duration" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Durations</option>
                    <option value="1-3">1-3 Days</option>
                    <option value="4-7">4-7 Days</option>
                    <option value="8-14">8-14 Days</option>
                    <option value="15+">15+ Days</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Tour Packages Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php $__empty_1 = true; $__currentLoopData = $tours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-300">
                <?php if($tour->featured_image_url || $tour->image_url): ?>
                    <div class="h-48 bg-gray-200 overflow-hidden">
                        <img src="<?php echo e($tour->featured_image_url ?? $tour->image_url); ?>" alt="<?php echo e($tour->name); ?>" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                <?php else: ?>
                    <div class="h-48 bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
                        <i class="fas fa-map-marked-alt text-white text-4xl"></i>
                    </div>
                <?php endif; ?>
                
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-map-marker-alt text-blue-600"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-lg font-semibold text-gray-900"><?php echo e($tour->name); ?></h3>
                                <p class="text-sm text-gray-500"><?php echo e($tour->destination); ?></p>
                            </div>
                        </div>
                        <?php if($tour->is_featured): ?>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                <i class="fas fa-star mr-1"></i> Featured
                            </span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Duration:</span>
                            <span class="font-medium"><?php echo e($tour->duration_days); ?> Days</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Category:</span>
                            <span class="font-medium"><?php echo e(ucfirst($tour->category)); ?></span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Standard Rate:</span>
                            <span class="font-medium">₦<?php echo e(number_format($tour->standard_rate)); ?></span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">B2B Rate:</span>
                            <span class="font-medium text-green-600">₦<?php echo e(number_format($tour->b2b_rate)); ?></span>
                        </div>
                    </div>
                    
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <div class="flex space-x-2">
                            <a href="<?php echo e(route('tours.show', $tour)); ?>" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium">
                                View Details
                            </a>
                            
                            <?php if(auth()->guard()->check()): ?>
                                <a href="<?php echo e(route('payment.options', ['tour', $tour->id])); ?>" class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium">
                                    <i class="fas fa-credit-card mr-1"></i>
                                    Book Now
                                </a>
                            <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>" class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium" title="Please log in to book this tour">
                                    <i class="fas fa-sign-in-alt mr-1"></i>
                                    Login to Book
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <!-- Placeholder Cards -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="h-48 bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
                    <i class="fas fa-map-marked-alt text-white text-4xl"></i>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-map-marker-alt text-blue-600"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-lg font-semibold text-gray-900">Cape Town Experience</h3>
                                <p class="text-sm text-gray-500">Cape Town, South Africa</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                            <i class="fas fa-star mr-1"></i> Featured
                        </span>
                    </div>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Duration:</span>
                            <span class="font-medium">7 Days</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Category:</span>
                            <span class="font-medium">Luxury</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Standard Rate:</span>
                            <span class="font-medium">₦3,638,000</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">B2B Rate:</span>
                            <span class="font-medium text-green-600">₦3,595,000</span>
                        </div>
                    </div>
                    
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <div class="flex space-x-2">
                            <a href="#" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium">
                                View Details
                            </a>
                            <a href="#" class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium">
                                Book Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="h-48 bg-gradient-to-br from-yellow-400 to-orange-500 flex items-center justify-center">
                    <i class="fas fa-camel text-white text-4xl"></i>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-map-marker-alt text-yellow-600"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-lg font-semibold text-gray-900">Dubai Desert Adventure</h3>
                                <p class="text-sm text-gray-500">Dubai, UAE</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                            Popular
                        </span>
                    </div>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Duration:</span>
                            <span class="font-medium">6 Days</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Category:</span>
                            <span class="font-medium">Adventure</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Standard Rate:</span>
                            <span class="font-medium">₦2,850,000</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">B2B Rate:</span>
                            <span class="font-medium text-green-600">₦2,800,000</span>
                        </div>
                    </div>
                    
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <div class="flex space-x-2">
                            <a href="#" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium">
                                View Details
                            </a>
                            <a href="#" class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium">
                                Book Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="h-48 bg-gradient-to-br from-pink-400 to-red-500 flex items-center justify-center">
                    <i class="fas fa-heart text-white text-4xl"></i>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-pink-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-map-marker-alt text-pink-600"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-lg font-semibold text-gray-900">Paris Romantic Getaway</h3>
                                <p class="text-sm text-gray-500">Paris, France</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Duration:</span>
                            <span class="font-medium">8 Days</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Category:</span>
                            <span class="font-medium">Romance</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Standard Rate:</span>
                            <span class="font-medium">₦4,200,000</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">B2B Rate:</span>
                            <span class="font-medium text-green-600">₦4,150,000</span>
                        </div>
                    </div>
                    
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <div class="flex space-x-2">
                            <a href="#" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium">
                                View Details
                            </a>
                            <a href="#" class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium">
                                Book Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Load More Button -->
    <div class="text-center">
        <button class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-medium">
            Load More Tour Packages
        </button>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
    // Search and filter functionality
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search');
        const destinationSelect = document.getElementById('destination');
        const categorySelect = document.getElementById('category');
        const durationSelect = document.getElementById('duration');
        
        // Add event listeners for filtering
        [searchInput, destinationSelect, categorySelect, durationSelect].forEach(element => {
            element.addEventListener('change', filterTourPackages);
            element.addEventListener('input', filterTourPackages);
        });
        
        function filterTourPackages() {
            // Implementation for filtering tour packages
            console.log('Filtering tour packages...');
        }
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/simeonuba/Downloads/royeli_travel_portal_final/resources/views/tours/index.blade.php ENDPATH**/ ?>