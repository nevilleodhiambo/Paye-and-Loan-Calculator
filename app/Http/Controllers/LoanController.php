<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = Loan::all();
        return view('loan.index', compact('loans'));
    }
    public function calcloan(Request $request){
        // return $request->all();
        $loan = Loan::where('id', 1)->first();
        $amount = $request->input('amount');
        $rate = $request->input('rate')/100;
        $number = $request->input('number');

        $validator =Validator::make($request->all(), [
            'amount' => 'required',
            'rate' => 'required',
            'number' => 'required'
        ]);
        if($validator->fails()){
            return redirect()->back();
        }

        // $m  = ($rate / $loan->rate) * $amount;
        // return $m;

    //    return $monthlyPayment = $amount * ($rate * pow(1 + $rate, $number))
    //     / (pow(1 + $rate, $number) - 1);
    if($amount < 0 || $rate < 0 || $number < 0){
        return redirect()->back();
    }
    $myrate = $rate/$loan->rate;

    // $m = $amount * (($rate/$loan->rate)/(1-(1+$rate/$loan->rate)*pow(-$number, )));$
    $m  = round($amount * ($myrate/(1- pow(1 + $myrate,  -$number))), 0);

    $total = round($m * $number);

    $interest = round($total - $amount);

    // $balance = $amount;
    // for($year = 1;$year <= $pre; $year++ ){
    //     $int = $balance * $myrate;
    //     $balance  -= $interest;
    // }
    // return $balance;

    return view('loan/display', compact('m', 'number', 'amount','rate', 'total', 'interest'));




    }

    public function display(){
        return view('loan.display');
    }
    public function enteramount(){
        return view('loan/calcloan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('loan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'rate' => 'required|integer',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Loan::create([
            'rate' => $request->input('rate'),
        ]);
        return redirect()->route('loancalculator.index')->with('status', 'Success');
    }


    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rate = Loan::where('id', $id)->first();
       return view('loan.edit', compact('rate'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rate = Loan::where('id', $id)->first();
        $validator = Validator::make($request->all(),[
            'rate' => 'required|integer',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $rate->rate = $request->input('rate');
        $rate->save();
        return redirect()->route('loancalculator.index')->with('status', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rate = Loan::where('id', $id)->first();
        $rate->delete();
        return redirect()->route('loancalculator.index')->with('status', 'Success');

    }
}
