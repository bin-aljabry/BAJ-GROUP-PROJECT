<?php

namespace App\Http\Controllers;

use App\Models\till;
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

 // Orodhesha tills kulingana na role ya user aliyelogin
    public function tillList()
    {
        $user = Auth::user();

        $query = Till::with('teller'); // eager load teller user

        // Case insensitive role checks
        $role = strtolower($user->role);

        if ($role === 'admin') {
            $query->where('company_id', $user->company_id);
        } elseif ($role === 'manager') {
            $query->where('branch_id', $user->branch_id);
        }
        // else super admin or others => all tills

        $tills = $query->latest()->paginate(10);

        return view('teller.basic_setting.till_code.index', compact('tills'));
    }

    // Onyesha form ya kuunda till
    public function create()
    {
$cashiers = DB::table('users')
    ->join('teller_capitals', 'users.id', '=', 'teller_capitals.teller_id') // INNER JOIN
    ->leftJoin('tills', 'users.id', '=', 'tills.teller_id') // OUTER JOIN
    ->whereHas('roles', function ($query) {
        $query->where('name', 'Teller');
    })
    ->select(
        'users.name as teller_name',
        'teller_capitals.amount as capital',
        'tills.till_code as code'
    )
    ->get();
        return view('teller.basic_setting.till_code.create', compact('cashiers'));
    }

    // Hifadhi till mpya
    public function store(Request $request)
    {
        $manager = Auth::user();

        $request->validate([
            'till_phone_no' => 'required|unique:tills',
            'till_name' => 'required|string|max:255',
            'till_type' => 'required|in:standard,payment_line',
            'network_provider' => 'required|string|max:255',
            'till_code' => 'required|string|max:100',
            'user_id' => [
                'required',
                'exists:users,id',
                // Validate that selected user is Teller in same branch as manager
                function ($attribute, $value, $fail) use ($manager) {
                    $user = User::find($value);
                    if (!$user || $user->branch_id !== $manager->branch_id || !$user->hasRole('Teller')) {
                        $fail('Selected user must be a Teller in your branch.');
                    }
                },
            ],
        ]);

        try {
            Till::create([
               'till_name'         => $request->till_name,
    'till_phone_no'     => $request->till_phone_no,
    'network_provider'  => $request->network_provider,
    'till_code'         => $request->till_code,
    'company_id'        => $manager->company_id,
    'branch_id'         => $manager->branch_id,
    'teller_id'         => $request->user_id, // Hii inachukuliwa kutoka kwenye dropdown ya tellers
    'till_type'         => $request->till_type,
    'created_by'        => Auth::id(),

            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error creating till: ' . $e->getMessage()])->withInput();
        }

        return redirect()->route('cashier.till.list')->with('success', 'Till created successfully.');
    }

    // Onyesha form ya kuhariri till
    public function edit($id)
    {
        $till = Till::findOrFail($id);

        $manager = Auth::user();

        // Get tellers in the same branch as manager
        $cashiers = User::where('branch_id', $manager->branch_id)
            ->whereHas('roles', fn($q) => $q->where('name', 'Teller'))
            ->get();

        return view('teller.basic_setting.till_code.edit', compact('till', 'cashiers'));
    }

    // Update till
    public function update(Request $request, $id)
    {
        $manager = Auth::user();

        $request->validate([
            'till_name' => 'required|string|max:255',
            'till_phone_no' => 'required|unique:tills,till_phone_no,' . $id,
            'network_provider' => 'required|string|max:255',
            'till_code' => 'required|string|max:100',
            'user_id' => [
                'required',
                'exists:users,id',
                function ($attribute, $value, $fail) use ($manager) {
                    $user = User::find($value);
                    if (!$user || $user->branch_id !== $manager->branch_id || !$user->hasRole('Teller')) {
                        $fail('Selected user must be a Teller in your branch.');
                    }
                },
            ],
        ]);

        $till = Till::findOrFail($id);

        try {
            $till->update([
                'till_name' => $request->till_name,
                'till_phone_no' => $request->till_phone_no,
                'network_provider' => $request->network_provider,
                'till_code' => $request->till_code,
                'teller_id' => $request->user_id,
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error updating till: ' . $e->getMessage()])->withInput();
        }

        return redirect()->route('cashier.till.list')->with('success', 'Till updated successfully.');
    }

    // Futa till
    public function destroy($id)
    {
        $till = Till::findOrFail($id);

        try {
            $till->delete();
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error deleting till: ' . $e->getMessage()]);
        }

        return redirect()->route('cashier.till.list')->with('success', 'Till deleted successfully.');
    }
}
