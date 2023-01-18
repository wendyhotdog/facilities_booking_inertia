<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $facilities = Facility::latest()->take(5)->get();
        return inertia('Auth/Home', [
            'facilities' => $facilities,
        ]);
    }
}
