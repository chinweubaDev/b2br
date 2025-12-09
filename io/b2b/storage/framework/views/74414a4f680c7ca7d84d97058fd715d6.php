<?php $__env->startSection('title', 'Send Mail to All Users'); ?>
<?php $__env->startSection('page-title', 'Send Mail to All Users'); ?>
<?php $__env->startSection('content'); ?>
<div class="max-w-xl mx-auto bg-white shadow rounded-lg p-6">
    <h2 class="text-xl font-bold mb-4">Send Email to All Users</h2>
    <form action="<?php echo e(route('admin.mail.sendAll')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="subject">Subject</label>
            <input type="text" name="subject" id="subject" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="message">Message</label>
            <textarea name="message" id="message" rows="6" class="w-full border rounded px-3 py-2" required></textarea>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Send Email</button>
    </form>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/simeonuba/Downloads/royeli_travel_portal_final/resources/views/admin/mail-all.blade.php ENDPATH**/ ?>