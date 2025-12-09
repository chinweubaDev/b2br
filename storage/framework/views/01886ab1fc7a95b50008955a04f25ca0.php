<?php $__env->startSection('title', $partner->company_name . ' - Partner Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <nav class="flex mb-4" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="<?php echo e(route('dashboard')); ?>" class="text-gray-700 hover:text-blue-600">Dashboard</a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <a href="<?php echo e(route('partners.index')); ?>" class="ml-1 text-gray-700 hover:text-blue-600 md:ml-2">Partners</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-gray-500 md:ml-2"><?php echo e($partner->company_name); ?></span>
                            </div>
                        </li>
                    </ol>
                </nav>
                
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900"><?php echo e($partner->company_name); ?></h1>
                        <p class="mt-2 text-gray-600"><?php echo e($partner->contact_person); ?> • <?php echo e($partner->business_type_label); ?></p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium <?php echo e($partner->status_badge_class); ?>">
                            <?php echo e(ucfirst($partner->status)); ?>

                        </span>
                        <a href="<?php echo e(route('partners.edit', $partner)); ?>" class="btn-secondary">
                            <i class="fas fa-edit mr-2"></i>
                            Edit
                        </a>
                        <a href="<?php echo e(route('partners.dashboard', $partner)); ?>" class="btn-primary">
                            <i class="fas fa-chart-line mr-2"></i>
                            Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-calendar-check text-white"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Total Bookings</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo e($stats['total_bookings']); ?></p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-money-bill-wave text-white"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Total Revenue</p>
                    <p class="text-2xl font-bold text-gray-900">₦<?php echo e(number_format($stats['total_revenue'], 2)); ?></p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-percentage text-white"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Total Commission</p>
                    <p class="text-2xl font-bold text-gray-900">₦<?php echo e(number_format($stats['total_commission'], 2)); ?></p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-yellow-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-wallet text-white"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Pending Balance</p>
                    <p class="text-2xl font-bold text-gray-900">₦<?php echo e(number_format($stats['pending_balance'], 2)); ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Partner Information -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Partner Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Company Name</label>
                            <p class="text-lg font-medium text-gray-900"><?php echo e($partner->company_name); ?></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Contact Person</label>
                            <p class="text-lg font-medium text-gray-900"><?php echo e($partner->contact_person); ?></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Email</label>
                            <p class="text-lg font-medium text-gray-900"><?php echo e($partner->email); ?></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Phone</label>
                            <p class="text-lg font-medium text-gray-900"><?php echo e($partner->phone); ?></p>
                        </div>
                        <?php if($partner->website): ?>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Website</label>
                            <p class="text-lg font-medium text-gray-900">
                                <a href="<?php echo e($partner->website); ?>" target="_blank" class="text-blue-600 hover:text-blue-800"><?php echo e($partner->website); ?></a>
                            </p>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Business Type</label>
                            <p class="text-lg font-medium text-gray-900"><?php echo e($partner->business_type_label); ?></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Commission Rate</label>
                            <p class="text-lg font-medium text-gray-900"><?php echo e($partner->formatted_commission_rate); ?></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Credit Limit</label>
                            <p class="text-lg font-medium text-gray-900"><?php echo e($partner->formatted_credit_limit); ?></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Current Balance</label>
                            <p class="text-lg font-medium text-gray-900"><?php echo e($partner->formatted_current_balance); ?></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Payment Terms</label>
                            <p class="text-lg font-medium text-gray-900"><?php echo e($partner->payment_terms_label); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Address Information -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Address Information</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Address</label>
                        <p class="text-lg font-medium text-gray-900"><?php echo e($partner->address); ?></p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">City</label>
                            <p class="text-lg font-medium text-gray-900"><?php echo e($partner->city); ?></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">State</label>
                            <p class="text-lg font-medium text-gray-900"><?php echo e($partner->state); ?></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Country</label>
                            <p class="text-lg font-medium text-gray-900"><?php echo e($partner->country); ?></p>
                        </div>
                    </div>
                    <?php if($partner->postal_code): ?>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Postal Code</label>
                        <p class="text-lg font-medium text-gray-900"><?php echo e($partner->postal_code); ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Recent Bookings -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Recent Bookings</h2>
                <?php if($recentBookings->count() > 0): ?>
                    <div class="space-y-4">
                        <?php $__currentLoopData = $recentBookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <div class="h-10 w-10 rounded-lg bg-blue-100 flex items-center justify-center">
                                        <i class="fas fa-calendar text-blue-600"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900"><?php echo e($booking->service_name); ?></p>
                                    <p class="text-sm text-gray-500"><?php echo e($booking->reference_number); ?></p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-medium text-gray-900"><?php echo e($booking->formatted_amount); ?></p>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?php echo e($booking->status_badge_class); ?>">
                                    <?php echo e(ucfirst($booking->status)); ?>

                                </span>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <p class="text-gray-500 text-center py-4">No recent bookings found.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Quick Actions -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <a href="<?php echo e(route('partners.edit', $partner)); ?>" class="w-full btn-secondary text-center">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Partner
                    </a>
                    <a href="<?php echo e(route('partners.dashboard', $partner)); ?>" class="w-full btn-primary text-center">
                        <i class="fas fa-chart-line mr-2"></i>
                        View Dashboard
                    </a>
                    <button onclick="window.print()" class="w-full btn-outline text-center">
                        <i class="fas fa-print mr-2"></i>
                        Print Details
                    </button>
                </div>
            </div>

            <!-- Status Management -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Status Management</h3>
                <form action="<?php echo e(route('partners.status', $partner)); ?>" method="POST" class="space-y-3">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">Partner Status</label>
                        <select name="status" id="status" class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                            <option value="active" <?php echo e($partner->status == 'active' ? 'selected' : ''); ?>>Active</option>
                            <option value="inactive" <?php echo e($partner->status == 'inactive' ? 'selected' : ''); ?>>Inactive</option>
                            <option value="suspended" <?php echo e($partner->status == 'suspended' ? 'selected' : ''); ?>>Suspended</option>
                            <option value="pending" <?php echo e($partner->status == 'pending' ? 'selected' : ''); ?>>Pending</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full btn-primary">
                        <i class="fas fa-save mr-2"></i>
                        Update Status
                    </button>
                </form>
            </div>

            <!-- Recent Transactions -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Transactions</h3>
                <?php if($recentTransactions->count() > 0): ?>
                    <div class="space-y-3">
                        <?php $__currentLoopData = $recentTransactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg">
                            <div>
                                <p class="text-sm font-medium text-gray-900"><?php echo e($transaction->transaction_type_label); ?></p>
                                <p class="text-xs text-gray-500"><?php echo e($transaction->reference_number); ?></p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-medium text-gray-900"><?php echo e($transaction->formatted_amount); ?></p>
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium <?php echo e($transaction->status_badge_class); ?>">
                                    <?php echo e(ucfirst($transaction->status)); ?>

                                </span>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <p class="text-gray-500 text-center py-4">No recent transactions found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u363422527/domains/royelimytravel.com/public_html/b2b/resources/views/partners/show.blade.php ENDPATH**/ ?>