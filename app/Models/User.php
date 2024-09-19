<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone', // Add this field to the fillable array
        'is_admin', // Add this field to the fillable array
        'account_amount', // Add this field to the fillable array
        'bundles_remaining', // Add this field to the fillable array
        'bundle_purchase_date', // Add this field to the fillable array
        'bundle_expiry_date', // Add this field to the fillable array
        'bundle_speed', // Add this field to the fillable array
        'time_remaining_in_seconds', // Add this field to the fillable array
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_admin' => 'boolean', // Cast the 'is_admin' field to boolean
        'bundle_purchase_date' => 'datetime', // Cast dates if necessary
        'bundle_expiry_date' => 'datetime', // Cast dates if necessary
    ];

    /**
     * Check if the user is an admin.
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->is_admin;
    }

    // Add accessors if needed for formatting

    /**
     * Accessor for account amount.
     */
    public function getAccountAmountAttribute($value)
    {
        return number_format($value, 2); // Format the account amount
    }

    /**
     * Accessor for remaining bundles.
     */
    public function getRemainingBundlesAttribute($value)
    {
        return $value . ' MB'; // Format the remaining bundles
    }

    // Add more accessors as needed
}
