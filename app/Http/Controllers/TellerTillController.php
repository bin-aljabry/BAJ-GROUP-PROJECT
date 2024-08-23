<?php

namespace App\Http\Controllers;

use App\Models\agent_branch_teller;
use App\Models\teller_till;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class TellerTillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $agent_branch_teller_id =agent_branch_teller::orderBy('id','DESC')->get();
        view()->share('agent_branch_teller_id',$agent_branch_teller_id);

    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user =Auth::user();
        $data=teller_till::where('userId',$user->id)->orderBy('id','DESC')->get();

        return view('cashier.basic_setting.till_code.index',compact('data','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cashier.basic_setting.till_code..create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
           'name'=>'required|max:255',
           'number'=>'required',
           'type'=>'required',

       ]);
       $baseSlug = Str::slug($request->name);
       $uniqueSlug = $baseSlug;
       $counter = 1;
       while (teller_till::where('slug', $uniqueSlug)->exists()) {
           $uniqueSlug = $baseSlug . '-' . $counter;
           $counter++;
       }
       teller_till::create([
           'name'=>$request->name,
           'number'=>$request->number,
           'type'=>$request->type,
           'userId'=>Auth::user()->id,
           'slug'=>$uniqueSlug,
           'agent_branch_teller_id'=>$request->agent_branch_teller_id
       ]);
       return redirect()->route('cashier.till.index')->with('success','subcategory created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(teller_till $teller_till)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
     {
         $data = teller_till::where('id',decrypt($id))->first();
         return view('cashier.basic_setting.till_code.edit',compact('data'));
     }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, agent_branch_teller $agent_branch_teller)
    {
        $request->validate([
            'name'=>'required|max:255',
           'number'=>'required',
           'type'=>'required',


        ]);
        $baseSlug = Str::slug($request->name);
        $uniqueSlug = $baseSlug;
        $counter = 1;

        while (teller_till::where('slug', $uniqueSlug)->where('id', '!=', $request->id)->exists()) {
            $uniqueSlug = $baseSlug . '-' . $counter;
            $counter++;
        }

        teller_till::where('id', $request->id)->update([
           'name'=>$request->name,
           'number'=>$request->number,
           'type'=>$request->type,
           'userId'=>Auth::user()->id,
           'agent_branch_teller_id'=>$request->agent_branch_teller_id
        ]);
        return redirect()->route('cashier.till.index')->with('info','SubCategory updated successfully.');
    }



    public function destroy($id)
    {
       agent_branch_teller::where('id',decrypt($id))->delete();
        return redirect()->route('cashier.till.index')->with('error','SubCategory deleted successfully.');
    }

}
