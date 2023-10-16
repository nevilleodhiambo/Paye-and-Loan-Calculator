<?php

namespace App\Http\Controllers;

use App\Models\Nssf;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NssfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nssfs = Nssf::all();
        return view('money/nssf', ['nssfs' => $nssfs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    
    public function create()
    {
        return view('money.nssfcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'lel' => 'required|integer',
            'uel' => 'required|integer',
            'pension_contribution' => 'required|integer'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // return $request->all();
       Nssf::create([
        'lel' => $request->input('lel'),
        'uel' => $request->input('uel'),
        'pension_contribution' => $request->input('pension_contribution'),
       ]);
        return redirect()->route('nssf.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nssf $nssf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $nssf = Nssf::where('id', $id)->first();
        // return $nssf;
        return view('Edit/nssf', compact('nssf'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $nssf = Nssf::where('id', $id)->first();
        $validator = Validator::make($request->all(), [
            'lel' => 'required|integer',
            'uel' => 'required|integer',
            'pension_contribution' => 'required|integer'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // return $request->all();
        $nssf->lel = $request->input('lel');
        $nssf->uel = $request->input('uel');
        $nssf->pension_contribution = $request->input('pension_contribution');
        $nssf->save();
        return redirect()->route('nssf.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $nssf = Nssf::where('id', $id)->first();
        $nssf->delete();
        return to_route('nssf.index');
    }
}
