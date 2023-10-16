<?php

namespace App\Http\Controllers;

use App\Models\PersonalRelief;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PersonalReliefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personalReliefs = PersonalRelief::all();
        return view('personal.index', compact('personalReliefs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('personal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'relief' => 'required|integer',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        PersonalRelief::create([
            'relief' => $request->input('relief'),
        ]);
        return redirect()->route('personal.index')->with('status', 'Personal Relief Successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(PersonalRelief $personalRelief)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $relief = PersonalRelief::where('id', $id)->first();
        return view('personal.edit', compact('relief'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $relief = PersonalRelief::where('id', $id)->first();
        $validator = Validator::make($request->all(), [
            'relief' => 'required|integer',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $relief->relief = $request->input('relief');
        $relief->save();
        return redirect()->route('personal.index')->with('status', 'Successfully Edited');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $relief = PersonalRelief::where('id', $id)->first();
        $relief->delete();
        return redirect()->route('personal.index');
    }
}
