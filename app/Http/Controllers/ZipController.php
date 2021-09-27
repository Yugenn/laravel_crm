<?php

namespace App\Http\Controllers;

use App\Models\Zip;
use Illuminate\Http\Request;

class ZipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zips = Zip::all();
        return view('zips.index', compact('zips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('zips.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                $zip = new Zip();

        $zip->name = $request->name;
        $zip->email = $request->email;
        $zip->postcode = $request->postcode;
        $zip->address = $request->address;
        $zip->phoneNumber = $request->phoneNumber;
        $zip->save();

        return redirect()->route('zips.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zip  $zip
     * @return \Illuminate\Http\Response
     */
    public function show(Zip $zip)
    {
        return view('zips.show', compact('zip'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Zip  $zip
     * @return \Illuminate\Http\Response
     */
    public function edit(Zip $zip)
    {
        return view('zips.edit', compact('zip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Zip  $zip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zip $zip)
    {
        $zip->name = $request->name;
        $zip->email = $request->email;
        $zip->postcode = $request->postcode;
        $zip->address = $request->address;
        $zip->phoneNumber = $request->phoneNumber;
        $zip->save();

        return redirect()->route('zips.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zip  $zip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zip $zip)
    {
        $zip->delete();
        return redirect()->route('zips.index');
    }

    public function dod(Zip $zip)
    {

        return view('zips.form');
    }


}

    
