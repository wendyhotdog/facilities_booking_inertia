<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index()
    {
        return inertia('Facilities/Index', [
            'facilities' => Facility::latest()->get(),
        ]);
    }
    public function store(Request $request)
    {
        $facility = Facility::create($request->all());
        return redirect()->route('facilities.index');
    }
}
