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

    public function update(Request $request, $id)
    {
        $facility = \App\Models\Facility::find($id);
        $facility->name = $request->name;
        $facility->description = $request->description;
        $facility->rate_per_hour = $request->rate_per_hour;
        $facility->save();

        return redirect()->route('admin.facilities.show', $facility->id);
    }
}
