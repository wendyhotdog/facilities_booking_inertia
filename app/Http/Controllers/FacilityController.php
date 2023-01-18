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

    public function edit($id)
    {
        $facility = Facility::find($id);
        return inertia('Facilities/Edit', [
            'facility' => $facility,
        ]);
    }

    public function update($id)
    {
        $facility = Facility::find($id);
        $facility->update(request()->all());
        return redirect()->route('facilities.index');
    }

    public function destroy($id)
    {
        $facility = Facility::find($id);
        $facility->delete();
        return redirect()->route('facilities.index');
    }
}
