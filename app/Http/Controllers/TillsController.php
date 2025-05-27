<?php

namespace App\Http\Controllers;

use App\Models\tills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\company;
use App\Models\User;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\company_branches;
use Illuminate\Support\Facades\Auth;
class TillsController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
    
     
        // Default query
        $query = Tills::query();
    
        // Kama ni company admin
        if ($user->role === 'admin') {
            $query->where('company_id', $user->company_id);
        }
    
        // Kama ni branch manager
        elseif ($user->role === 'Manager') {
            $query->where('branch_id', $user->branch_id);
        }
    
        // else => Super admin or others: see all
    
        $tills = $query->latest()->paginate(10);
    
        return view('teller.basic_setting.till_code.index', compact('tills'));
    }
    


    public function create()
{
    $cashiers = User::whereHas('role', function ($q) {
        $q->where('name', 'Cashier')->orWhere('name', 'Teller');
    })->get();

    return view('till_code.create', compact('cashiers'));
}

public function edit(tills $till)
{
    $cashiers = User::whereHas('role', function ($q) {
        $q->where('name', 'Cashier')->orWhere('name', 'Teller');
    })->get();

    return view('till_code.edit', compact('till', 'cashiers'));
}
    // Show form to create

    // Store till
    public function store(Request $request)
    {
        $request->validate([

            'till_phone_no' => 'required|unique:tills',
            'till_name' => 'required',
            'network_provider' => 'required',
            'till_code' => 'required',
        ]);

        tills::create([
            'till_name' => $request->till_name,
            'till_phone_no' => $request->till_phone_no,
            'network_provider' => $request->network_provider,
            'till_code' => $request->till_code,
            'company_id' => Auth::user()->company_id,
            'branch_id' => Auth::user()->branch_id,   // Automatically from logged-in user
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('till_code.index')->with('success', 'Till created successfully.');
    }

    // Show form to edit


    // Update till
    public function update(Request $request, tills $till)
    {
        $request->validate([
            'slug' => 'required|unique:tills,slug,' . $till->id,
            'till_phone_no' => 'required|unique:tills,till_phone_no,' . $till->id,
            'till_name' => 'required',
            'network_provider' => 'required',
            'till_code' => 'required',
        ]);

        $till->update($request->all());

        return redirect()->route('till_code.index')->with('success', 'Till updated successfully.');
    }

    // Delete till
    public function destroy(tills $till)
    {
        $till->delete();
        return redirect()->route('till_code.index')->with('success', 'Till deleted successfully.');
    }
}
