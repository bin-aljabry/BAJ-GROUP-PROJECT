<?php

namespace App\Http\Controllers;

use App\Models\agent_branch;
use App\Models\agent_branch_teller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AgentBranchTellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */



     public function __construct()
     {
         $branch_id = agent_branch::orderBy('id','DESC')->get();
         view()->share('branch_id',$branch_id);
         $user_id = User::orderBy('id','DESC')->get();
         view()->share('user_id',$user_id);
     }


     /**
      * Display a listing of the resource.
      */
     public function index()
     {
         $data = agent_branch_teller::orderBy('id','DESC')->get();
         return view('cashier.basic_setting.teller.index',compact('data'));
     }

     /**
      * Show the form for creating a new resource.
      */
     public function create()
     {
         return view('cashier.basic_setting.teller..create');
     }

     /**
      * Store a newly created resource in storage.
      */
     public function store(Request $request)
     {
        $request->validate([
            'name'=>'required|max:255',
            'number'=>'required',
            'email'=>'required',
            'phone'=>'required|max:255',
            'address'=>'required',

        ]);
        $baseSlug = Str::slug($request->name);
        $uniqueSlug = $baseSlug;
        $counter = 1;
        while (agent_branch_teller::where('slug', $uniqueSlug)->exists()) {
            $uniqueSlug = $baseSlug . '-' . $counter;
            $counter++;
        }
        agent_branch_teller::create([
            'name'=>$request->name,
            'number'=>$request->number,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'slug'=>$uniqueSlug,
            'user_id'=>$request->user_id,
            'agent_branch_id'=>$request->agent_branch_id
        ]);
        return redirect()->route('cashier.teller.index')->with('success','subcategory created successfully.');

     }

     /**
      * Show the form for editing the specified resource.
      */
     public function edit($agent_branch_teller)
     {
         $data = agent_branch_teller::where('id',decrypt($agent_branch_teller))->first();
         return view('cashier.basic_setting.teller.edit',compact('data'));
     }

     /**
      * Update the specified resource in storage.
      */
     public function update(Request $request, agent_branch_teller $agent_branch_teller)
     {
         $request->validate([
             'name'=>'required|max:255',
            'number'=>'required',
            'email'=>'required',
            'phone'=>'required|max:255',
            'address'=>'required',


         ]);
         $baseSlug = Str::slug($request->name);
         $uniqueSlug = $baseSlug;
         $counter = 1;

         while (agent_branch_teller::where('slug', $uniqueSlug)->where('id', '!=', $request->id)->exists()) {
             $uniqueSlug = $baseSlug . '-' . $counter;
             $counter++;
         }

         agent_branch_teller::where('id', $request->id)->update([
            'name'=>$request->name,
            'number'=>$request->number,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'slug'=>$uniqueSlug,
            'user_id'=>$request->user_id,
            'agent_branch_id'=>$request->agent_branch_id
         ]);
         return redirect()->route('cashier.branch.index')->with('info','SubCategory updated successfully.');
     }

     /**
      * Remove the specified resource from storage.
      */
     public function destroy($id)
     {
        agent_branch_teller::where('id',decrypt($id))->delete();
         return redirect()->route('cashier.teller.index')->with('error','SubCategory deleted successfully.');
     }




}
