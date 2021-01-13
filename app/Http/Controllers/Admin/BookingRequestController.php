<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Package;
use App\Models\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingRequestController extends Controller
{
    public function index(){
        $requests = Booking::join('packages', 'packages.id', '=', 'bookings.package_id')
            ->join('users', 'users.id', '=', 'bookings.user_id')
            ->select(
                'bookings.id', 
                'bookings.phone', 
                'bookings.status', 
                'packages.title',
                'packages.image',
                'users.name',
                'users.email'
            )
            ->get();

        return view('Admin.booking-request.index', compact('requests'));
    }

    public function approve($id){
        $form_data = array(
            'status'=> 'confirmed'
        );

        $record = Booking::find($id);
        $record->update($form_data);
        return redirect()->back()->with('success', 'Request Approved .');
    }

    public function canceled($id){
        $form_data = array(
            'status'=> 'canceled'
        );

        $record = Booking::find($id);
        $record->update($form_data);
        return redirect()->back()->with('success', 'Request Canceled .');
    }
}
