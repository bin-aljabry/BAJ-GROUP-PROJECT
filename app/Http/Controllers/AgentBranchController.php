<?php

namespace App\Http\Controllers;

use App\Models\agent_branch;
use App\Models\agent_branch_teller;
use App\Models\company;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

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
        $data = agent_branch::orderBy('id','DESC')->get();
        return view('cashier.basic_setting.branch.index',compact('data'));
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
            'number'=>'required',


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
            'number'=>$request->number,
            'location'=>$request->location,
            'slug'=>$uniqueSlug,
            'company_id'=>$request->company_id
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
            'number' =>$request->number,
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
