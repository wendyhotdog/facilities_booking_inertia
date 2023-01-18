<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $facilities = Facility::latest()->get();
        return inertia('Auth/Home', [
            'facilities' => $facilities,
        ]);
    }
}
