<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'partner_id',
        'reference_number',
        'booking_type',
        'service_name',
        'description',
        'amount',
        'currency',
        'travel_date',
        'return_date',
        'passengers',
        'status',
        'special_requirements',
        'notes',
    ];

    protected $casts = [
        'travel_date' => 'date',
        'return_date' => 'date',
        'amount' => 'decimal:2',
        'passengers' => 'integer',
    ];

    /**
     * Get the user that owns the booking.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the partner that owns the booking.
     */
    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    /**
     * Get the transactions for this booking.
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(PartnerTransaction::class);
    }

    /**
     * Scope a query to only include bookings by status.
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope a query to only include bookings by type.
     */
    public function scopeByType($query, $type)
    {
        return $query->where('booking_type', $type);
    }

    /**
     * Scope a query to only include bookings within a date range.
     */
    public function scopeByDateRange($query, $startDate, $endDate)
    {
        return $query->whereBetween('created_at', [$startDate, $endDate]);
    }

    /**
     * Get the formatted amount with currency.
     */
    public function getFormattedAmountAttribute()
    {
        return $this->currency . ' ' . number_format($this->amount, 2);
    }

    /**
     * Get the status badge class.
     */
    public function getStatusBadgeClassAttribute()
    {
        return match($this->status) {
            'pending' => 'status-pending',
            'confirmed' => 'status-confirmed',
            'completed' => 'status-completed',
            'cancelled' => 'status-cancelled',
            default => 'status-pending',
        };
    }

    /**
     * Get the booking type badge class.
     */
    public function getTypeBadgeClassAttribute()
    {
        return match($this->booking_type) {
            'visa' => 'bg-blue-100 text-blue-800',
            'tour' => 'bg-green-100 text-green-800',
            'hotel' => 'bg-purple-100 text-purple-800',
            'cruise' => 'bg-indigo-100 text-indigo-800',
            'documentation' => 'bg-gray-100 text-gray-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }
}
