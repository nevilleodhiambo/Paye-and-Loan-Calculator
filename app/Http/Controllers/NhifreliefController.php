<?php

namespace App\Http\Controllers;

use App\Models\Nhifrelief;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NhifreliefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nhifs = Nhifrelief::all();
        return view('nhifrelief.index', compact('nhifs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nhifrelief.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'relief' => 'required|decimal:2'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Nhifrelief::create([
            'relief' => $request->input('relief'),
        ]);
        return redirect()->route('nhifrelief.index')->with('status', 'Relief Successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nhifrelief $nhifrelief)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $nhif = Nhifrelief::where('id', $id)->first();
        return view('nhifrelief.edit', compact('nhif'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $nhif = Nhifrelief::where('id', $id)->first();

        $validator = Validator::make($request->all(), [
            'relief' => 'required|decimal:2'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $nhif->relief = $request->input('relief');
        $nhif->save();
        return redirect()->route('nhifrelief.index')->with('status', 'Relief Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
