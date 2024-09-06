<?php

namespace App\Http\Controllers;

use App\Models\agent_branch_teller;
use App\Models\teller_till;
use App\Models\till_float;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\till_transaction;

class TillFloatController extends Controller
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
        $till_transaction = till_transaction::orderBy('id','DESC')->get();
        view()->share('till_transaction',$till_transaction);
    }

    public function index()
    {
        $data = till_float::orderBy('id','DESC')->get();
        // $data = till_float::where('type', 'DEPOSIT')->get();
        return view('cashier.transaction.float.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('cashier.transaction.float.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'date'=>'required',
            'amount'=>'required',
            'till_number'=>'required',
            'network_type'=>'required',

        ]);
        $baseSlug = Str::slug($request->name);
        $uniqueSlug = $baseSlug;
        $counter = 1;
        while (till_float::where('slug', $uniqueSlug)->exists()) {
            $uniqueSlug = $baseSlug . '-' . $counter;
            $counter++;
        }
        till_float::create([

            'date'=>$request->date,
            'slug'=>$uniqueSlug,
            'amount'=>$request->amount,
            'transaction_id'=>Helper::TransactionFloatIDGenerator(new till_float ,'user_id',15, 'TRA-DEP'),
            'till_number'=>$request->till_number,
            'network_type'=>$request->network_type,
            'userId'=>Auth::user()->id,

            'teller_till_id'=>$request->teller_till_id,
            'agent_branch_teller_id'=>$request->agent_branch_teller_id,
             'till_transaction_id'=>$request->till_transaction_id,

        ]);
        return redirect()->route('cashier.float.index')->with('success','deposit created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(till_float $till_float)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $data = till_float::where('id',decrypt($id))->first();
        return view('cashier.transaction.float.edit',compact('data'));
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

        while (till_float::where('slug', $uniqueSlug)->where('id', '!=', $request->id)->exists()) {
            $uniqueSlug = $baseSlug . '-' . $counter;
            $counter++;
        }
        till_float::where('id', $request->id)->update([
            'teller_name'=>$request->teller_name,
            'customer_name'=>$request->customer_name,
            'phone'=>$request->phone,
            'slug'=>$uniqueSlug,
            'amount'=>$request->amount,
            'transaction_id'=>$request->transaction_id,
            'till_number'=>$request->till_number,
            'userId'=>Auth::user()->id,
            'type'=>$request->type,
            'teller_till_id'=>$request->teller_till_id,
            'agent_branch_id'=>$request->agent_branch_id,


        ]);
        return redirect()->route('cashier.float.index')->with('info','deposit updated successfully.');
     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        till_float::where('id',decrypt($id))->delete();
        return redirect()->route('cashier.float.index')->with('error','deposit deleted successfully.');
    }
}
