<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;
use App\Models\user;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


use App\Models\Payment;


class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
    {
        // View all companies
        $companies = company::withCount('users')->get();
        return view('superadmin.company.index', compact('companies'));
    }

    public function viewAdmins()
    {
        // View all company admins (role: admin)
        $Super_Admin = User::role('Super Admin')->with('company')->get();
        return view('superadmin.admins.index', compact('Super_Admin'));
    }

    public function updatePaymentStatus($company_id)
    {
        $company = Company::findOrFail($company_id);
        $company->payment_status = $company->payment_status === 'active' ? 'inactive' : 'active';
        $company->save();

        return back()->with('success', 'Payment status updated.');
    }

    public function setUserLimit(Request $request, $company_id)
    {
        $request->validate([
            'user_limit' => 'required|integer|min:1'
        ]);

        $company = Company::findOrFail($company_id);
        $company->user_limit = $request->user_limit;
        $company->save();

        return back()->with('success', 'User limit updated.');
    }

    public function viewAdminDetails( $id)
{
    $user = User::with('role', 'company')->findOrFail($id);
    return view('superadmin.users.show', compact('user'));
    }


    public function notifications() {
        $notifications = Notification::latest()->get();
        return view('superadmin.notifications', compact('notifications'));
    }

    public function payments() {
        $payments = Payment::with('company')->latest()->get();
        return view('superadmin.payments', compact('payments'));
    }

    public function packages() {
        $packages = Package::all();
        return view('superadmin.packages', compact('packages'));
    }

    public function reportCustomers() {
        $companies = Company::withCount('users')->get();
        return view('superadmin.reports.customers', compact('companies'));
    }

    public function reportPayments() {
        $payments = Payment::with('company')->get();
        return view('superadmin.reports.payments', compact('payments'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
