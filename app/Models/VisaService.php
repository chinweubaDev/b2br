<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VisaService extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id',
        'visa_type',
        'service_name',
        'requirements',
        'processing_time',
        'standard_rate',
        'b2b_rate',
        'cost_includes',
        'additional_notes',
        'featured_image',
        'is_active',
    ];

    protected $casts = [
        'standard_rate' => 'decimal:2',
        'b2b_rate' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    /**
     * Get the country that owns the visa service.
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Get the extra images for this visa service.
     */
    public function images()
    {
        return $this->hasMany(ServiceImage::class, 'service_id')
                    ->where('service_type', 'visa')
                    ->active()
                    ->ordered();
    }

    /**
     * Scope a query to only include active visa services.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to only include visa services by country.
     */
    public function scopeByCountry($query, $countryId)
    {
        return $query->where('country_id', $countryId);
    }

    /**
     * Scope a query to only include visa services by type.
     */
    public function scopeByType($query, $type)
    {
        return $query->where('visa_type', $type);
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
     * Get the featured image URL.
     */
    public function getFeaturedImageUrlAttribute()
    {
        return $this->featured_image ? asset('storage/' . $this->featured_image) : null;
    }
}
