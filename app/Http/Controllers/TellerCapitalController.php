<?php

namespace App\Http\Controllers;

use App\Models\teller_capital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Helpers\Helper;
use App\Models\agent_branch_teller;
use App\Models\teller_cash;

class TellerCapitalController extends Controller
{

    public function __construct()
    {
        $teller = agent_branch_teller::orderBy('id','DESC')->get();
        view()->share('teller',$teller);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = teller_capital::orderBy('id','DESC')->get();
        return view('cashier.basic_setting.capital.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('cashier.basic_setting.capital.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'amount'=>'required|max:255',

        ]);
        $baseSlug = Str::slug($request->name);
        $uniqueSlug = $baseSlug;
        $counter = 1;
        while (teller_capital::where('slug', $uniqueSlug)->exists()) {
            $uniqueSlug = $baseSlug . '-' . $counter;
            $counter++;
        }
        teller_capital::create([
            'amount'=>$request->amount,
            'category'=>Helper::TellerCapitalIDGenerator(new teller_capital ,'userId',10,  'CAP'),
            'slug'=>$uniqueSlug,
            'agent_branch_teller_id'=>$request->agent_branch_teller_id,
            'userId'=>Auth::user()->id,

        ]);
        return redirect()->route('cashier.capital.index')->with('success','Company created successfully.');

    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($company)
    {

        $data = teller_capital::where('id',decrypt($company))->first();
        return view('cashier.basic_setting.capital.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //

        $request->validate([
           'amount'=>'required|max:255',

           'category'=>'required',
           'userId'=>'required',

       ]);
       $baseSlug = Str::slug($request->name);
       $uniqueSlug = $baseSlug;
       $counter = 1;

       while (teller_capital::where('slug', $uniqueSlug)->where('id', '!=', $request->id)->exists()) {
           $uniqueSlug = $baseSlug . '-' . $counter;
           $counter++;
       }

       teller_capital::where('id', $request->id)->update([
           'amount' => $request->name,
           'slug' => $uniqueSlug,
           'category'=>$request->number,
           'userId'=>$request->brand,

          'number'=>$request->number,

       ]);
       return redirect()->route('cashier.capital.index')->with('info','Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        teller_capital::where('id',decrypt($id))->delete();
        return redirect()->route('cashier.capital.index')->with('error','Company deleted successfully.');
    }
}
