<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'company_name',
        'is_active',
        'last_login_at',
        'points_balance',
        'wallet_balance',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_active' => 'boolean',
        'last_login_at' => 'datetime',
        'wallet_balance' => 'decimal:2',
    ];

    /**
     * User roles
     */
    const ROLE_ADMIN = 'admin';
    const ROLE_MANAGER = 'manager';
    const ROLE_AGENT = 'agent';
    const ROLE_USER = 'user';

    /**
     * Get the bookings for the user.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Get the payments for the user.
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * Check if user is admin
     */
    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }

    /**
     * Check if user is manager
     */
    public function isManager()
    {
        return $this->role === self::ROLE_MANAGER;
    }

    /**
     * Check if user is agent
     */
    public function isAgent()
    {
        return $this->role === self::ROLE_AGENT;
    }

    /**
     * Check if user has admin privileges
     */
    public function hasAdminPrivileges()
    {
        return in_array($this->role, [self::ROLE_ADMIN, self::ROLE_MANAGER]);
    }

    /**
     * Get available roles
     */
    public static function getRoles()
    {
        return [
            self::ROLE_ADMIN => 'Admin',
            self::ROLE_MANAGER => 'Manager',
            self::ROLE_AGENT => 'Travel Agent',
            self::ROLE_USER => 'User',
        ];
    }

    /**
     * Get role display name
     */
    public function getRoleDisplayNameAttribute()
    {
        return self::getRoles()[$this->role] ?? 'Unknown';
    }

    /**
     * Get role badge class
     */
    public function getRoleBadgeClassAttribute()
    {
        return match($this->role) {
            self::ROLE_ADMIN => 'bg-red-100 text-red-800',
            self::ROLE_MANAGER => 'bg-blue-100 text-blue-800',
            self::ROLE_AGENT => 'bg-green-100 text-green-800',
            self::ROLE_USER => 'bg-gray-100 text-gray-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }

    /**
     * Scope to get only active users
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to get users by role
     */
    public function scopeByRole($query, $role)
    {
        return $query->where('role', $role);
    }

    /**
     * Update last login timestamp
     */
    public function updateLastLogin()
    {
        $this->update(['last_login_at' => now()]);
    }

    public function walletTransactions()
    {
        return $this->hasMany(\App\Models\WalletTransaction::class);
    }

    public function getFormattedWalletBalanceAttribute()
    {
        return '₦' . number_format($this->wallet_balance, 2);
    }
} 