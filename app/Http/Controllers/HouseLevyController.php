<?php

namespace App\Http\Controllers;

use App\Models\House_levy;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HouseLevyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levies = House_levy::all();
        return view('levy/index', ['levies' => $levies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('levy/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'house_levy' => 'required|decimal:2'
        ]);
        // return $request->all();
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        House_levy::create([
            'house_levy' => $request->input('house_levy'),
        ]);
        return redirect()->route('levy.index')->with('status', 'House Levy Successfully Created!');
    }

    /**p
     * Display the specified resource.
     */
    public function show(House_levy $house_levy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $levy = House_levy::where('id', $id)->first();
        return view('levy/edit', compact('levy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        return $request->all();
        $levy = House_levy::where('id', $id)->first();
        $validator = Validator::make($request->all(),[
            'house_levy' => 'required|decimal:2'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $levy->house_levy = $request->input('house_levy');
        $levy->save();
        return redirect()->route('levy.index')->with('status', 'House Levy Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $levy = House_levy::where('id', $id)->first();
        $levy->delete();
        return redirect()->route('levy.index')->with('status', 'House Levy Deleted Successfully!');
    }
}
