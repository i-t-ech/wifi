<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    // Define the table if it's not the plural form of the model name
    protected $table = 'providers';

    // Define fillable attributes for mass assignment
    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'image_url',
    ];

    // Define the relationship with Package
    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}

