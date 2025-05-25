<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

use Illuminate\Support\Facades\DB;
use App\Models\company;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([

            'company_name' => 'required|string|max:255',
            'company_phone' => 'required|string|max:20',
            'brand' => 'required|string|max:100',
            'company_email' => 'required|email|max:255|unique:companies,email',
            'company_address' => 'required|string|max:255',

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        DB::beginTransaction();


        try {
            $baseSlug = Str::slug($request->name);
            $uniqueSlug = $baseSlug;
            $counter = 1;
            while (company::where('slug', $uniqueSlug)->exists()) {
                $uniqueSlug = $baseSlug . '-' . $counter;
                $counter++;
            }
        // Step 1: Create Company
        $company = company::create([
            'name' => $request->company_name,
            'phone' => $request->company_phone,
            'brand' => $request->brand,
            'email' => $request->company_email,
            'slug'=>$uniqueSlug,
            'address' => $request->company_address,
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'company_id' => $company->id,
            'branch_id' => $branch->id,
          
            'created_by' => Auth::id(), // 👈 hapa// Foreign ke// Foreign ke
            'password' => Hash::make($request->password),
        ])->assignRole('admin');

        event(new Registered($user));

        Auth::login($user);
        DB::commit();
        return redirect(RouteServiceProvider::HOME);
    }   catch (\Exception $e) {
        DB::rollback();

        return back()->with('error', 'Registration failed. Error: ' . $e->getMessage());
    }
}
}
