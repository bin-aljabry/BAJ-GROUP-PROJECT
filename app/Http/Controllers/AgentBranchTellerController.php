<?php

namespace App\Http\Controllers;

use App\Models\agent_branch;
use App\Models\agent_branch_teller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Auth;
use App\Models\company;
use Illuminate\Support\Facades\DB;

use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\company_branches;


class AgentBranchTellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function __construct()
     {
         $roles = Role::all();
        $permissions = Permission::all();
        view()->share('permissions',$permissions);
        view()->share('roles',$roles);
         $branch_id = company_branches::orderBy('id','DESC')->get();
         view()->share('branch_id',$branch_id);
         $company_id = company::orderBy('id','DESC')->get();
         view()->share('company_id',$company_id);
     }


     /**
      * Display a listing of the resource.
      */
     public function tellerlist()
     {



     $manager = Auth::user();

    $data = User::where('company_id', $manager->company_id)
        ->where('branch_id', $manager->branch_id)
        ->where('created_by', $manager->id)
        ->whereHas('roles', function ($q) {
            $q->where('name', 'teller');
        })
        ->get();
         return view('cashier.basic_setting.teller.index',compact('data'));
     }

     /**
      * Show the form for creating a new resource.
      */
     public function tellercreate()
     {
         $company_id = auth()->user()->company_id;

    // Fetch branches za kampuni hii pekee
    $branches = company_branches::where('company_id', $company_id)->get();
         return view('cashier.basic_setting.teller..create', compact('branches'));
     }

     /**
      * Store a newly created resource in storage.
      */
   public function tellerstore(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|max:255',
        'role' => 'required|string'
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'company_id' => Auth::user()->company_id,
        'branch_id' => Auth::user()->branch_id,   // Automatically from logged-in user
        'created_by' => Auth::id(),
    ]);

    $user->assignRole($request->role);

    return redirect()->route('cashier.teller.list')
        ->with('success', 'User created successfully.');
}
     public function show(agent_branch_teller $agent_branch_teller)
     {
         //
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
         return redirect()->route('cashier.teller.index')->with('info','SubCategory updated successfully.');
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
