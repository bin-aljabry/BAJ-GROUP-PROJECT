<?php

namespace App\Http\Controllers;

use App\Models\expense;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = expense::orderBy('id','DESC')->get();
    
        return view('cashier.accounting.expenses.index',compact('data'));
    }

    public function create()
    {
        return view('cashier.accounting.expenses.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        while (expense::where('slug', $uniqueSlug)->exists()) {
            $uniqueSlug = $baseSlug . '-' . $counter;
            $counter++;
        }
        expense::create([
            'expenditure'=>$request->expenditure,
            'date'=>$request->date,
            'amount'=>$request->amount,
            'paye'=>$request->paye,
            'approval'=>$request->approval,
            'remark'=>$request->remark,
            'slug'=>$uniqueSlug,
            'voucher_no'=>$request->voucher_no,
        ]);
        return redirect()->route('cashier.expenses.index')->with('success','Expenses created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(expense $expense)
    {
        //
    }
}
