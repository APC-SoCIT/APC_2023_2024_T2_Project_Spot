<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reservation;

class AdminController extends Controller

{
        public function showBookings()
    {
        $bookings = Reservation::all();
        return view('admin.bookings', compact('bookings'));
    }


    public function approveReservation($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 'Approved';
        $reservation->save();

        return redirect()->route('admin.bookings')->with('success', 'Reservation approved successfully');
    }

    public function rejectReservation($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 'Rejected';
        $reservation->save();

        return redirect()->route('admin.bookings')->with('error', 'Reservation rejected');
    }

    
}
