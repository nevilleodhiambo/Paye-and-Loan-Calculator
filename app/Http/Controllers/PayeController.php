<?php

namespace App\Http\Controllers;

use App\Models\Paye;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PayeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payes= Paye::all();
        return view('paye.index', compact('payes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paye.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'low_income' => 'required|integer',
            'high_income' => 'integer',
            'rates' => 'required|decimal:2',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Paye::create([
            'low_income' => $request->input('low_income'),
            'high_income' => $request->input('high_income'),
            'rates' => $request->input('rates'),
        ]);
        return redirect()->route('paye.index')->with('status', "Payee Successfully Created");


    }

    /**
     * Display the specified resource.
     */
    public function show(Paye $paye)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $paye = Paye::where('id', $id)->first();
        return view('paye.edit', compact('paye'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $paye = Paye::where('id', $id)->first();
        $validator = Validator::make($request->all(), [
            'low_income' => 'required|integer',
            'high_income' => 'required|integer|nullable',
            'rates' => 'required|decimal:2',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

            $paye->low_income = $request->low_income;
            $paye->high_income = $request->high_income;
            $paye->rates = $request->rates;
            $paye->save();
        return redirect()->route('paye.index')->with('status', "Payee Successfully Updated");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $paye = Paye::where('id', $id)->first();
        $paye->delete();
        return redirect()->route('paye.index')->with('status', "Payee Successfully Deleted");

    }
}
