<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category',
        'destination',
        'travel_start_date',
        'travel_end_date',
        'duration_days',
        'standard_rate',
        'b2b_rate',
        'inclusions',
        'exclusions',
        'itinerary',
        'image',
        'featured_image',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'travel_start_date' => 'date',
        'travel_end_date' => 'date',
        'standard_rate' => 'decimal:2',
        'b2b_rate' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * Get the bookings for this tour package.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'service_id')->where('booking_type', 'tour');
    }

    /**
     * Get the extra images for this tour package.
     */
    public function images()
    {
        return $this->hasMany(ServiceImage::class, 'service_id')
                    ->where('service_type', 'tour')
                    ->active()
                    ->ordered();
    }

    /**
     * Scope a query to only include active tours.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to only include featured tours.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Get the featured image URL.
     */
    public function getFeaturedImageUrlAttribute()
    {
        if ($this->featured_image) {
            return asset('storage/' . $this->featured_image);
        }
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    /**
     * Get the main image URL.
     */
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }
}
