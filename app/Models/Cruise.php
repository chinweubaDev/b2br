<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cruise extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'cruise_line',
        'ship_name',
        'route',
        'departure_date',
        'return_date',
        'duration_nights',
        'ports_of_call',
        'standard_rate',
        'b2b_rate',
        'inclusions',
        'exclusions',
        'image',
        'featured_image',
        'is_active',
    ];

    protected $casts = [
        'departure_date' => 'date',
        'return_date' => 'date',
        'standard_rate' => 'decimal:2',
        'b2b_rate' => 'decimal:2',
        'duration_nights' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Get the extra images for this cruise.
     */
    public function images()
    {
        return $this->hasMany(ServiceImage::class, 'service_id')
                    ->where('service_type', 'cruise')
                    ->active()
                    ->ordered();
    }

    /**
     * Scope a query to only include active cruises.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to only include cruises by cruise line.
     */
    public function scopeByCruiseLine($query, $cruiseLine)
    {
        return $query->where('cruise_line', $cruiseLine);
    }

    /**
     * Scope a query to only include cruises within a date range.
     */
    public function scopeByDateRange($query, $startDate, $endDate)
    {
        return $query->whereBetween('departure_date', [$startDate, $endDate]);
    }

    /**
     * Get the formatted standard rate.
     */
    public function getFormattedStandardRateAttribute()
    {
        return '₦' . number_format($this->standard_rate, 2);
    }

    /**
     * Get the formatted B2B rate.
     */
    public function getFormattedB2bRateAttribute()
    {
        return '₦' . number_format($this->b2b_rate, 2);
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
        return '₦' . number_format($this->savings, 2);
    }

    /**
     * Get the days until departure.
     */
    public function getDaysUntilDepartureAttribute()
    {
        return $this->departure_date->diffInDays(now());
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
