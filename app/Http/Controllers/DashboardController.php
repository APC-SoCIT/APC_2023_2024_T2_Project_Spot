<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Models\Reservation;

use Alert;

class DashboardController extends Controller
{
    public function index()
    {
        
        //authenticate user
        if(Auth::id())
        {

            $userType=Auth()->user()->user_type;

            // if its a student, redirect to student dashboard
            if($userType=='student')
            {
                return view('student.dashboard');
            }
            // if the user type is admin, redirect to admin page dashboard
            else if($userType=='admin')
            {
                return view('admin.dashboard');
            }

            else
            {
                return redirect()->back();
            }
        }

    }

    public function reserve()
    {
        if(Auth::id())
        {

            $userType=Auth()->user()->user_type;

            // if its a student, redirect to reserve dashboard
            if($userType=='student')
            {
                return view('student.reserve');
            }
            else
            {
                return redirect()->back();
            }
        }    
    }

    public function user_reserve(Request $request)
    {

        $user=Auth()->user();
        
        $userId = $user->id;
        $username = $user->name;
        $userType = $user->user_type;
        $reservations = new Reservation;

                    //table column     //name from the <form>
        $reservations->venue = $request-> venue;         
        $reservations->date = $request-> date;
        $reservations->time = $request-> time;       
        $reservations->status='Pending';    
        $reservations->user_id = $userId;
        $reservations->name = $username;
        $reservations->user_type = $userType;
        $reservations->purpose = $request-> purpose;
        $reservations->activity = $request-> activity;
        $reservations->description = $request-> description;

        $reservations->save();

        Alert::success('Success', 'You successfully booked you reservation. Please wait for approval.');

        return redirect()->back();
    }

    public function myReservations ()
    {
        $user=Auth::user();

        $userId = $user->id;

        $reservation = Reservation::where('user_id', '=', $userId)->get();

        return view ('student.my-reservations', compact('reservation'));
    }

    public function delete_myReservation($id)
    {
        $reservation = Reservation::find($id);

        $reservation->delete();

        return redirect()->back()->with('message', 'Reservation successfully cancelled');
    }


    public function editReservation($id)
    {
        $reservation = Reservation::find($id);

        return view('student.edit-reservation', compact('reservation'));
    }

    public function updateReservation(Request $request, $id)
    {
        $reservation = Reservation::find($id);

        // Update reservation details based on the form data
        $reservation->venue = $request->venue;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->purpose = $request->purpose;
        $reservation->activity = $request->activity;
        $reservation->description = $request->description;

        // Save the updated reservation
        $reservation->save();

        return redirect()->back(); // Redirect
    }

        

}
