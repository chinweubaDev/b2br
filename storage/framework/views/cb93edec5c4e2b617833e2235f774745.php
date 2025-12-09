<?php $__env->startSection('title', 'Edit Visa Service - Royeli Tours & Travel'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Edit Visa Service</h1>
            <p class="mt-2 text-gray-600">Update visa service information</p>
        </div>

        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-8">
                <form method="POST" action="<?php echo e(route('visas.update', $visa)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    
                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="country_id" class="block text-sm font-medium text-gray-700 mb-2">Country *</label>
                                <select id="country_id" name="country_id" required class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Select Country</option>
                                    <?php $__currentLoopData = \App\Models\Country::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($country->id); ?>" <?php echo e($visa->country_id == $country->id ? 'selected' : ''); ?>>
                                            <?php echo e($country->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div>
                                <label for="visa_type" class="block text-sm font-medium text-gray-700 mb-2">Visa Type *</label>
                                <select id="visa_type" name="visa_type" required class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Select Visa Type</option>
                                    <option value="tourist" <?php echo e($visa->visa_type == 'tourist' ? 'selected' : ''); ?>>Tourist Visa</option>
                                    <option value="business" <?php echo e($visa->visa_type == 'business' ? 'selected' : ''); ?>>Business Visa</option>
                                    <option value="student" <?php echo e($visa->visa_type == 'student' ? 'selected' : ''); ?>>Student Visa</option>
                                    <option value="work" <?php echo e($visa->visa_type == 'work' ? 'selected' : ''); ?>>Work Visa</option>
                                    <option value="transit" <?php echo e($visa->visa_type == 'transit' ? 'selected' : ''); ?>>Transit Visa</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="standard_rate" class="block text-sm font-medium text-gray-700 mb-2">Standard Rate (₦) *</label>
                                <input type="number" id="standard_rate" name="standard_rate" value="<?php echo e($visa->standard_rate); ?>" step="0.01" min="0" required class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label for="b2b_rate" class="block text-sm font-medium text-gray-700 mb-2">B2B Rate (₦) *</label>
                                <input type="number" id="b2b_rate" name="b2b_rate" value="<?php echo e($visa->b2b_rate); ?>" step="0.01" min="0" required class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>

                        <div>
                            <label for="processing_time" class="block text-sm font-medium text-gray-700 mb-2">Processing Time *</label>
                            <input type="text" id="processing_time" name="processing_time" value="<?php echo e($visa->processing_time); ?>" placeholder="e.g., 5-7 business days" required class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div>
                            <label for="requirements" class="block text-sm font-medium text-gray-700 mb-2">Requirements *</label>
                            <textarea id="requirements" name="requirements" rows="6" required class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="List all required documents and requirements..."><?php echo e($visa->requirements); ?></textarea>
                        </div>

                        <div>
                            <label for="cost_includes" class="block text-sm font-medium text-gray-700 mb-2">Cost Includes</label>
                            <input type="text" id="cost_includes" name="cost_includes" value="<?php echo e($visa->cost_includes); ?>" placeholder="e.g., Application fee, processing, courier" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div>
                            <label for="additional_notes" class="block text-sm font-medium text-gray-700 mb-2">Additional Notes</label>
                            <textarea id="additional_notes" name="additional_notes" rows="4" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Any additional information..."><?php echo e($visa->additional_notes); ?></textarea>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="is_active" name="is_active" value="1" <?php echo e($visa->is_active ? 'checked' : ''); ?> class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="is_active" class="ml-2 block text-sm text-gray-900">Active Service</label>
                        </div>

                        <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                            <a href="<?php echo e(route('visas.index')); ?>" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">Cancel</a>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">Update Visa Service</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u363422527/domains/royelimytravel.com/public_html/b2b/resources/views/admin/visas/visas/edit.blade.php ENDPATH**/ ?>