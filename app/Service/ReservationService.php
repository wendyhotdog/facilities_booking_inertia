<?php

namespace App\Service;

use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationService
{
    public function  createReservation(Request $request)
    {
        // validate requests
        $request->validate([
            'facility_id' => 'required|exists:facilities,id',
            'start_time' => 'required',
            'end_time' => 'required',
            'reservation_date' => 'required',
        ]);
        $isAvailable = Reservation::where('facility_id', $request->facility_id)
            ->where('start_time', $request->start_time)
            ->exists();
        if ($isAvailable) {
            return back()->with('error', 'Slot is already booked');
        }
        $reservation = Reservation::create([
            'user_id' => auth()->user()->id,
            'facility_id' => $request->facility_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'reservation_date' => $request->reservation_date,
        ]);
        return $reservation;
    }
}
