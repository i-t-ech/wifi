<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BundlesController extends Controller
{
    /**
     * Display the page for buying bundles.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Return the view for buying bundles
        return view('bundles.index');
    }
}
