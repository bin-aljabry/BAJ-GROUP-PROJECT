<?php

namespace App\Http\Controllers;

use App\Models\agent_branch;
use App\Models\user;

use App\Models\agent_branch_teller;
use App\Models\company;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class AgentBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $company = company::orderBy('id','DESC')->get();
        view()->share('company',$company);
    }

    public function index()
    {


        $user =Auth::user();
        $data=agent_branch::where('userId',$user->id)->orderBy('id','DESC')->get();


        return view('cashier.basic_setting.branch.index',compact('data','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('cashier.basic_setting.branch.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required|max:255',
            'location'=>'required',



        ]);
        $baseSlug = Str::slug($request->name);
        $uniqueSlug = $baseSlug;
        $counter = 1;
        while (agent_branch::where('slug', $uniqueSlug)->exists()) {
            $uniqueSlug = $baseSlug . '-' . $counter;
            $counter++;
        }
        agent_branch::create([
            'name'=>$request->name,
            'number'=>Helper::BranchIDGenerator(new agent_branch ,'userId',4, 'BAJ-BRN'),
            'location'=>$request->location,
            'slug'=>$uniqueSlug,
            'company_id'=>$request->company_id,
            'userId'=>Auth::user()->id,

        ]);
        return redirect()->route('cashier.branch.index')->with('success','subcategory created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(agent_branch $agent_branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $data = agent_branch::where('id',decrypt($id))->first();
        return view('cashier.basic_setting.branch.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $request->validate([
            'name'=>'required|max:255',
            'location'=>'required',
            'number'=>'required',
        ]);
        $baseSlug = Str::slug($request->name);
        $uniqueSlug = $baseSlug;
        $counter = 1;

        while (agent_branch::where('slug', $uniqueSlug)->where('id', '!=', $request->id)->exists()) {
            $uniqueSlug = $baseSlug . '-' . $counter;
            $counter++;
        }
        agent_branch::where('id', $request->id)->update([
            'name' => $request->name,
            'slug' => $uniqueSlug,
            'location' =>$request->location,
            'company_id'=>$request->company_id,
            'number' =>$request->number,
            'userId'=>$request->userId,

        ]);
        return redirect()->route('cashier.branch.index')->with('info','Branch updated successfully.');
     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        agent_branch::where('id',decrypt($id))->delete();
        return redirect()->route('cashier.branch.index')->with('error','Company deleted successfully.');
    }
}
