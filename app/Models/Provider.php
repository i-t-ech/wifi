<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'image_url',
        'is_admin',
    ];

    // Method to check if the provider is an admin
    public function isAdmin()
    {
        return $this->is_admin;
    }
}
