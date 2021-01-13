<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerController extends Controller
{

    public function index(){
        $banners = Banner::all();
        return view('Admin.banner.index', compact('banners'));
    }


    public function create(){
        return view('Admin.banner.create');
    }


    public function store(Request $request){
        $request->validate([
            'banner_image' => 'required'
        ]);

        $file = $request->file('banner_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('website/images/banners', $filename);

        $form_data = array(
            'banner_image'=> $filename,
        );

        Banner::create($form_data);
        return redirect()->back()->with('success', 'Successfully banner created .');
    }


    public function destroy($id){
        Banner::where('id',$id)->delete();
        return redirect()->back()->with('success', 'Delete successfully');
    }
}
