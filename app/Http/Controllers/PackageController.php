<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MpesaController;

class PackageController extends Controller
{
    public function welcome()
    {
        $packages = [
            'monthly_unlimited' => ['name' => 'Monthly Unlimited', 'price' => 1000, 'color' => '#4CAF50'],
            'monthly_30gb' => ['name' => 'Monthly 30GB', 'price' => 500, 'color' => '#2196F3'],
            'daily_1gb' => ['name' => 'Daily 1GB', 'price' => 20, 'color' => '#FF9800'],
            'daily_2gb' => ['name' => 'Daily 2GB', 'price' => 30, 'color' => '#9C27B0'],
            'weekly_2gb' => ['name' => 'Weekly 2GB', 'price' => 50, 'color' => '#FFC107'],
            'one_hour_unlimited' => ['name' => 'One Hour Unlimited', 'price' => 10, 'color' => '#F44336'],
            'weekly_unlimited_30gb' => ['name' => 'Weekly Unlimited 30GB', 'price' => 300, 'color' => '#009688'],
            'daily_unlimited' => ['name' => 'Daily Unlimited', 'price' => 80, 'color' => '#3F51B5'],
            'moderate_unlimited' => ['name' => 'Moderate Unlimited', 'price' => 50, 'color' => '#FF5722'],
        ];

        return view('welcome', ['packages' => $packages]);
    }

    public function buyPackage(Request $request, $package)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to be logged in to purchase packages.');
        }

        $amount = $request->input('amount');

        // Use MpesaController to handle the STK push
        $mpesaController = new MpesaController();
        return $mpesaController->stkPush($request); // Call the stkPush method
    }
}
