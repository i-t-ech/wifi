<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Please login to continue.');
        }

        $user = Auth::user();

        // Ensure these fields are accessible
        $accountBalance = $user->account_amount ?? '0.00';
        $remainingBundles = $user->bundles_remaining ?? '0';
        $lastPurchaseTime = $user->bundle_purchase_date ? $user->bundle_purchase_date->format('Y-m-d H:i:s') : 'N/A';
        $expiryTime = $user->bundle_expiry_date ? $user->bundle_expiry_date->format('Y-m-d H:i:s') : 'N/A';
        $bundleUsage = $user->time_remaining_in_seconds ?? '0';
        $speed = $user->bundle_speed ?? '0';

        // Define the available packages with colors
        $packages = [
            ['id' => 1, 'name' => 'Monthly Unlimited', 'price' => 1000, 'color' => 'blue'],
            ['id' => 2, 'name' => 'Monthly 30GB', 'price' => 500, 'color' => 'green'],
            ['id' => 3, 'name' => 'Daily 1GB', 'price' => 20, 'color' => 'purple'],
            ['id' => 4, 'name' => 'Daily 2GB', 'price' => 30, 'color' => 'orange'],
            ['id' => 5, 'name' => 'Weekly 2GB', 'price' => 50, 'color' => 'red'],
            ['id' => 6, 'name' => 'One Hour Unlimited', 'price' => 10, 'color' => 'teal'],
            ['id' => 7, 'name' => 'Weekly Unlimited 30GB', 'price' => 300, 'color' => 'indigo'],
            ['id' => 8, 'name' => 'Daily Unlimited', 'price' => 80, 'color' => 'cyan'],
            ['id' => 9, 'name' => 'Moderate Unlimited', 'price' => 50, 'color' => 'gray'],
        ];

        return view('dashboard', compact('accountBalance', 'remainingBundles', 'lastPurchaseTime', 'expiryTime', 'bundleUsage', 'speed', 'packages'));
    }
}
