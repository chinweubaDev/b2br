<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_reference',
        'service_type',
        'service_id',
        'service_name',
        'amount',
        'currency',
        'payment_method',
        'payment_status',
        'transaction_id',
        'payment_details',
        'bank_transfer_details',
        'paid_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'payment_details' => 'array',
        'bank_transfer_details' => 'array',
        'paid_at' => 'datetime',
    ];

    /**
     * Boot the model and generate payment reference.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($payment) {
            if (empty($payment->payment_reference)) {
                $payment->payment_reference = 'PAY-' . strtoupper(Str::random(8)) . '-' . time();
            }
        });
    }

    /**
     * Get the user that owns the payment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the service based on service type and ID.
     */
    public function service()
    {
        return match($this->service_type) {
            'hotel' => $this->belongsTo(Hotel::class, 'service_id'),
            'tour' => $this->belongsTo(TourPackage::class, 'service_id'),
            'visa' => $this->belongsTo(VisaService::class, 'service_id'),
            'cruise' => $this->belongsTo(Cruise::class, 'service_id'),
            'document' => $this->belongsTo(DocumentationService::class, 'service_id'),
            default => null,
        };
    }

    /**
     * Scope a query to only include completed payments.
     */
    public function scopeCompleted($query)
    {
        return $query->where('payment_status', 'completed');
    }

    /**
     * Scope a query to only include pending payments.
     */
    public function scopePending($query)
    {
        return $query->where('payment_status', 'pending');
    }

    /**
     * Scope a query to only include failed payments.
     */
    public function scopeFailed($query)
    {
        return $query->where('payment_status', 'failed');
    }

    /**
     * Get the formatted amount.
     */
    public function getFormattedAmountAttribute()
    {
        return $this->currency . ' ' . number_format($this->amount, 2);
    }

    /**
     * Get the payment status badge class.
     */
    public function getStatusBadgeClassAttribute()
    {
        return match($this->payment_status) {
            'completed' => 'bg-green-100 text-green-800',
            'pending' => 'bg-yellow-100 text-yellow-800',
            'failed' => 'bg-red-100 text-red-800',
            'cancelled' => 'bg-gray-100 text-gray-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }

    /**
     * Get the payment method display name.
     */
    public function getPaymentMethodDisplayAttribute()
    {
        return match($this->payment_method) {
            'bank_transfer' => 'Bank Transfer',
            'paystack' => 'Paystack (Card)',
            default => ucfirst(str_replace('_', ' ', $this->payment_method)),
        };
    }

    /**
     * Get the payment method icon.
     */
    public function getPaymentMethodIconAttribute()
    {
        return match($this->payment_method) {
            'bank_transfer' => 'fas fa-university',
            'paystack' => 'fas fa-credit-card',
            default => 'fas fa-money-bill',
        };
    }

    /**
     * Check if payment is completed.
     */
    public function isCompleted()
    {
        return $this->payment_status === 'completed';
    }

    /**
     * Check if payment is pending.
     */
    public function isPending()
    {
        return $this->payment_status === 'pending';
    }

    /**
     * Check if payment is failed.
     */
    public function isFailed()
    {
        return $this->payment_status === 'failed';
    }

    /**
     * Mark payment as completed.
     */
    public function markAsCompleted($transactionId = null)
    {
        $this->update([
            'payment_status' => 'completed',
            'transaction_id' => $transactionId,
            'paid_at' => now(),
        ]);
    }

    /**
     * Mark payment as failed.
     */
    public function markAsFailed()
    {
        $this->update([
            'payment_status' => 'failed',
        ]);
    }

    /**
     * Get bank transfer details.
     */
    public function getBankTransferDetails()
    {
        return $this->bank_transfer_details ?? [
            'bank_name' => 'Royeli Travel Bank',
            'account_name' => 'Royeli Tours & Travel Ltd',
            'account_number' => '1234567890',
            'sort_code' => '123456',
            'reference' => $this->payment_reference,
        ];
    }

    /**
     * Generate Paystack payment data.
     */
    public function getPaystackData()
    {
        return [
            'amount' => $this->amount * 100, // Paystack expects amount in kobo
            'email' => $this->user->email,
            'reference' => $this->payment_reference,
            'callback_url' => route('payment.paystack.callback'),
            'metadata' => [
                'payment_id' => $this->id,
                'service_type' => $this->service_type,
                'service_id' => $this->service_id,
                'service_name' => $this->service_name,
            ],
        ];
    }
}
