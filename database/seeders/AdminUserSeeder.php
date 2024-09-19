<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'blackman7063@gmail.com'], // Ensure this email is unique
            [
                'name' => 'slyvester muasya',
                'password' => Hash::make('slyqamsa.12'), // Use a strong password
                'is_admin' => true, // Assuming 'is_admin' field exists
                'phone' => '0715912435', // Provide a valid phone number
            ]
        );
    }
}
