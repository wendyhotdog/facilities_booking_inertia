<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminReservationController extends Controller
{
    public function index()
    {
        return inertia('Admin/Reservation/Index', [
            'reservations' => \App\Models\Reservation::all(),
        ]);
    }

    public function show($id)
    {
        return inertia('Admin/Reservation/Show', [
            'reservation' => \App\Models\Reservation::find($id),
        ]);
    }

    public function create()
    {
        return inertia('Admin/Reservation/Create');
    }
}
