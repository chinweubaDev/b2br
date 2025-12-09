<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'location',
        'city',
        'country',
        'star_rating',
        'category',
        'amenities',
        'standard_rate',
        'b2b_rate',
        'currency',
        'image',
        'featured_image',
        'is_active',
    ];

    protected $casts = [
        'star_rating' => 'integer',
        'standard_rate' => 'decimal:2',
        'b2b_rate' => 'decimal:2',
        'amenities' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Get the amenities as an array.
     */
    public function getAmenitiesAttribute($value)
    {
        if (is_array($value)) {
            return $value;
        }
        
        if (is_string($value)) {
            // Try to decode once
            $decoded = json_decode($value, true);
            if (is_array($decoded)) {
                return $decoded;
            }
            
            // If that fails, try to decode twice (for double-encoded JSON)
            $decoded = json_decode(json_decode($value, true), true);
            if (is_array($decoded)) {
                return $decoded;
            }
            
            // If still not working, try to decode the raw value
            $rawValue = $this->getRawOriginal('amenities');
            if (is_string($rawValue)) {
                $decoded = json_decode($rawValue, true);
                if (is_array($decoded)) {
                    return $decoded;
                }
                
                $decoded = json_decode(json_decode($rawValue, true), true);
                if (is_array($decoded)) {
                    return $decoded;
                }
            }
        }
        
        return [];
    }

    /**
     * Get the extra images for this hotel.
     */
    public function images()
    {
        return $this->hasMany(ServiceImage::class, 'service_id')
                    ->where('service_type', 'hotel')
                    ->active()
                    ->ordered();
    }

    /**
     * Scope a query to only include active hotels.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to only include hotels by category.
     */
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Scope a query to only include hotels by city.
     */
    public function scopeByCity($query, $city)
    {
        return $query->where('city', $city);
    }

    /**
     * Scope a query to only include hotels by star rating.
     */
    public function scopeByStarRating($query, $rating)
    {
        return $query->where('star_rating', $rating);
    }

    /**
     * Get the formatted standard rate.
     */
    public function getFormattedStandardRateAttribute()
    {
        return $this->currency . ' ' . number_format($this->standard_rate, 2);
    }

    /**
     * Get the formatted B2B rate.
     */
    public function getFormattedB2bRateAttribute()
    {
        return $this->currency . ' ' . number_format($this->b2b_rate, 2);
    }

    /**
     * Get the savings amount.
     */
    public function getSavingsAttribute()
    {
        return $this->standard_rate - $this->b2b_rate;
    }

    /**
     * Get the formatted savings.
     */
    public function getFormattedSavingsAttribute()
    {
        return $this->currency . ' ' . number_format($this->savings, 2);
    }

    /**
     * Get the savings percentage.
     */
    public function getSavingsPercentageAttribute()
    {
        if ($this->standard_rate > 0) {
            return round(($this->savings / $this->standard_rate) * 100, 1);
        }
        return 0;
    }

    /**
     * Get the star rating display.
     */
    public function getStarRatingDisplayAttribute()
    {
        // Support up to 7 stars, ensure non-negative values
        $maxStars = 7;
        $filledStars = min($this->star_rating, $maxStars);
        $emptyStars = max(0, $maxStars - $filledStars);
        
        return str_repeat('★', $filledStars) . str_repeat('☆', $emptyStars);
    }

    /**
     * Get the category badge class.
     */
    public function getCategoryBadgeClassAttribute()
    {
        return match($this->category) {
            'Luxury' => 'bg-purple-100 text-purple-800',
            'Corporate' => 'bg-blue-100 text-blue-800',
            'Tropical' => 'bg-green-100 text-green-800',
            'Safari' => 'bg-yellow-100 text-yellow-800',
            'Budget' => 'bg-gray-100 text-gray-800',
            default => 'bg-gray-100 text-gray-800',
        };
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
