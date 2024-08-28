<?php

namespace App\Http\Controllers;

use App\Models\income_category;
use App\Models\teller_income;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class TellerIncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $income = income_category::orderBy('id','DESC')->get();
        view()->share('expenditure',$income);

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = teller_income::orderBy('id','DESC')->get();

        return view('cashier.accounting.income.index',compact('data'));
    }

    public function create()
    {
        return view('cashier.accounting.income.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'expenditure'=>'required|max:255',

            'amount'=>'required',
            'paye'=>'required',
            'approval'=>'required',
            'remark'=>'required',
            'voucher_no'=>'required',

        ]);
        $baseSlug = Str::slug($request->name);
        $uniqueSlug = $baseSlug;
        $counter = 1;
        while (teller_income::where('slug', $uniqueSlug)->exists()) {
            $uniqueSlug = $baseSlug . '-' . $counter;
            $counter++;
        }
        teller_income::create([
            'expenditure'=>$request->expenditure,
            'date'=>Auth::user()->name,
            'amount'=>$request->amount,
            'paye'=>$request->paye,
            'approval'=>$request->approval,
            'remark'=>$request->remark,
            'slug'=>$uniqueSlug,
            'voucher_no'=>$request->voucher_no,
        ]);
        return redirect()->route('cashier.income.index')->with('success','Expenses created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $data = teller_income::where('id',decrypt($id))->first();
        return view('cashier.accounting.expenses.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'expenditure'=>'required|max:255',
            'date'=>'required',
            'amount'=>'required',
            'paye'=>'required',
            'approval'=>'required',
            'remark'=>'required',
            'voucher_no'=>'required',

        ]);
        $baseSlug = Str::slug($request->name);
        $uniqueSlug = $baseSlug;
        $counter = 1;
        while (teller_income::where('slug', $uniqueSlug)->where('id', '!=', $request->id)->exists()) {
            $uniqueSlug = $baseSlug . '-' . $counter;
            $counter++;
        }
        teller_income::where('id', $request->id)->update([
            'expenditure'=>$request->expenditure,
            'date'=>$request->date,
            'amount'=>$request->amount,
            'paye'=>$request->paye,
            'approval'=>$request->approval,
            'remark'=>$request->remark,
            'slug'=>$uniqueSlug,
            'voucher_no'=>$request->voucher_no,
        ]);
        return redirect()->route('cashier.income.index')->with('success','Expenses Updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        teller_income::where('id',decrypt($id))->delete();
        return redirect()->route('cashier.income.index')->with('error','Company deleted successfully.');
    }
}
