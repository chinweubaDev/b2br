<?php $__env->startSection('title', 'Create Booking - Royeli Tours & Travel'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Create New Booking</h1>
                <p class="text-gray-600">Book your travel services with Royeli Tours & Travel</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="<?php echo e(route('bookings.index')); ?>" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Bookings
                </a>
            </div>
        </div>
    </div>

    <!-- Booking Form -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="px-6 py-8">
            <form action="<?php echo e(route('bookings.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                
                <div class="space-y-8">
                    <!-- Service Information -->
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Service Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="booking_type" class="block text-sm font-medium text-gray-700 mb-2">Booking Type *</label>
                                <select id="booking_type" name="booking_type" required class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 <?php $__errorArgs = ['booking_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option value="">Select Booking Type</option>
                                    <option value="visa" <?php echo e(old('booking_type', $prefill['booking_type'] ?? '') == 'visa' ? 'selected' : ''); ?>>Visa Service</option>
                                    <option value="tour" <?php echo e(old('booking_type', $prefill['booking_type'] ?? '') == 'tour' ? 'selected' : ''); ?>>Tour Package</option>
                                    <option value="hotel" <?php echo e(old('booking_type', $prefill['booking_type'] ?? '') == 'hotel' ? 'selected' : ''); ?>>Hotel</option>
                                    <option value="cruise" <?php echo e(old('booking_type', $prefill['booking_type'] ?? '') == 'cruise' ? 'selected' : ''); ?>>Cruise</option>
                                    <option value="documentation" <?php echo e(old('booking_type', $prefill['booking_type'] ?? '') == 'documentation' ? 'selected' : ''); ?>>Documentation</option>
                                </select>
                                <?php $__errorArgs = ['booking_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div>
                                <label for="service_name" class="block text-sm font-medium text-gray-700 mb-2">Service Name *</label>
                                <input type="text" id="service_name" name="service_name" value="<?php echo e(old('service_name', $prefill['service_name'] ?? '')); ?>" required class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 <?php $__errorArgs = ['service_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter service name">
                                <?php $__errorArgs = ['service_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                    <!-- Pricing Information -->
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Pricing Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Amount (₦) *</label>
                                <input type="number" id="amount" name="amount" value="<?php echo e(old('amount')); ?>" step="0.01" min="0" required class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="0.00">
                                <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div>
                                <label for="currency" class="block text-sm font-medium text-gray-700 mb-2">Currency *</label>
                                <select id="currency" name="currency" required class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 <?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option value="NGN" <?php echo e(old('currency', 'NGN') == 'NGN' ? 'selected' : ''); ?>>NGN (Nigerian Naira)</option>
                                    <option value="USD" <?php echo e(old('currency') == 'USD' ? 'selected' : ''); ?>>USD (US Dollar)</option>
                                    <option value="EUR" <?php echo e(old('currency') == 'EUR' ? 'selected' : ''); ?>>EUR (Euro)</option>
                                    <option value="GBP" <?php echo e(old('currency') == 'GBP' ? 'selected' : ''); ?>>GBP (British Pound)</option>
                                </select>
                                <?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                    <!-- Travel Details -->
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Travel Details</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label for="travel_date" class="block text-sm font-medium text-gray-700 mb-2">Travel Date</label>
                                <input type="date" id="travel_date" name="travel_date" value="<?php echo e(old('travel_date')); ?>" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 <?php $__errorArgs = ['travel_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <?php $__errorArgs = ['travel_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div>
                                <label for="return_date" class="block text-sm font-medium text-gray-700 mb-2">Return Date</label>
                                <input type="date" id="return_date" name="return_date" value="<?php echo e(old('return_date')); ?>" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 <?php $__errorArgs = ['return_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <?php $__errorArgs = ['return_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div>
                                <label for="passengers" class="block text-sm font-medium text-gray-700 mb-2">Number of Passengers</label>
                                <input type="number" id="passengers" name="passengers" value="<?php echo e(old('passengers', 1)); ?>" min="1" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 <?php $__errorArgs = ['passengers'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <?php $__errorArgs = ['passengers'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                    <!-- Booking Status -->
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Booking Status</h3>
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                            <select id="status" name="status" required class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option value="pending" <?php echo e(old('status', 'pending') == 'pending' ? 'selected' : ''); ?>>Pending</option>
                                <option value="confirmed" <?php echo e(old('status') == 'confirmed' ? 'selected' : ''); ?>>Confirmed</option>
                                <option value="completed" <?php echo e(old('status') == 'completed' ? 'selected' : ''); ?>>Completed</option>
                                <option value="cancelled" <?php echo e(old('status') == 'cancelled' ? 'selected' : ''); ?>>Cancelled</option>
                            </select>
                            <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Description</h3>
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                            <textarea id="description" name="description" rows="4" required class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Provide a detailed description of the booking..."><?php echo e(old('description')); ?></textarea>
                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Additional Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="special_requirements" class="block text-sm font-medium text-gray-700 mb-2">Special Requirements</label>
                                <textarea id="special_requirements" name="special_requirements" rows="4" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 <?php $__errorArgs = ['special_requirements'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Any special requirements or requests..."><?php echo e(old('special_requirements')); ?></textarea>
                                <?php $__errorArgs = ['special_requirements'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div>
                                <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Notes</label>
                                <textarea id="notes" name="notes" rows="4" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Additional notes or comments..."><?php echo e(old('notes')); ?></textarea>
                                <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                        <a href="<?php echo e(route('bookings.index')); ?>" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">
                            Cancel
                        </a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg flex items-center">
                            <i class="fas fa-save mr-2"></i>
                            Create Booking
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const bookingType = document.getElementById('booking_type');
        const serviceName = document.getElementById('service_name');
        
        // Auto-generate reference number
        function generateReference() {
            const timestamp = Date.now().toString().slice(-6);
            const random = Math.random().toString(36).substr(2, 4).toUpperCase();
            return `BK${timestamp}${random}`;
        }
        
        // Set default reference number
        if (!document.getElementById('reference_number')) {
            const referenceInput = document.createElement('input');
            referenceInput.type = 'hidden';
            referenceInput.name = 'reference_number';
            referenceInput.value = generateReference();
            document.querySelector('form').appendChild(referenceInput);
        }
        
        // Auto-fill service name based on booking type
        bookingType.addEventListener('change', function() {
            const type = this.value;
            const serviceNames = {
                'visa': 'Visa Application Service',
                'tour': 'Tour Package Booking',
                'hotel': 'Hotel Reservation',
                'cruise': 'Cruise Package',
                'documentation': 'Documentation Service'
            };
            
            if (serviceNames[type] && !serviceName.value) {
                serviceName.value = serviceNames[type];
            }
        });

        // Auto-calculate return date based on travel date
        const travelDate = document.getElementById('travel_date');
        const returnDate = document.getElementById('return_date');
        
        travelDate.addEventListener('change', function() {
            if (this.value && !returnDate.value) {
                const travel = new Date(this.value);
                const returnDateValue = new Date(travel);
                returnDateValue.setDate(travel.getDate() + 7); // Default 7 days
                returnDate.value = returnDateValue.toISOString().split('T')[0];
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u363422527/domains/royelimytravel.com/public_html/b2b/resources/views/bookings/create.blade.php ENDPATH**/ ?>