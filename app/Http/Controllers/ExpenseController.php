<?php

namespace App\Http\Controllers;

use App\Models\expense;
use App\Models\expenses_category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class ExpenseController extends Controller
{

    public function __construct()
    {
        $expenditure = expenses_category::orderBy('id','DESC')->get();
        view()->share('expenditure',$expenditure);

    }
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
            'date'=>Auth::user()->name,
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
    public function edit($id)
    {
        //
        $data = expense::where('id',decrypt($id))->first();
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
        while (expense::where('slug', $uniqueSlug)->where('id', '!=', $request->id)->exists()) {
            $uniqueSlug = $baseSlug . '-' . $counter;
            $counter++;
        }
        expense::where('id', $request->id)->update([
            'expenditure'=>$request->expenditure,
            'date'=>$request->date,
            'amount'=>$request->amount,
            'paye'=>$request->paye,
            'approval'=>$request->approval,
            'remark'=>$request->remark,
            'slug'=>$uniqueSlug,
            'voucher_no'=>$request->voucher_no,
        ]);
        return redirect()->route('cashier.expenses.index')->with('success','Expenses Updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        expense::where('id',decrypt($id))->delete();
        return redirect()->route('cashier.expenses.index')->with('error','Company deleted successfully.');
    }
}
