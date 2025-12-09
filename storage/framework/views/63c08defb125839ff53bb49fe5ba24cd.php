<?php $__env->startSection('title', 'Dashboard - Royeli Tours & Travel'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Welcome to Royeli Tours & Travel</h1>
                <p class="text-gray-600">Your comprehensive B2B travel solutions partner</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-right">
                    <p class="text-sm text-gray-500">Today's Date</p>
                    <p class="text-lg font-semibold text-gray-900"><?php echo e(now()->format('F j, Y')); ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
                        <div class="col-md-12 ">
                            <div class="row">
                                <div class="col-md-4">
                             <!-- Wallet Balance -->
                             <div class="bg-dad=rk rounded-lg shadow-sm p-6 border-l-4 border-blue-500" style="background:#000">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-wallet text-green-600"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Wallet Balance</p>
                        <p class="text-2xl font-bold text-blue-600"><?php echo e(($user ?? auth()->user())->formatted_wallet_balance ?? '₦0.00'); ?></p>
                    </div>
                </div>
                <div>
                    <a href="<?php echo e(route('wallet.fund')); ?>" class="inline-flex items-center px-3 py-2 bg-blue-600 text-white rounded-lg hover:bg-green-700 text-xs font-semibold">
                        <i class="fas fa-plus mr-1"></i> Fund Wallet
                    </a>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-white-600 text-sm font-medium">Use wallet for quick payments</span>
            </div>
        </div>

                                </div>
      <div class="col-md-4">
 <!-- Points Balance -->
 <div class="bg-whitde rounded-lg shadow-sm p-6 mt3 border-l-4 border-yellow-400" style='background:#570d7a'>
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-white-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-star text-yellow-500"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Points Balance</p>
                    <p class="text-2xl font-bold text-yellow-600"><?php echo e(($user ?? auth()->user())->points_balance ?? 0); ?></p>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-white-600 text-sm font-medium">Earn 100 points per successful transaction</span>
            </div>
        </div>
      </div>
           
                               
                            </div> <!--end row--> 
                        </div> <!--end col--> 
                                  
                    </div>
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-6">
      

       
        <!-- Visa Services -->
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-blue-500">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-passport text-blue-600"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Visa Services</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo e($visaCount ?? 15); ?></p>
                </div>
            </div>
            <div class="mt-4">
                <a href="<?php echo e(route('visas.index')); ?>" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    View all services →
                </a>
            </div>
        </div>

        <!-- Tour Packages -->
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-green-500">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-map-marked-alt text-green-600"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Tour Packages</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo e($tourCount ?? 8); ?></p>
                </div>
            </div>
            <div class="mt-4">
                <a href="<?php echo e(route('tours.index')); ?>" class="text-green-600 hover:text-green-800 text-sm font-medium">
                    View all packages →
                </a>
            </div>
        </div>

        <!-- Hotels -->
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-purple-500">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-hotel text-purple-600"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Hotels</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo e($hotelCount ?? 25); ?></p>
                </div>
            </div>
            <div class="mt-4">
                <a href="<?php echo e(route('hotels.index')); ?>" class="text-purple-600 hover:text-purple-800 text-sm font-medium">
                    View all hotels →
                </a>
            </div>
        </div>

        <!-- Cruises -->
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-indigo-500">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-ship text-indigo-600"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Cruises</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo e($cruiseCount ?? 3); ?></p>
                </div>
            </div>
            <div class="mt-4">
                <a href="<?php echo e(route('cruises.index')); ?>" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                    View all cruises →
                </a>
            </div>
        </div>

    
    </div>

    <!-- Featured Services -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Featured Tour Packages -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-900">Featured Tour Packages</h2>
                <a href="<?php echo e(route('tours.index')); ?>" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    View all →
                </a>
            </div>
            <div class="space-y-4">
                <?php $__empty_1 = true; $__currentLoopData = $featuredTours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="border border-gray-200 rounded-lg p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="font-medium text-gray-900"><?php echo e($tour->name); ?></h3>
                                <p class="text-sm text-gray-500"><?php echo e($tour->date_range ?? ''); ?> • <?php echo e($tour->duration ?? ''); ?></p>
                                <p class="text-sm text-green-600 font-medium">₦<?php echo e(number_format($tour->b2b_rate)); ?> B2B Rate</p>
                            </div>
                            <div class="text-right">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Featured
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="text-gray-500">No featured tours at the moment.</div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Popular Visa Services -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-900">Popular Visa Services</h2>
                <a href="<?php echo e(route('visas.index')); ?>" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    View all →
                </a>
            </div>
            <div class="space-y-4">
                <?php $__empty_1 = true; $__currentLoopData = $popularVisas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="border border-gray-200 rounded-lg p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="font-medium text-gray-900"><?php echo e($visa->service_name ?? ($visa->country->name ?? '')); ?></h3>
                                <p class="text-sm text-gray-500">processing time: <?php echo e($visa->processing_time); ?></p>
                                <p class="text-sm text-green-600 font-medium">₦<?php echo e(number_format($visa->b2b_rate)); ?> B2B Rate</p>
                            </div>
                            <div class="text-right">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    Popular
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="text-gray-500">No popular visa services at the moment.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="<?php echo e(route('visas.index')); ?>" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-plus text-blue-600"></i>
                </div>
                <div>
                    <p class="font-medium text-gray-900">New Visa Application</p>
                    <p class="text-sm text-gray-500">Start visa process</p>
                </div>
            </a>
            <a href="<?php echo e(route('tours.index')); ?>" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-plus text-green-600"></i>
                </div>
                <div>
                    <p class="font-medium text-gray-900">Book Tour Package</p>
                    <p class="text-sm text-gray-500">Reserve tour</p>
                </div>
            </a>
            <a href="<?php echo e(route('hotels.index')); ?>" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-plus text-purple-600"></i>
                </div>
                <div>
                    <p class="font-medium text-gray-900">Hotel Booking</p>
                    <p class="text-sm text-gray-500">Reserve hotel</p>
                </div>
            </a>
            <a href="<?php echo e(route('documentation.index')); ?>" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-file-alt text-indigo-600"></i>
                </div>
                <div>
                    <p class="font-medium text-gray-900">Documentation</p>
                    <p class="text-sm text-gray-500">Get documents</p>
                </div>
            </a>
        </div>
    </div>

  
</div>
<?php $__env->stopSection(); ?> 

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u363422527/domains/royelimytravel.com/public_html/b2b/resources/views/dashboard.blade.php ENDPATH**/ ?>