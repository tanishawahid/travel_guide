<?php

namespace App\Http\Controllers\User;

use App\Models\Booking;
use App\Models\Package;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function dashboard(){
        $packages = Package::join('bookings', 'bookings.package_id', '=', 'packages.id')
        ->where('bookings.user_id', '=', Auth()->User()->id)
        ->select('bookings.status', 'packages.title')
        ->get();

        return view('client.Account.dashboard', compact('packages'));
    }
}
