<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use Illuminate\Http\Request;

use App\Models\tills;
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
class BankAccountController extends Controller
{
    //
 public function index()
    {
        $accounts = BankAccount::with(['company', 'branch', 'user', 'teller'])->latest()->get();
        return view('teller.basic_setting.bank-accounts.index', compact('accounts'));
    }

    public function create()
    {

$manager = auth()->user();

    $tellers = User::where('branch_id', $manager->branch_id)
        ->whereHas('roles', function ($q) {
            $q->whereIn('name', ['Teller']);
        })->get();

        return view('teller.basic_setting.bank-accounts.create', compact('tellers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'account_name' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'teller_name' => 'nullable|exists:users,id',
        ]);

        BankAccount::create([
            'company_id'     => auth()->user()->company_id,
            'branch_id'      => auth()->user()->branch_id,
            'user_id'        => auth()->id(),
            'teller_name'    => $request->teller_name,
            'account_name'   => $request->account_name,
            'bank_name'      => $request->bank_name,
            'account_number' => $request->account_number,
            'created_by'     => auth()->id(),
        ]);

        return redirect()->route('cashier.bank-accounts.index')->with('success', 'Bank account created successfully.');
    }

    public function edit($id)
{
    $account = BankAccount::findOrFail($id);
    $tellers = User::where('role', 'Teller')
               ->where('branch_id', auth()->user()->branch_id)
               ->pluck('name', 'id');
               
    return view('teller.basic_setting.bank-accounts.edit', compact('account', 'tellers'));

}
public function update(Request $request, $id)
{
    $request->validate([
        'account_name' => 'required|string|max:255',
        'bank_name' => 'required|string|max:255',
        'account_number' => 'required|string|max:100',
        'teller_name' => 'nullable|exists:users,id',
    ]);

    $account = BankAccount::findOrFail($id);
    $account->update([
        'account_name' => $request->account_name,
        'bank_name' => $request->bank_name,
        'account_number' => $request->account_number,
        'teller_name' => $request->teller_name,
    ]);

    return redirect()->route('cashier.bank-accounts.index')->with('success', 'Bank account updated successfully.');
}

public function destroy($id)
{
    $account = BankAccount::findOrFail($id);
    $account->delete();

    return redirect()->route('cashier.bank-accounts.index')->with('success', 'Bank account deleted successfully.');
}


}
