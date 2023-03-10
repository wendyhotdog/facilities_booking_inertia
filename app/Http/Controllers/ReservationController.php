<?php

namespace App\Http\Controllers;

use App\Enums\ReservationStatusEnums;
use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use App\Service\ReservationService;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $reservationService = new ReservationService();
        $reservation = $reservationService->createReservation($request);
        return redirect()->route('reservations.show', $reservation);
    }
    public function show($id)
    {
        $reservation = Reservation::with('facility')->findOrFail($id);
        return inertia('Reservation/Show', compact('reservation'));
    }

    public function cancel($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = ReservationStatusEnums::CANCELLED;
        $reservation->save();
        return redirect()->route('home.index');
    }

    public function index()
    {
        $reservations = Reservation::where('user_id', auth()->user()->id)->with('facility')->latest()->get();
        return inertia('Reservation/Index', compact('reservations'));
    }
}
