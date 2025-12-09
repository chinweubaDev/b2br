<?php $__env->startSection('title', 'Add New Hotel'); ?>

<?php $__env->startSection('page-title', 'Add New Hotel'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-900 flex items-center">
                <i class="fas fa-plus-circle mr-3 text-blue-500"></i>
                Hotel Information
            </h2>
            <p class="text-gray-600 mt-1">Fill in the details below to add a new hotel to the system.</p>
        </div>

        <form action="<?php echo e(route('hotels.store')); ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
            <?php echo csrf_field(); ?>
            
            <!-- Basic Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Hotel Name *</label>
                    <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                           placeholder="Enter hotel name" required>
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                    <select name="category" id="category" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200" required>
                        <option value="">Select category</option>
                        <option value="Luxury" <?php echo e(old('category') == 'Luxury' ? 'selected' : ''); ?>>Luxury</option>
                        <option value="Corporate" <?php echo e(old('category') == 'Corporate' ? 'selected' : ''); ?>>Corporate</option>
                        <option value="Tropical" <?php echo e(old('category') == 'Tropical' ? 'selected' : ''); ?>>Tropical</option>
                        <option value="Safari" <?php echo e(old('category') == 'Safari' ? 'selected' : ''); ?>>Safari</option>
                        <option value="Budget" <?php echo e(old('category') == 'Budget' ? 'selected' : ''); ?>>Budget</option>
                    </select>
                    <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <!-- Location Information -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="city" class="block text-sm font-medium text-gray-700 mb-2">City *</label>
                    <input type="text" name="city" id="city" value="<?php echo e(old('city')); ?>" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                           placeholder="Enter city" required>
                    <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label for="country" class="block text-sm font-medium text-gray-700 mb-2">Country *</label>
                    <input type="text" name="country" id="country" value="<?php echo e(old('country')); ?>" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                           placeholder="Enter country" required>
                    <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label for="star_rating" class="block text-sm font-medium text-gray-700 mb-2">Star Rating *</label>
                    <select name="star_rating" id="star_rating" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200" required>
                        <option value="">Select rating</option>
                        <?php for($i = 1; $i <= 7; $i++): ?>
                            <option value="<?php echo e($i); ?>" <?php echo e(old('star_rating') == $i ? 'selected' : ''); ?>><?php echo e($i); ?> Star<?php echo e($i > 1 ? 's' : ''); ?></option>
                        <?php endfor; ?>
                    </select>
                    <?php $__errorArgs = ['star_rating'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <!-- Full Location -->
            <div>
                <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Full Location *</label>
                <input type="text" name="location" id="location" value="<?php echo e(old('location')); ?>" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                       placeholder="e.g., Victoria Island, Lagos, Nigeria" required>
                <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                <textarea name="description" id="description" rows="4" 
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                          placeholder="Enter detailed description of the hotel..." required><?php echo e(old('description')); ?></textarea>
                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Pricing Information -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="standard_rate" class="block text-sm font-medium text-gray-700 mb-2">Standard Rate *</label>
                    <div class="relative">
                        <input type="number" name="standard_rate" id="standard_rate" value="<?php echo e(old('standard_rate')); ?>" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                               placeholder="0.00" step="0.01" min="0" required>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 text-sm">NGN</span>
                        </div>
                    </div>
                    <?php $__errorArgs = ['standard_rate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label for="b2b_rate" class="block text-sm font-medium text-gray-700 mb-2">B2B Rate *</label>
                    <div class="relative">
                        <input type="number" name="b2b_rate" id="b2b_rate" value="<?php echo e(old('b2b_rate')); ?>" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                               placeholder="0.00" step="0.01" min="0" required>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 text-sm">NGN</span>
                        </div>
                    </div>
                    <?php $__errorArgs = ['b2b_rate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label for="currency" class="block text-sm font-medium text-gray-700 mb-2">Currency *</label>
                    <select name="currency" id="currency" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200" required>
                        <option value="NGN" <?php echo e(old('currency') == 'NGN' ? 'selected' : ''); ?>>NGN - Nigerian Naira</option>
                        <option value="USD" <?php echo e(old('currency') == 'USD' ? 'selected' : ''); ?>>USD - US Dollar</option>
                        <option value="EUR" <?php echo e(old('currency') == 'EUR' ? 'selected' : ''); ?>>EUR - Euro</option>
                        <option value="GBP" <?php echo e(old('currency') == 'GBP' ? 'selected' : ''); ?>>GBP - British Pound</option>
                    </select>
                    <?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <!-- Amenities -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Amenities *</label>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                    <?php
                        $commonAmenities = [
                            'Wi-Fi', 'Pool', 'Spa', 'Gym', 'Restaurant', 'Bar', 'Breakfast', 
                            'Business Center', 'Conference Room', 'Tennis Court', 'Kitchenette', 
                            'Laundry', 'Room Service', 'Air Conditioning', 'TV', 'Mini Bar'
                        ];
                    ?>
                    <?php $__currentLoopData = $commonAmenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="amenities[]" value="<?php echo e($amenity); ?>" 
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                   <?php echo e(in_array($amenity, old('amenities', [])) ? 'checked' : ''); ?>>
                            <span class="ml-3 text-sm text-gray-700"><?php echo e($amenity); ?></span>
                        </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php $__errorArgs = ['amenities'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Image Upload -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Hotel Image</label>
                <div class="flex items-center justify-center w-full">
                    <label for="image" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                            <p class="mb-2 text-sm text-gray-500">
                                <span class="font-semibold">Click to upload</span> or drag and drop
                            </p>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                        </div>
                        <input id="image" name="image" type="file" class="hidden" accept="image/*" />
                    </label>
                </div>
                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Status -->
            <div>
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" 
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                           <?php echo e(old('is_active', true) ? 'checked' : ''); ?>>
                    <span class="ml-3 text-sm text-gray-700">Active Hotel</span>
                </label>
                <p class="mt-1 text-xs text-gray-500">Inactive hotels won't be visible to customers</p>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="<?php echo e(route('hotels.index')); ?>" 
                   class="px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors duration-200">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200">
                    <i class="fas fa-save mr-2"></i>
                    Create Hotel
                </button>
            </div>
        </form>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Preview image upload
        const imageInput = document.getElementById('image');
        const imageLabel = imageInput.parentElement;
        
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imageLabel.innerHTML = `
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <img src="${e.target.result}" class="w-16 h-16 object-cover rounded mb-2">
                            <p class="text-sm text-gray-500">${file.name}</p>
                        </div>
                    `;
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u363422527/domains/royelimytravel.com/public_html/b2b/resources/views/admin/hotels/hotels/create.blade.php ENDPATH**/ ?>