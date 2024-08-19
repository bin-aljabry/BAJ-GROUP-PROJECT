<?php

namespace App\Http\Controllers;

use App\Models\agent_branch_teller;
use App\Models\teller_till;
use App\Models\till_transaction;
use App\Models\till_withdraw_transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TillWithdrawTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $teller_till = teller_till::orderBy('id','DESC')->get();
        view()->share('teller_till',$teller_till);
        $agent_branch_teller = agent_branch_teller::orderBy('id','DESC')->get();
        view()->share('agent_branch_teller',$agent_branch_teller);
    }

    public function index()
    {
        $data = till_transaction::orderBy('id','DESC')->get();
        $data = till_transaction::where('type', 'WITHDRAW')->get();
        return view('cashier.transaction.withdraw.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('cashier.transaction.withdraw.create');
    }


    public function store(Request $request)
    {
        //
        $request->validate([
            'teller_name'=>'required',
            'customer_name'=>'required',
            'phone'=>'required',
            'amount'=>'required',
            'transaction_id'=>'required',
            'till_number'=>'required',
            'till_type'=>'required',
            'type'=>'required',

        ]);
        $baseSlug = Str::slug($request->name);
        $uniqueSlug = $baseSlug;
        $counter = 1;
        while (till_transaction::where('slug', $uniqueSlug)->exists()) {
            $uniqueSlug = $baseSlug . '-' . $counter;
            $counter++;
        }
        till_transaction::create([

            'teller_name'=>$request->teller_name,
            'customer_name'=>$request->customer_name,
            'phone'=>$request->phone,
            'slug'=>$uniqueSlug,
            'amount'=>$request->amount,
            'transaction_id'=>$request->transaction_id,
            'till_number'=>$request->till_number,
            'till_type'=>$request->till_type,
            'type'=>$request->type,
            'teller_till_id'=>$request->teller_till_id,
            'agent_branch_teller_id'=>$request->agent_branch_teller_id,

        ]);
        return redirect()->route('cashier.withdraw.index')->with('success','Withdraw created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(till_transaction $till_transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $data = till_transaction::where('id',decrypt($id))->first();
        return view('cashier.transaction.withdraw.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $request->validate([
            'teller_name'=>'required',
            'customer_name'=>'required',
            'phone'=>'required',
            'amount'=>'required',
            'transaction_id'=>'required',
            'till_number'=>'required',
            'type'=>'required',
        ]);
        $baseSlug = Str::slug($request->name);
        $uniqueSlug = $baseSlug;
        $counter = 1;

        while (till_transaction::where('slug', $uniqueSlug)->where('id', '!=', $request->id)->exists()) {
            $uniqueSlug = $baseSlug . '-' . $counter;
            $counter++;
        }
        till_transaction::where('id', $request->id)->update([
            'teller_name'=>$request->teller_name,
            'customer_name'=>$request->customer_name,
            'phone'=>$request->phone,
            'slug'=>$uniqueSlug,
            'amount'=>$request->amount,
            'transaction_id'=>$request->transaction_id,
            'till_number'=>$request->till_number,
            'till_type'=>$request->till_type,
            'type'=>$request->type,
            'teller_till_id'=>$request->teller_till_id,
            'agent_branch_id'=>$request->agent_branch_id,

        ]);
        return redirect()->route('cashier.withdraw.index')->with('info','Withdraw updated successfully.');
     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        till_transaction::where('id',decrypt($id))->delete();
        return redirect()->route('cashier.withdraw.index')->with('error','Withdraw deleted successfully.');
    }
}
