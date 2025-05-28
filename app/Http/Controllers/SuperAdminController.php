<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;
use App\Models\user;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;
use Carbon\Carbon;
use App\Models\Package;
use App\Models\Notification;


class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

      public function dashboard()
    {
        // Total number of registered companies
        $totalCompanies = Company::count();

        // Number of companies that have paid
        $paidCompanies = Payment::where('status', 'paid')->distinct('company_id')->count();

        // Number of companies that have not paid
        $paidCompanyIds = Payment::where('status', 'paid')->pluck('company_id')->unique();
        $unpaidCompanies = Company::whereNotIn('id', $paidCompanyIds)->count();

        // Number of Company Admins
        $adminCount = User::where('role', 'admin')->count();

        // Customer feedback counts
        $feedbackPositive = Notification::where('type', 'positive')->count();
        $feedbackSuggestions = Notification::where('type', 'suggestion')->count();
        $feedbackChallenges = Notification::where('type', 'challenge')->count();

        // Monthly company registrations for the current year
        $monthlyRegistrations = Company::select(
                DB::raw("MONTH(created_at) as month"),
                DB::raw("COUNT(*) as count")
            )
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy(DB::raw("MONTH(created_at)"))
            ->orderBy(DB::raw("MONTH(created_at)"))
            ->get();

        return view('superadmin.dashboard', compact(
            'totalCompanies',
            'paidCompanies',
            'unpaidCompanies',
            'adminCount',
            'feedbackPositive',
            'feedbackSuggestions',
            'feedbackChallenges',
            'monthlyRegistrations'
        ));
    }

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
        return view('superadmin.company.index', compact('Super_Admin'));
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
         $payments = Payment::with(['company', 'package'])->latest()->get();

        return view('superadmin.payments', compact('payments'));
    }

    public function packages() {
        $packages = Package::all();


        return view('superadmin.packages', compact('packages'));
    }

    public function reportCustomers() {
        $companies = Company::withCount('users')->get();
        return view('superadmin.customer_report', compact('companies'));
    }

    public function reportPayments() {
        $payments = Payment::with('company')->get();
        return view('superadmin.reports_payments', compact('payments'));
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
