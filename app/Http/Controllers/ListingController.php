<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index()
    {
        $listings = Listing::listing()->get();
        return view('listings.index', [
            'listings' => $listings,
        ]);
    }

    public function offlineIndex(){
        return 'Offline View';
    }
}
