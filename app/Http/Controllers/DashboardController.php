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
    
    public function bookings()
    {
        return view("admin.bookings");
    }

    public function manage()
    {
        return view("admin.manage");
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

        return view ('student.myReservations', compact('reservation'));
    }

    public function delete_myReservation($id)
    {
        $reservation = Reservation::find($id);

        $reservation->delete();

        return redirect()->back()->with('message', 'Reservation successfully cancelled');
    }


}
