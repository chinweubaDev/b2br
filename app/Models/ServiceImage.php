<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_type',
        'service_id',
        'image_path',
        'caption',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Get the service that owns the image.
     */
    public function service()
    {
        return match($this->service_type) {
            'tour' => $this->belongsTo(TourPackage::class, 'service_id'),
            'hotel' => $this->belongsTo(Hotel::class, 'service_id'),
            'cruise' => $this->belongsTo(Cruise::class, 'service_id'),
            'visa' => $this->belongsTo(VisaService::class, 'service_id'),
            default => null,
        };
    }

    /**
     * Scope a query to only include active images.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to only include images by service type.
     */
    public function scopeByServiceType($query, $serviceType)
    {
        return $query->where('service_type', $serviceType);
    }

    /**
     * Scope a query to only include images by service ID.
     */
    public function scopeByServiceId($query, $serviceId)
    {
        return $query->where('service_id', $serviceId);
    }

    /**
     * Scope a query to order by sort order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }

    /**
     * Get the full image URL.
     */
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image_path);
    }
} 