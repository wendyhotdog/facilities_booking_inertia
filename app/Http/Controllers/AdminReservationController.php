<?php

namespace App\Http\Controllers;

use App\Enums\ReservationStatusEnums;
use Illuminate\Http\Request;

class AdminReservationController extends Controller
{
    public function index()
    {
        return inertia('Admin/Reservation/Index', [
            'reservations' => \App\Models\Reservation::with('facility')->latest()->get(),
        ]);
    }

    public function show($id)
    {
        return inertia('Admin/Reservation/Show', [
            'reservation' => \App\Models\Reservation::with('facility', 'payment')->find($id),
        ]);
    }

    public function create()
    {
        return inertia('Admin/Reservation/Create');
    }

    public function approve($id)
    {
        $reservation = \App\Models\Reservation::find($id);
        $reservation->payment->status = ReservationStatusEnums::PAID;
        $reservation->status = ReservationStatusEnums::PAID;
        $reservation->save();
        $reservation->payment->save();

        return redirect()->route('admin.reservations.show', $id);
    }
}
