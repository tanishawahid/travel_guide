<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::all();
        return view('Admin.package.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'image' => 'required',
            'details' => 'required',
        ]);

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('website/images/packages', $filename);


        $form_data = array(
            'title'=> $request->title,
            'start_date'=> $request->start_date,
            'end_date'=> $request->end_date,
            'image'=> $filename,
            'details'=> $request->details,
        );

        Package::create($form_data);
        return redirect()->back()->with('success', 'Successfully package created .');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = Package::find($id);
        return view('Admin.package.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'image' => 'required',
            'details' => 'required',
        ]);

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('website/images/packages', $filename);


        $form_data = array(
            'title'=> $request->title,
            'start_date'=> $request->start_date,
            'end_date'=> $request->end_date,
            'image'=> $filename,
            'details'=> $request->details,
        );

        $record = Package::find($id);
        $record->update($form_data);
        return redirect()->back()->with('success', 'Successfully package updated .');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Package::where('id',$id)->delete();
        return redirect()->back()->with('success', 'Delete successfully');
    }
}
