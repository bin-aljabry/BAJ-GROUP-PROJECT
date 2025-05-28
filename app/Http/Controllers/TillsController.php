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

    public function tillList()
    {
        $user = Auth::user();
    
     
        // Default query
        $query = tills::query();
    
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
    $manager = auth()->user();

    $cashiers = User::where('branch_id', $manager->branch_id)
        ->whereHas('roles', function ($q) {
            $q->whereIn('name', ['Teller']);
        })->get();


    return view('teller.basic_setting.till_code.create' , compact('cashiers'));
}

    // Show form to create

    // Store till
    public function store(Request $request)
    {
        $request->validate([
            'till_phone_no' => 'required|unique:tills',
            'till_name' => 'required',
            'till_type' => 'required',
            'network_provider' => 'required',
            'till_code' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);
    
        $manager = auth()->user();
    
        Tills::create([
            'till_name' => $request->till_name,
            'till_phone_no' => $request->till_phone_no,
            'network_provider' => $request->network_provider,
            'till_code' => $request->till_code,
            'company_id' => $manager->company_id,
            'branch_id' => $manager->branch_id,
            'user_id' => $request->user_id,
            'till_type' => $request->till_type
        ]);
    
     
        return redirect()->route('cashier.till.list')->with('success', 'Till created successfully.');
    }

    // Show form to edit


    // Update till
// Show Edit Form
public function edit($id)
{
    $till = Tills::findOrFail($id);

    // Get tellers in the same branch
    $cashiers = User::where('branch_id', auth()->user()->branch_id)
        ->whereHas('roles', fn($q) => $q->whereIn('name', ['Teller']))
        ->get();

    return view('teller.basic_setting.till_code.edit', compact('till', 'cashiers'));
}

// Update Till
public function update(Request $request, $id)
{
    $request->validate([
        'till_name' => 'required',
        'till_phone_no' => 'required|unique:tills,till_phone_no,' . $id,
        'network_provider' => 'required',
        'till_code' => 'required',
        'user_id' => 'required|exists:users,id',
    ]);

    $till = Tills::findOrFail($id);
    $till->update([
        'till_name' => $request->till_name,
        'till_phone_no' => $request->till_phone_no,
        'network_provider' => $request->network_provider,
        'till_code' => $request->till_code,
        'user_id' => $request->user_id,
    ]);

    return redirect()->route('cashier.till.list')->with('success', 'Till updated successfully.');
}

// Delete Till
public function destroy($id)
{
    $till = Tills::findOrFail($id);
    $till->delete();

    return redirect()->route('cashier.till.list')->with('success', 'Till deleted successfully.');
}
}