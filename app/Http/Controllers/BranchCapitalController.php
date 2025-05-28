<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TellerCapital;
use App\Models\TillCapital;
use App\Models\BankCapital;
use App\Models\CashIssued;
use App\Models\User;

class BranchCapitalController extends Controller
{
    // === Teller ===
    public function tellerIndex() {
        $capitals = TellerCapital::where('branch_id', auth()->user()->branch_id)->get();
        return view('cashier.basic_setting.capital.teller.index', compact('capitals'));
    }

    public function tellerCreate() {
        $tellers = User::where('role', 'Teller')->where('branch_id', auth()->user()->branch_id)->pluck('name', 'id');
        return view('cashier.basic_setting.capital.teller.create', compact('tellers'));
    }

    public function tellerStore(Request $request) {
        $request->validate(['teller_id' => 'required', 'amount' => 'required|numeric|min:0']);
        TellerCapital::create([
            'branch_id' => auth()->user()->branch_id,
            'teller_id' => $request->teller_id,
            'amount' => $request->amount,
            'created_by' => auth()->id(),
        ]);
        return redirect()->route('cashier.basic_setting.capital.teller.index')->with('success', 'Saved');
    }

    public function tellerEdit($id) {
        $capital = TellerCapital::findOrFail($id);
        $tellers = User::where('role', 'Teller')->where('branch_id', auth()->user()->branch_id)->pluck('name', 'id');
        return view('cashier.basic_setting.capital.tellerteller.edit', compact('capital', 'tellers'));
    }

    public function tellerUpdate(Request $request, $id) {
        $capital = TellerCapital::findOrFail($id);
        $capital->update(['teller_id' => $request->teller_id, 'amount' => $request->amount]);
        return redirect()->route('cashier.basic_setting.capital.teller.index')->with('success', 'Updated');
    }

    // === Till, Bank, Cash (Repeat Structure) ===
    public function tillIndex() { /* like tellerIndex */ }
    public function tillCreate() { /* like tellerCreate */ }
    public function tillStore(Request $request) { /* like tellerStore */ }
    public function tillEdit($id) { /* like tellerEdit */ }
    public function tillUpdate(Request $request, $id) { /* like tellerUpdate */ }

    public function bankIndex() { /* ... */ }
    public function bankCreate() { /* ... */ }
    public function bankStore(Request $request) { /* ... */ }
    public function bankEdit($id) { /* ... */ }
    public function bankUpdate(Request $request, $id) { /* ... */ }

    public function cashIndex() { /* ... */ }
    public function cashCreate() { /* ... */ }
    public function cashStore(Request $request) { /* ... */ }
    public function cashEdit($id) { /* ... */ }
    public function cashUpdate(Request $request, $id) { /* ... */ }
}
