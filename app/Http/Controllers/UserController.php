<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\company;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\company_branches;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        view()->share('permissions',$permissions);
        view()->share('roles',$roles);
    }

    public function index()
    {
        
        $data  = Auth::user();
            $data = User::where('company_id', $data->company_id)
                ->where('created_by', $data->id)
                ->get();

        return view('admin.user.index', compact('data'));
    }
    public function create()
    {
        $company_id = auth()->user()->company_id;

    // Fetch branches za kampuni hii pekee
    $branches = company_branches::where('company_id', $company_id)->get();

    return view('admin.user.create', compact('branches'));

    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:'.User::class,
            'password' => 'required|max:255|min:6',
            'role' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'company_id' => Auth::user()->company_id,
            'branch_id' => $request->branch_id, // 👈 chukua kampuni ya aliyelogin
                'created_by' => Auth::id(), // 👈
        ]);
        $user->assignRole($request->role);
        return redirect()->route('admin.user.index')->with('success','User created successfully.');
    }
            // Step 2: Create Admin User




    public function edit($id)
    {
        $user = User::where('id',decrypt($id))->first();
        return view('admin.user.edit',compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'role' => ['required', 'string']
        ]);
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        $user->assignRole($request->role);

        $user->syncRoles([$request->role]);
        return redirect()->route('admin.user.index')->with('success','User updated successfully.');
    }
    public function destroy($id)
    {
        User::where('id',decrypt($id))->delete();
        return redirect()->back()->with('success','User deleted successfully.');
    }
}
