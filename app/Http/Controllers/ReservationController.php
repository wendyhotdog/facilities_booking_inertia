<?php

namespace App\Http\Controllers;

use App\Enums\ReservationStatusEnums;
use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function store(ReservationRequest $request)
    {
        $isAvailable = Reservation::where('facility_id', $request->facility_id)
            ->where('start_time', $request->start_time)
            ->exists();
        if ($isAvailable) {
            return back()->with('error', 'Slot is already booked');
        }

        $reservation = $request->user()->reservations()->create($request->validated());
        // return redirect()->route('reservations.show', $reservation);
    }
    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        return inertia('Reservation/Show', compact('reservation'));
    }

    public function cancel($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = ReservationStatusEnums::CANCELLED;
        $reservation->save();
        return redirect()->route('home.index');
    }
}
