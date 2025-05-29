<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TellerCapital;
use App\Models\TillCapital;
use App\Models\BankCapital;
use App\Models\branch_capital;
use App\Models\CashIssued;
use App\Models\User;
use App\Models\users;
use App\Models\CashCapital;

class BranchCapitalController extends Controller
{


    public function branchshow($id)
{
    $branchCapital = branch_capital::with('tellerCapitals.cashCapitals', 'tellerCapitals.bankCapitals', 'tellerCapitals.tillCapitals')->findOrFail($id);

    $totalBranchCapital = $branchCapital->tellerCapitals->sum(function ($teller) {
        return $teller->cashCapitals->sum('amount') +
               $teller->bankCapitals->sum('amount') +
               $teller->tillCapitals->sum('amount');
    });

    return view('branch.capital.show', compact('branchCapital', 'totalBranchCapital'));
}
    // === Teller ===
    public function tellerIndex() {
        $tellers = TellerCapital::where('branch_capital_id', auth()->user()->branch_id)->get();
        return view('cashier.basic_setting.capital.teller.index', compact('tellers'));
    }

    public function tellerCreate() {
 $tellers = users::where('role', 'Teller')
                   ->where('branch_id', auth()->user()->branch_id)
                   ->get();

                return view('cashier.basic_setting.capital.teller.create', compact('tellers'));
    }

   public function tellerStore(Request $request) {
    $request->validate([
        'teller_id' => 'required|exists:users,id',
        'amount' => 'required|numeric|min:0',
    ]);

    // Tafuta branch capital iliyopo kwa branch ya user aliye login
    $branchCapital = branch_capital::where('branch_id', auth()->user()->branch_id)->first();

    if (!$branchCapital) {
        return back()->withErrors('Branch Capital haijapatikana. Tafadhali ongeza mtaji wa branch kwanza.');
    }

    TellerCapital::create([
        'branch_capital_id' => $branchCapital->id,
        'teller_id'         => $request->teller_id,
        'manager_id'        => auth()->id(), // anayeingiza data (Manager)
        'amount'            => $request->amount,
        'created_by'        => auth()->id(),
    ]);

        return redirect()->route('cashier.capital.teller.index')->with('success', 'Saved');
    }

    public function tellerEdit($id) {
        $capital = TellerCapital::findOrFail($id);
        $tellers = User::where('role', 'Teller')->where('branch_id', auth()->user()->branch_id)->pluck('name', 'id');
        return view('cashier.basic_setting.capital.teller.edit', compact('capital', 'tellers'));
    }

    public function tellerUpdate(Request $request, $id) {
        $capital = TellerCapital::findOrFail($id);
        $capital->update(['teller_id' => $request->teller_id, 'amount' => $request->amount]);
        return redirect()->route('cashier.capital.teller.index')->with('success', 'Updated');
    }
    public function tellerShow($id) {
        $tellerCapital = TellerCapital::with(['cashCapitals', 'bankCapitals', 'tillCapitals'])->findOrFail($id);

        $summary = [
            'cash' => $tellerCapital->cashCapitals->sum('amount'),
            'bank' => $tellerCapital->bankCapitals->sum('amount'),
            'till' => $tellerCapital->tillCapitals->sum('amount'),
            'total' => 0
        ];
        $summary['total'] = $summary['cash'] + $summary['bank'] + $summary['till'];

        return view('cashier.basic_setting.capital.teller.show', compact('tellerCapital', 'summary'));
    }
    // === Till, Bank, Cash (Repeat Structure) ===


public function tillIndex()
{
    $tills = TillCapital::with('tellerCapital')->get();
    return view('cashier.basic_setting.capital.till.index', compact('tills'));
}

public function tillCreate()
{
    $tellerCapitals = TellerCapital::whereHas('teller', function ($query) {
        $query->where('branch_id', auth()->user()->branch_id);
    })->get();

    return view('cashier.basic_setting.capital.till.create', compact('tellerCapitals'));
}

public function tillStore(Request $request)
{
    $request->validate([
        'teller_capital_id' => 'required|exists:teller_capitals,id',
        'till_name' => 'required|string|max:255',
        'amount' => 'required|numeric|min:0',
    ]);

    TillCapital::create($request->only('teller_capital_id', 'till_name', 'amount'));

    return redirect()->route('cashier.capital.till.index')->with('success', 'Till Capital Saved');
}

public function tillEdit($id)
{
    $till = TillCapital::findOrFail($id);
    $tellerCapitals = TellerCapital::whereHas('teller', function ($query) {
        $query->where('branch_id', auth()->user()->branch_id);
    })->get();

    return view('cashier.basic_setting.capital.till.edit', compact('till', 'tellerCapitals'));
}

public function tillUpdate(Request $request, $id)
{
    $request->validate([
        'teller_capital_id' => 'required|exists:teller_capitals,id',
        'till_name' => 'required|string|max:255',
        'amount' => 'required|numeric|min:0',
    ]);

    $till = TillCapital::findOrFail($id);
    $till->update($request->only('teller_capital_id', 'till_name', 'amount'));

    return redirect()->route('cashier.capital.till.index')->with('success', 'Till Capital Updated');
}

public function tillShow($id)
{
    $till = TillCapital::with('tellerCapital')->findOrFail($id);
    return view('cashier.basic_setting.capital.till.show', compact('till'));
}


 public function bankIndex()
    {
        // Get all bank capitals related to teller capitals in the current user's branch
        $bankCapitals = BankCapital::whereHas('tellerCapital.branchCapital', function ($query) {
            $query->where('branch_id', auth()->user()->branch_id);
        })->with('tellerCapital')->get();

        return view('cashier.basic_setting.capital.bank.index', compact('bankCapitals'));
    }

    // Show form to create bank capital
    public function bankCreate()
    {
        // Get teller capitals related to current branch for selection
        $tellerCapitals = TellerCapital::whereHas('branchCapital', function ($query) {
            $query->where('branch_id', auth()->user()->branch_id);
        })->get();

        return view('cashier.basic_setting.capital.bank.create', compact('tellerCapitals'));
    }

    // Store new bank capital
    public function bankStore(Request $request)
    {
        $request->validate([
            'teller_capital_id' => 'required|exists:teller_capitals,id',
            'bank_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        BankCapital::create([
            'teller_capital_id' => $request->teller_capital_id,
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'amount' => $request->amount,
        ]);

        return redirect()->route('cashier.capital.bank.index')->with('success', 'Bank capital added successfully.');
    }

    // Edit bank capital form
    public function bankEdit($id)
    {
        $bankCapital = BankCapital::findOrFail($id);

        // Get teller capitals for dropdown
        $tellerCapitals = TellerCapital::whereHas('branchCapital', function ($query) {
            $query->where('branch_id', auth()->user()->branch_id);
        })->get();

        return view('cashier.basic_setting.capital.bank.edit', compact('bankCapital', 'tellerCapitals'));
    }

    // Update bank capital
    public function bankUpdate(Request $request, $id)
    {
        $bankCapital = BankCapital::findOrFail($id);

        $request->validate([
            'teller_capital_id' => 'required|exists:teller_capitals,id',
            'bank_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        $bankCapital->update([
            'teller_capital_id' => $request->teller_capital_id,
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'amount' => $request->amount,
        ]);

        return redirect()->route('cashier.capital.bank.index')->with('success', 'Bank capital updated successfully.');
    }

    // Show details of one bank capital
    public function bankShow($id)
    {
        $bankCapital = BankCapital::with('tellerCapital')->findOrFail($id);

        return view('cashier.basic_setting.capital.bank.show', compact('bankCapital'));
    }
   public function cashIndex()
{
    $cashCapitals = CashCapital::with('tellerCapital.teller')->whereHas('tellerCapital', function ($q) {
        $q->where('branch_capital_id', auth()->user()->branch_id);
    })->get();

    return view('cashier.basic_setting.capital.cash.index', compact('cashCapitals'));
}
public function bankDestroy($id)
{
    $bankCapital = BankCapital::findOrFail($id);
    $bankCapital->delete();

    return redirect()->route('cashier.capital.bank.index')->with('success', 'Bank capital deleted successfully.');
}

public function cashCreate()
{
    $tellerCapitals = TellerCapital::with('teller')
        ->where('branch_capital_id', auth()->user()->branch_id)
        ->get();

    return view('cashier.basic_setting.capital.cash.create', compact('tellerCapitals'));
}

public function cashStore(Request $request)
{
    $request->validate([
        'teller_capital_id' => 'required|exists:teller_capitals,id',
        'amount' => 'required|numeric|min:0',
    ]);

    CashCapital::create([
        'teller_capital_id' => $request->teller_capital_id,
        'amount' => $request->amount,
    ]);

    return redirect()->route('cashier.capital.cash.index')->with('success', 'Cash Capital Saved Successfully.');
}

public function cashEdit($id)
{
    $cashCapital = CashCapital::findOrFail($id);
    $tellerCapitals = TellerCapital::where('branch_capital_id', auth()->user()->branch_id)->get();

    return view('cashier.basic_setting.capital.cash.edit', compact('cashCapital', 'tellerCapitals'));
}

public function cashUpdate(Request $request, $id)
{
    $cashCapital = CashCapital::findOrFail($id);

    $request->validate([
        'teller_capital_id' => 'required|exists:teller_capitals,id',
        'amount' => 'required|numeric|min:0',
    ]);

    $cashCapital->update([
        'teller_capital_id' => $request->teller_capital_id,
        'amount' => $request->amount,
    ]);

    return redirect()->route('cashier.capital.cash.index')->with('success', 'Cash Capital Updated.');
}

public function cashShow($id)
{
    $cashCapital = CashCapital::with('tellerCapital.teller')->findOrFail($id);

    return view('cashier.basic_setting.capital.cash.show', compact('cashCapital'));
}
}
