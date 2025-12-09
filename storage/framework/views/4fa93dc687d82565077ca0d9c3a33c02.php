<?php $__env->startComponent('mail::message'); ?>
# Payment Receipt

Hi <?php echo e($user->name); ?>,

Thank you for your payment! Here are your transaction details:

<?php $__env->startComponent('mail::panel'); ?>
**Reference:** <?php echo e($payment->payment_reference ?? $payment->id); ?>  
**Amount:** ₦<?php echo e(number_format($payment->amount)); ?>  
**Date:** <?php echo e($payment->created_at->format('Y-m-d H:i')); ?>  
**Status:** <span style="color:green;font-weight:bold;">Completed</span>
<?php echo $__env->renderComponent(); ?>

If you have any questions, reply to this email or contact our support.

Thanks for choosing **Royeli Travel**!

<?php $__env->startComponent('mail::button', ['url' => route('dashboard')]); ?>
Go to Dashboard
<?php echo $__env->renderComponent(); ?>

Best regards,  
**Royeli Travel Team**

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/u363422527/domains/royelimytravel.com/public_html/b2b/resources/views/emails/transaction-receipt.blade.php ENDPATH**/ ?>