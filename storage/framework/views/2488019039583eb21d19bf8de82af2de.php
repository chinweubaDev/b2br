<?php $__env->startSection('title', 'Partners - Admin Dashboard'); ?>
<?php $__env->startSection('page-title', 'Partners'); ?>

<?php $__env->startSection('content'); ?>
<!-- Header -->
<div class="glass-card p-6 mb-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-200">Partners</h1>
            <p class="text-gray-400 mt-1">Manage all B2B travel partners</p>
        </div>
        <a href="<?php echo e(route('admin.partners.create')); ?>" class="px-4 py-2 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition">
            <i class="fas fa-plus mr-2"></i>Add New Partner
        </a>
    </div>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="glass-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Total Partners</p>
                <h3 class="text-2xl font-bold text-gray-200 mt-1"><?php echo e(\App\Models\Partner::count()); ?></h3>
            </div>
            <div class="w-12 h-12 bg-purple-500/20 rounded-lg flex items-center justify-center">
                <i class="fas fa-handshake text-purple-400 text-xl"></i>
            </div>
        </div>
    </div>

    <div class="glass-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Travel Agents</p>
                <h3 class="text-2xl font-bold text-green-400 mt-1"><?php echo e(\App\Models\Partner::where('business_type', 'travel_agent')->count()); ?></h3>
            </div>
            <div class="w-12 h-12 bg-green-500/20 rounded-lg flex items-center justify-center">
                <i class="fas fa-suitcase text-green-400 text-xl"></i>
            </div>
        </div>
    </div>

    <div class="glass-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Tour Operators</p>
                <h3 class="text-2xl font-bold text-blue-400 mt-1"><?php echo e(\App\Models\Partner::where('business_type', 'tour_operator')->count()); ?></h3>
            </div>
            <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center">
                <i class="fas fa-bus text-blue-400 text-xl"></i>
            </div>
        </div>
    </div>

    <div class="glass-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Corporate</p>
                <h3 class="text-2xl font-bold text-yellow-400 mt-1"><?php echo e(\App\Models\Partner::where('business_type', 'corporate')->count()); ?></h3>
            </div>
            <div class="w-12 h-12 bg-yellow-500/20 rounded-lg flex items-center justify-center">
                <i class="fas fa-building text-yellow-400 text-xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Filter and Search -->
<div class="glass-card p-6 mb-6">
    <form method="GET" action="<?php echo e(route('admin.partners.index')); ?>" class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Search</label>
            <input 
                type="text" 
                name="search" 
                value="<?php echo e(request('search')); ?>" 
                placeholder="Company name or contact..." 
                class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
            >
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Business Type</label>
            <select 
                name="type" 
                class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
            >
                <option value="">All Types</option>
                <option value="travel_agent" <?php echo e(request('type') == 'travel_agent' ? 'selected' : ''); ?>>Travel Agent</option>
                <option value="tour_operator" <?php echo e(request('type') == 'tour_operator' ? 'selected' : ''); ?>>Tour Operator</option>
                <option value="corporate" <?php echo e(request('type') == 'corporate' ? 'selected' : ''); ?>>Corporate</option>
                <option value="individual" <?php echo e(request('type') == 'individual' ? 'selected' : ''); ?>>Individual</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Payment Terms</label>
            <select 
                name="payment_terms" 
                class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
            >
                <option value="">All Terms</option>
                <option value="immediate" <?php echo e(request('payment_terms') == 'immediate' ? 'selected' : ''); ?>>Immediate</option>
                <option value="7_days" <?php echo e(request('payment_terms') == '7_days' ? 'selected' : ''); ?>>7 Days</option>
                <option value="15_days" <?php echo e(request('payment_terms') == '15_days' ? 'selected' : ''); ?>>15 Days</option>
                <option value="30_days" <?php echo e(request('payment_terms') == '30_days' ? 'selected' : ''); ?>>30 Days</option>
            </select>
        </div>

        <div class="flex items-end gap-2">
            <button type="submit" class="flex-1 px-4 py-3 bg-purple-500 hover:bg-purple-600 text-white rounded-lg transition">
                <i class="fas fa-search mr-2"></i>Filter
            </button>
            <a href="<?php echo e(route('admin.partners.index')); ?>" class="px-4 py-3 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition">
                <i class="fas fa-redo"></i>
            </a>
        </div>
    </form>
</div>

<!-- Partners Table -->
<div class="glass-card p-6">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Company</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Contact</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Business Type</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Commission</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Credit Limit</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Payment Terms</th>
                    <th class="text-right py-3 px-4 text-gray-300 font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $partners = \App\Models\Partner::latest()->paginate(15);
                ?>
                <?php $__empty_1 = true; $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="border-b border-gray-700/50 hover:bg-white/5 transition">
                    <td class="py-4 px-4">
                        <div>
                            <p class="text-gray-200 font-medium"><?php echo e($partner->company_name); ?></p>
                            <p class="text-xs text-gray-400"><?php echo e($partner->city); ?>, <?php echo e($partner->country); ?></p>
                        </div>
                    </td>
                    <td class="py-4 px-4">
                        <div class="text-gray-300">
                            <p class="text-sm"><?php echo e($partner->contact_person); ?></p>
                            <p class="text-xs text-gray-400"><?php echo e($partner->email); ?></p>
                            <p class="text-xs text-gray-400"><?php echo e($partner->phone); ?></p>
                        </div>
                    </td>
                    <td class="py-4 px-4">
                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-purple-500/20 text-purple-400 capitalize">
                            <?php echo e(str_replace('_', ' ', $partner->business_type)); ?>

                        </span>
                    </td>
                    <td class="py-4 px-4">
                        <span class="text-gray-200"><?php echo e($partner->commission_rate); ?>%</span>
                    </td>
                    <td class="py-4 px-4">
                        <span class="text-gray-200">₦<?php echo e(number_format($partner->credit_limit, 2)); ?></span>
                    </td>
                    <td class="py-4 px-4">
                        <span class="text-gray-300 capitalize text-sm"><?php echo e(str_replace('_', ' ', $partner->payment_terms)); ?></span>
                    </td>
                    <td class="py-4 px-4">
                        <div class="flex items-center justify-end gap-2">
                            <a href="<?php echo e(route('admin.partners.show', $partner)); ?>" class="p-2 hover:bg-blue-500/20 rounded-lg transition text-blue-400" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?php echo e(route('admin.partners.edit', $partner)); ?>" class="p-2 hover:bg-green-500/20 rounded-lg transition text-green-400" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="<?php echo e(route('admin.partners.destroy', $partner)); ?>" class="inline" onsubmit="return confirm('Are you sure you want to delete this partner?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="p-2 hover:bg-red-500/20 rounded-lg transition text-red-400" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="7" class="py-12 text-center">
                        <div class="text-gray-400">
                            <i class="fas fa-handshake text-4xl mb-4 opacity-50"></i>
                            <p class="text-lg">No partners found</p>
                            <p class="text-sm mt-2">Add your first partner to get started</p>
                            <a href="<?php echo e(route('admin.partners.create')); ?>" class="inline-block mt-4 px-6 py-2 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition">
                                <i class="fas fa-plus mr-2"></i>Add Partner
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <?php if($partners->hasPages()): ?>
    <div class="mt-6">
        <?php echo e($partners->links()); ?>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/simeonuba/b2br/resources/views/admin/partners/index.blade.php ENDPATH**/ ?>