<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RDBController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    
    public function calculator(Request $request){
        $term = $request->input('term');
        $principal = $request->input('principal');
        $interest = $request->input('interest')/100;
        $r = $interest / 12;
        $no_of_payment = $term * 12;

        // return $request->all();
        $mp = round(($principal * $r)/(1 - pow(1 + $r, (-$no_of_payment))), 2);
        // return $mp;
        $total_interest = ($mp * $no_of_payment) - $principal;

        $amortization= [];

        $rembalance = $principal;
        
        for($i = 1; $i <= $no_of_payment; $i++){
            $interestPayment = round($rembalance * $r, 2);
            $principalPayment = round($mp - $interestPayment, 2);
            $rembalance     -= round($principalPayment, 2);
            $amortization[] = [
                's_no' => $i,
                'payment' => $mp,
                'principal_payment' => $principalPayment,
                'interest_payment' => $interestPayment,
                'remaining_balance' => $rembalance,
            ];

        }
        return view('Rdb.display', compact('amortization', 'total_interest'));

    }
    public function input(){
        // $principal = $request->input('princip')
        return view('Rdb/input');
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
