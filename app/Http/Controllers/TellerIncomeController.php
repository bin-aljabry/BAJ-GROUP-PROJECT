<?php

namespace App\Http\Controllers;

use App\Models\income_category;
use App\Models\teller_income;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\agent_branch;
use App\Models\agent_branch_teller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class TellerIncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $income_id = income_category::orderBy('id','DESC')->get();
        view()->share('income_id',$income_id);
        $teller = agent_branch_teller::orderBy('id','DESC')->get();
        view()->share('teller',$teller);
        $branch = agent_branch::orderBy('id','DESC')->get();
        view()->share('branch',$branch);

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user =Auth::user();
        $income=teller_income::where('userId',$user->name)->orderBy('id','DESC')->get();
        return view('cashier.accounting.income.index',compact('income','user'));
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
            'amount'=>'required|max:255',

            'name'=>'required',
            'category'=>'required',

        ]);
        $baseSlug = Str::slug($request->name);
        $uniqueSlug = $baseSlug;
        $counter = 1;
        while (teller_income::where('slug', $uniqueSlug)->exists()) {
            $uniqueSlug = $baseSlug . '-' . $counter;
            $counter++;
        }
        teller_income::create([
            'name'=>$request->name,
            'userId'=>Auth::user()->name,
            'amount'=>$request->amount,
            'category'=>$request->category,
            'agent_branch_teller_id'=>$request->teller,
            'slug'=>$uniqueSlug,
            'agent_branch_id'=>$request->branch,
            'date'=>Helper::IncomeIDGenerator(new income_category ,'number',3, 'BAJ-EXP-CAT'),

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
           'amount'=>'required|max:255',

            'name'=>'required',
            'category'=>'required',


        ]);
        $baseSlug = Str::slug($request->name);
        $uniqueSlug = $baseSlug;
        $counter = 1;
        while (teller_income::where('slug', $uniqueSlug)->where('id', '!=', $request->id)->exists()) {
            $uniqueSlug = $baseSlug . '-' . $counter;
            $counter++;
        }
        teller_income::where('id', $request->id)->update([
            'name'=>$request->name,
            'userId'=>$request->userId,
            'amount'=>$request->amount,
            'category'=>$request->category,
            'date'=>$request->teller,
            'slug'=>$uniqueSlug,
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
