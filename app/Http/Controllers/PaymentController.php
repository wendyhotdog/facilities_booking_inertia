<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Service\ReservationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function create()
    {
        return inertia('Payment/Create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            // dd($request->all());
            $reservationService = new ReservationService();
            $reservation = $reservationService->createReservation($request);
            // dd($reservation);
            Payment::create([
                'reservation_id' => $reservation->id,
                'amount' => $request->amount,
                'method' => $request->method,
                'user_id' => auth()->user()->id,
                'status' => 'pending',
                'receipt_image_url' => $request->receipt_image_url,
            ]);
            DB::commit();
            return redirect()->route('home.index');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }
}
