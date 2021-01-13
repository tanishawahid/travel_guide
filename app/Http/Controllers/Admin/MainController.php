<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Banner;
use App\Models\Package;
use App\Models\Blog;
use App\Models\Team;
use App\Models\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard(){
        $admin = User::where('admin', 1)->get()->count();
        $users = User::where('admin', 0)->get()->count();
        $banners = Banner::count();
        $blogs = Blog::count();
        $members = Team::count();
        $requests = Booking::count();
        
        return view('Admin.dashboard', compact('admin', 'users', 'banners', 'blogs', 'members', 'requests'));
    }
}
