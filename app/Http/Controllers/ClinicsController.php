<?php

namespace App\Http\Controllers;

use App\Models\Clinics;
use Illuminate\Http\Request;

class ClinicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clinics = Clinics::all(); // Assuming you have a Clinics model

        return view('clinics.index', compact('clinics'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clinics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name'        => 'required|string|max:255',
        ]);
    
        Clinics::create($validatedData);
    
        return redirect()->route('clinic.index')->with('success', 'Clinics added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clinics  $clinics
     * @return \Illuminate\Http\Response
     */
    public function show(Clinics $clinics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clinics  $clinics
     * @return \Illuminate\Http\Response
     */
    public function edit(Clinics $clinics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clinics  $clinics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clinics $clinics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clinics  $clinics
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clinics $clinics)
    {
        //
    }
}
