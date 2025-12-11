<?php $__env->startSection('title', 'Hotels - Royeli Tours & Travel'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Hotels</h1>
                <p class="text-gray-600">Exclusive B2B hotel deals across Asia, Africa, the Middle East, and Europe</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="/hotels/create" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-plus mr-2"></i>
                    New Service
                </a>
            </div>
        </div>
    </div>
  

    <!-- Hotel Categories -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Corporate & Business Travel -->
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-blue-500">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-briefcase text-blue-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Corporate & Business</h3>
                    <p class="text-sm text-gray-500">Business-friendly accommodations</p>
                </div>
            </div>
          
        </div>

        <!-- Luxury & VIP -->
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-purple-500">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-crown text-purple-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Luxury & VIP</h3>
                    <p class="text-sm text-gray-500">Premium luxury experiences</p>
                </div>
            </div>
           
        </div>

        <!-- Tropical & Beach -->
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-green-500">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-umbrella-beach text-green-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Tropical & Beach</h3>
                    <p class="text-sm text-gray-500">Exotic beachfront locations</p>
                </div>
            </div>
          
        </div>
    </div>

    <!-- Featured Hotels -->
    <div class="bg-white rounded-lg shadow-sm p-6">
       
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php $__empty_1 = true; $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="relative">
                    <?php if($hotel->image): ?>
                        <img src="<?php echo e(asset('storage/' . $hotel->image)); ?>" alt="<?php echo e($hotel->name); ?>" class="w-full h-48 object-cover">
                    <?php else: ?>
                        <div class="h-48 bg-gradient-to-br from-blue-400 to-indigo-600 flex items-center justify-center">
                            <i class="fas fa-hotel text-white text-4xl"></i>
                        </div>
                    <?php endif; ?>
                    <div class="absolute top-4 right-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                            <?php echo e($hotel->star_rating); ?>-Star
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2"><?php echo e($hotel->name); ?></h3>
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        <span><?php echo e($hotel->city); ?>, <?php echo e($hotel->country); ?></span>
                    </div>
                    <p class="text-sm text-gray-600 mb-4"><?php echo e(Str::limit($hotel->description, 100)); ?></p>
                    
                    <div class="space-y-2 mb-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Standard Rate:</span>
                            <span class="font-medium"><?php echo e($hotel->formatted_standard_rate); ?>/night</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">B2B Rate:</span>
                            <span class="font-medium text-green-600"><?php echo e($hotel->formatted_b2b_rate); ?>/night</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">You Save:</span>
                            <span class="font-medium text-green-600"><?php echo e($hotel->formatted_savings); ?> (<?php echo e($hotel->savings_percentage); ?>%)</span>
                        </div>
                    </div>

                    <div class="space-y-2 mb-4">
                        <h4 class="font-medium text-sm text-gray-900">Amenities:</h4>
                        <div class="text-xs text-gray-600 space-y-1">
                            <?php $__currentLoopData = array_slice($hotel->amenities, 0, 3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p><?php echo e($amenity); ?></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if(count($hotel->amenities) > 3): ?>
                                <p class="text-blue-600">+<?php echo e(count($hotel->amenities) - 3); ?> more</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="flex space-x-2">
                        <a href="<?php echo e(route('hotels.show', $hotel)); ?>" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium">
                            <i class="fas fa-eye mr-1"></i>
                            View Details
                        </a>
                        <?php if(auth()->guard()->check()): ?>
                            <a href="<?php echo e(route('payment.options', ['hotel', $hotel->id])); ?>" class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium">
                                <i class="fas fa-credit-card mr-1"></i>
                                Book Now
                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>" class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium" title="Please log in to book this hotel">
                                <i class="fas fa-sign-in-alt mr-1"></i>
                                Login to Book
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-full">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8 text-center">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-hotel text-gray-400 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No Hotels Available</h3>
                    <p class="text-gray-500 mb-4">There are currently no hotels available. Please check back later or contact us for assistance.</p>
                    <a href="<?php echo e(route('hotels.create')); ?>" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        <i class="fas fa-plus mr-2"></i>
                        Add Hotel
                    </a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

  
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/simeonuba/b2br/resources/views/hotels/index.blade.php ENDPATH**/ ?>