<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Partner extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        'company_name',
        'contact_person',
        'email',
        'phone',
        'website',
        'address',
        'city',
        'state',
        'country',
        'postal_code',
        'business_type',
        'license_number',
        'tax_id',
        'commission_rate',
        'credit_limit',
        'current_balance',
        'status',
        'payment_terms',
        'services_offered',
        'specializations',
        'notes',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'commission_rate' => 'decimal:2',
        'credit_limit' => 'decimal:2',
        'current_balance' => 'decimal:2',
        'email_verified_at' => 'datetime',
        'services_offered' => 'array',
    ];

    /**
     * Get the bookings for this partner.
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Get the transactions for this partner.
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(PartnerTransaction::class);
    }

    /**
     * Scope a query to only include active partners.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope a query to only include partners by business type.
     */
    public function scopeByBusinessType($query, $type)
    {
        return $query->where('business_type', $type);
    }

    /**
     * Scope a query to only include partners by status.
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Get the formatted commission rate.
     */
    public function getFormattedCommissionRateAttribute()
    {
        return $this->commission_rate . '%';
    }

    /**
     * Get the formatted credit limit.
     */
    public function getFormattedCreditLimitAttribute()
    {
        return '₦' . number_format($this->credit_limit, 2);
    }

    /**
     * Get the formatted current balance.
     */
    public function getFormattedCurrentBalanceAttribute()
    {
        return '₦' . number_format($this->current_balance, 2);
    }

    /**
     * Get the available credit.
     */
    public function getAvailableCreditAttribute()
    {
        return $this->credit_limit - $this->current_balance;
    }

    /**
     * Get the formatted available credit.
     */
    public function getFormattedAvailableCreditAttribute()
    {
        return '₦' . number_format($this->available_credit, 2);
    }

    /**
     * Get the business type label.
     */
    public function getBusinessTypeLabelAttribute()
    {
        return ucwords(str_replace('_', ' ', $this->business_type));
    }

    /**
     * Get the status badge class.
     */
    public function getStatusBadgeClassAttribute()
    {
        return match($this->status) {
            'active' => 'bg-green-100 text-green-800',
            'inactive' => 'bg-gray-100 text-gray-800',
            'suspended' => 'bg-red-100 text-red-800',
            'pending' => 'bg-yellow-100 text-yellow-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }

    /**
     * Get the payment terms label.
     */
    public function getPaymentTermsLabelAttribute()
    {
        return match($this->payment_terms) {
            'immediate' => 'Immediate',
            '7_days' => '7 Days',
            '15_days' => '15 Days',
            '30_days' => '30 Days',
            default => 'Immediate',
        };
    }
}
