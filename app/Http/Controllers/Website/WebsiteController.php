<?php

namespace App\Http\Controllers\Website;

use App\Models\Banner;
use App\Models\Package;
use App\Models\Booking;
use App\Models\Photo;
use App\Models\Blog;
use App\Models\Team;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){
        $banners = Banner::orderBy('id', 'DESC')->get();
        $packages = Package::orderBy('id', 'DESC')->get();
        $photos = Photo::orderBy('id', 'DESC')->take(6)->get();
        $blogs = Blog::orderBy('id', 'DESC')->take(3)->get();
        return view('welcome', compact('banners', 'packages', 'photos', 'blogs'));
    }

    public function showPackage($id){
        $package = Package::find($id);
        return view('client.package.show', compact('package'));
    }

    public function confirmBook(Request $request){
        $request->validate([
            'user_id' => 'required',
            'package_id' => 'required',
            'phone' => 'required',
        ]);

        $form_data = array(
            'user_id'=> $request->user_id,
            'package_id'=> $request->package_id,
            'phone'=> $request->phone,
            'status'=>'pending'
        );

        Booking::create($form_data);
        return response()->json('success');
    }

    public function about(){
        $members = Team::all();
        return view('client.about', compact('members'));
    }

    public function services(){
        return view('client.services');
    }

    public function gallery(){
        $photos = Photo::orderBy('id', 'DESC')->get();
        return view('client.gallery', compact('photos'));
    }

    public function blog(){
        $blogs = Blog::orderBy('id', 'DESC')->get();
        return view('client.blog.index', compact('blogs'));
    }

    public function blogRead($id){
        $blog = Blog::find($id);
        return view('client.blog.read', compact('blog'));
    }

    public function contact(){
        return view('client.contact');
    }

    public function message(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255'],
            'message' => 'required',
        ]);

        var_dump($request->all());
    }

    public function login(){
        return view('Auth.login');
    }

    public function register(){
        return view('Auth.register');
    }

    public function reset(){
        return view('Auth.reset');
    }

    public function denied(){
        return view('denied');
    }
}
