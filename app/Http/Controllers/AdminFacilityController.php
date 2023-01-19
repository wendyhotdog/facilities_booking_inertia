<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminFacilityController extends Controller
{
    public function index()
    {
        return inertia('Admin/Facility/Index', [
            'facilities' => \App\Models\Facility::all(),
        ]);
    }

    public function show($id)
    {
        return inertia('Admin/Facility/Show', [
            'facility' => \App\Models\Facility::find($id),
        ]);
    }

    public function create()
    {
        return inertia('Admin/Facility/Create');
    }
}
