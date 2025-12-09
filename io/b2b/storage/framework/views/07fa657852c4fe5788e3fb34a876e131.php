<?php $__env->startSection('title', 'All Services'); ?>
<?php $__env->startSection('page-title', 'All Services'); ?>
<?php $__env->startSection('content'); ?>
<div x-data="{ tab: 'tours' }">
    <div class="mb-6 flex space-x-2">
        <button @click="tab = 'tours'" :class="tab === 'tours' ? 'bg-blue-600 text-white' : 'bg-white text-blue-600'" class="px-4 py-2 rounded shadow">Tours</button>
        <button @click="tab = 'visas'" :class="tab === 'visas' ? 'bg-blue-600 text-white' : 'bg-white text-blue-600'" class="px-4 py-2 rounded shadow">Visas</button>
        <button @click="tab = 'hotels'" :class="tab === 'hotels' ? 'bg-blue-600 text-white' : 'bg-white text-blue-600'" class="px-4 py-2 rounded shadow">Hotels</button>
        <button @click="tab = 'cruises'" :class="tab === 'cruises' ? 'bg-blue-600 text-white' : 'bg-white text-blue-600'" class="px-4 py-2 rounded shadow">Cruises</button>
        <button @click="tab = 'docs'" :class="tab === 'docs' ? 'bg-blue-600 text-white' : 'bg-white text-blue-600'" class="px-4 py-2 rounded shadow">Documentation</button>
    </div>
    <div x-show="tab === 'tours'">
        <h2 class="text-xl font-bold mb-2">Tour Packages</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded shadow">
                <thead><tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Destination</th>
                    <th class="px-4 py-2">Category</th>
                    <th class="px-4 py-2">B2B Rate</th>
                    <th class="px-4 py-2">Status</th>
                </tr></thead>
                <tbody>
                <?php $__currentLoopData = $tours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="px-4 py-2"><?php echo e($tour->name); ?></td>
                        <td class="px-4 py-2"><?php echo e($tour->destination); ?></td>
                        <td class="px-4 py-2"><?php echo e($tour->category); ?></td>
                        <td class="px-4 py-2">₦<?php echo e(number_format($tour->b2b_rate)); ?></td>
                        <td class="px-4 py-2"><?php echo e($tour->is_active ? 'Active' : 'Inactive'); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <div x-show="tab === 'visas'">
        <h2 class="text-xl font-bold mb-2">Visa Services</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded shadow">
                <thead><tr>
                    <th class="px-4 py-2">Country</th>
                    <th class="px-4 py-2">Type</th>
                    <th class="px-4 py-2">B2B Rate</th>
                    <th class="px-4 py-2">Status</th>
                </tr></thead>
                <tbody>
                <?php $__currentLoopData = $visas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="px-4 py-2"><?php echo e($visa->country->name ?? ''); ?></td>
                        <td class="px-4 py-2"><?php echo e($visa->visa_type); ?></td>
                        <td class="px-4 py-2">₦<?php echo e(number_format($visa->b2b_rate)); ?></td>
                        <td class="px-4 py-2"><?php echo e($visa->is_active ? 'Active' : 'Inactive'); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <div x-show="tab === 'hotels'">
        <h2 class="text-xl font-bold mb-2">Hotels</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded shadow">
                <thead><tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">City</th>
                    <th class="px-4 py-2">Category</th>
                    <th class="px-4 py-2">B2B Rate</th>
                    <th class="px-4 py-2">Status</th>
                </tr></thead>
                <tbody>
                <?php $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="px-4 py-2"><?php echo e($hotel->name); ?></td>
                        <td class="px-4 py-2"><?php echo e($hotel->city); ?></td>
                        <td class="px-4 py-2"><?php echo e($hotel->category); ?></td>
                        <td class="px-4 py-2">₦<?php echo e(number_format($hotel->b2b_rate)); ?></td>
                        <td class="px-4 py-2"><?php echo e($hotel->is_active ? 'Active' : 'Inactive'); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <div x-show="tab === 'cruises'">
        <h2 class="text-xl font-bold mb-2">Cruises</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded shadow">
                <thead><tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Line</th>
                    <th class="px-4 py-2">Ship</th>
                    <th class="px-4 py-2">B2B Rate</th>
                    <th class="px-4 py-2">Status</th>
                </tr></thead>
                <tbody>
                <?php $__currentLoopData = $cruises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cruise): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="px-4 py-2"><?php echo e($cruise->name); ?></td>
                        <td class="px-4 py-2"><?php echo e($cruise->cruise_line); ?></td>
                        <td class="px-4 py-2"><?php echo e($cruise->ship_name); ?></td>
                        <td class="px-4 py-2">₦<?php echo e(number_format($cruise->b2b_rate)); ?></td>
                        <td class="px-4 py-2"><?php echo e($cruise->is_active ? 'Active' : 'Inactive'); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <div x-show="tab === 'docs'">
        <h2 class="text-xl font-bold mb-2">Documentation Services</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded shadow">
                <thead><tr>
                    <th class="px-4 py-2">Service</th>
                    <th class="px-4 py-2">Category</th>
                    <th class="px-4 py-2">B2B Rate</th>
                    <th class="px-4 py-2">Status</th>
                </tr></thead>
                <tbody>
                <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="px-4 py-2"><?php echo e($doc->service_name); ?></td>
                        <td class="px-4 py-2"><?php echo e(ucfirst($doc->category)); ?></td>
                        <td class="px-4 py-2">₦<?php echo e(number_format($doc->b2b_rate)); ?></td>
                        <td class="px-4 py-2"><?php echo e($doc->is_active ? 'Active' : 'Inactive'); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/simeonuba/Downloads/royeli_travel_portal_final/resources/views/admin/services.blade.php ENDPATH**/ ?>