<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $data = Role::orderBy('id','DESC')->get();
        return view('admin.role.index', compact('data'));
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles|max:255',
        ]);
        Role::updateOrCreate(
            [
                'id'=>$request->id
            ],[
                'name'=>$request->name,
            ]
        );
        if($request->id){
            $msg = 'Role updated successfully.';
        }else{
            $msg = 'Role created successfully.';
        }
        return redirect()->route('admin.role.index')->with('success',$msg);
    }

    public function edit($id)
    {
        $data = Role::where('id',decrypt($id))->first();
        return view('admin.role.edit',compact('data'));
    }

    public function destroy($id)
    {
        Role::where('id',decrypt($id))->delete();
        return redirect()->route('admin.role.index')->with('error','Role deleted successfully.');
    }


    public function addPermissionToRole($roleId){

        $permission= Permission::get();
        $role=Role::findOrFail($roleId);
        $rolePermission=DB::table('role_has_permissions')
                        ->where('role_has_permissions.role_id',$role->id)
                        ->pluck('role_has_permissions.permissions_id','role_has_permissions.permissions_id')
                        ->all();

        return view('admin.role.add-permission', [
           'role'=>$role,
           'permission'=>$permission,
           'rolePermission'=>$rolePermission

        ]);
       }
       public function givePermissionToRole(Request $request, $roleId){
        $request->validate([
            'permission'=>'required'

        ]);

        $permission= Permission::get();
        $role=Role::findOrFail($roleId);
        $role->syncPermissions($request->$permission);
        return redirect()->back()->with('status', 'Permission added to role');
       }



}
