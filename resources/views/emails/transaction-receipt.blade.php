@component('mail::message')
# Payment Receipt

Hi {{ $user->name }},

Thank you for your payment! Here are your transaction details:

@component('mail::panel')
**Reference:** {{ $payment->payment_reference ?? $payment->id }}  
**Amount:** ₦{{ number_format($payment->amount) }}  
**Date:** {{ $payment->created_at->format('Y-m-d H:i') }}  
**Status:** <span style="color:green;font-weight:bold;">Completed</span>
@endcomponent

If you have any questions, reply to this email or contact our support.

Thanks for choosing **Royeli Travel**!

@component('mail::button', ['url' => route('dashboard')])
Go to Dashboard
@endcomponent

Best regards,  
**Royeli Travel Team**

@endcomponent
