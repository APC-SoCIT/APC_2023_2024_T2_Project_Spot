<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Models\Reservation;

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

    public function myReservations(Request $request)
    {
        $reservations = new Reservation;

                    //table column     //name from the <form>
        $reservations->venue = $request-> venue;
                  
        $reservations->date = $request-> date;

        $reservations->time = $request-> time;
        
        $reservations->purpose = $request-> purpose;

        $reservations->activity = $request-> activity;

        $reservations->description = $request-> description;

        $reservations->status='pending';

        $reservations->save();

        return redirect()->back();
    }

}
