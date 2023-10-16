<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Http\Controllers\Controller;
use App\Models\House_levy;
use App\Models\Nhifrelief;
use App\Models\Nssf;
use App\Models\Paye;
use App\Models\PersonalRelief;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salaries = Salary::all();
        return view('money/salaries', compact('salaries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('money/createsalary');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function searching(){
        return view('money.searching');
    }
    public function search(Request $request){
        $search = $request->input('search');
        $result = Salary::where('low_amount', '<=', $search)
                        ->where('high_amount', '>=', $search)
                        ->orWhereNull('high_amount')->first();

        $mynssf = Nssf::where('id', 1)->first();
        $levy  = House_levy::where('id', 1)->first();
        // return $mynssf;

        $nhifrelief = Nhifrelief::where('id', 1)->first();
        $personalrelief = PersonalRelief::where('id', 1)->first();

    
                        

        if($result){

            if($search <= $mynssf->lel){
                $tier1 = ($mynssf->pension_contribution)/100 * $search;
                $tier2 = 0;
            }elseif($search > $mynssf->lel){
                $tier1 = ($mynssf->pension_contribution)/100 * $mynssf->lel;
                // $bal = $search
            }



            if($search <= $mynssf->lel ){
                $tier2 = 0;
            }elseif($search > $mynssf->lel && $search <= $mynssf->uel){
                $bal = $search - $mynssf->lel;
                // return $bal;
                $tier2 = ($mynssf->pension_contribution)/100 * $bal;
            }else{
                $bal = $mynssf->uel - $mynssf->lel;
                $tier2 = ($mynssf->pension_contribution)/100 * $bal;
            }

            $taxes = Paye::all();
            $mysearch = $search - $tier1 - $tier2;
            // return $mysearch;

            $paye = 0;
            // $i = 0;
            foreach($taxes  as $tax){
                if($mysearch > $tax->high_income){
                     $deduct = $tax->high_income - $tax->low_income;
                    $paye +=  $deduct * ($tax->rates)/100;
                }else{
                    $deduct = $mysearch - $tax->low_income;
                    $paye += $deduct * ($tax->rates)/100;
    
                    break;
    
                }

                // $i++;
            }            

    
                    // return $paye;
            // return $tier2;
            $h_levy = $levy->house_levy/100 * $search;
            // return $mylevy;

            $rates = $result->rates;
            $nhif_relief = ($nhifrelief->relief)/100 * $rates;

            // return $paye;
             $reliefs =  $paye - $personalrelief->relief - $nhif_relief;

             if($reliefs < 0){
                $paye = 0;
             }else{
                $paye = $reliefs;
             }
             $deductions = $paye + $tier1 + $tier2 + $rates + $h_levy; 
             $net = $search - $deductions;
            
            return view('money.display', compact('rates', 'tier1', 'tier2', 'search', 'h_levy', 'paye', 'nhif_relief', 'mysearch', 'deductions', 'net'));
        

            // return response()->json(['rates' => $rate]);
        }else{
            return response(['error' => 'Rate not found']);
        }
        
    }
    public function store(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(),[
            'low_amount' => 'required|integer',
            'high_amount' => 'integer',
            'rates' => 'required|integer',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        };
        // return $request->all();
        Salary::create([
            'low_amount' => $request->input('low_amount'),
            'high_amount' => $request->input('high_amount'),
            'rates' => $request->input('rates'),
        ]);
        return redirect()->route('salary.index')->with('status', 'Rates Successfully Created!');
    }
    // public function nssf1(){
    //     return view('money.nssf');
    // }
    public function nssf(Request $request){
        $nssf = $request->input('nssf');
        // $nssf1 = Salary::where($nssf, '>=', 0)->where($nssf , '<=', 600)->first();
    }

    /**
     * Display the specified resource.
     */
    public function show(Salary $salary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $nhif = Salary::where('id', $id)->first();
        return view('Edit.nhif', compact('nhif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $nhif = Salary::where('id', $id)->first();
        $validator = Validator::make($request->all(), [
            'low_amount' => 'required|integer',
            'high_amount' => 'integer',
            'rates' => 'required|integer',

        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // return $request->all();
        $nhif->low_amount = $request->input('low_amount');
        $nhif->high_amount = $request->input('high_amount');
        $nhif->rates = $request->input('rates');
        $nhif->save();
        return redirect()->route('salary.index')->with('status', 'Rates Successsfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $nhif = Salary::where('id', $id)->first();
        $nhif->delete();
        return redirect()->route('salary.index');
    }
}
