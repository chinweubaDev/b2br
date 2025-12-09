<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentationService extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_name',
        'description',
        'standard_rate',
        'b2b_rate',
        'requirements',
        'processing_time',
        'category',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'standard_rate' => 'decimal:2',
        'b2b_rate' => 'decimal:2'
    ];

    // Accessors
    public function getFormattedStandardRateAttribute()
    {
        return '₦' . number_format($this->standard_rate, 2);
    }

    public function getFormattedB2bRateAttribute()
    {
        return '₦' . number_format($this->b2b_rate, 2);
    }

    public function getFormattedSavingsAttribute()
    {
        $savings = $this->standard_rate - $this->b2b_rate;
        return '₦' . number_format($savings, 2);
    }

    public function getSavingsPercentageAttribute()
    {
        if ($this->standard_rate > 0) {
            return round((($this->standard_rate - $this->b2b_rate) / $this->standard_rate) * 100);
        }
        return 0;
    }

    public function getStatusBadgeClassAttribute()
    {
        return $this->is_active 
            ? 'bg-green-100 text-green-800' 
            : 'bg-red-100 text-red-800';
    }

    public function getCategoryBadgeClassAttribute()
    {
        $classes = [
            'legal' => 'bg-blue-100 text-blue-800',
            'travel' => 'bg-green-100 text-green-800',
            'business' => 'bg-purple-100 text-purple-800'
        ];
        
        return $classes[strtolower($this->category)] ?? 'bg-gray-100 text-gray-800';
    }
}
