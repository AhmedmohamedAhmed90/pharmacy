<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class AdminRolePermissionController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        //$permissions = Permission::all();
    
        //return view('admin.roles_permissions.index', compact('roles', 'permissions'));
        return view('admin.roles_permissions.index', compact('roles'));
    }

    public function createRole(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        Role::create(['name' => $request->name]);

        //return redirect()->route('admin.roles_permissions.index')->with('success', 'Role created successfully.');
        return view('home',);
    }


    public function editRoleName(Request $request)
{
    $request->validate([
        'name' => 'required|string|exists:roles,name',
        'new_name' => 'required|string|unique:roles,name',
    ]);

    $role = Role::where('name', $request->name)->firstOrFail();
    $role->update(['name' => $request->new_name]);

   // return redirect()->route('admin.roles_permissions.index')->with('success', 'Role name updated successfully.');
   return view('home',);
}

public function deleteRole(Request $request)
{
    $role = Role::where('name', $request->name)->firstOrFail();
    $role->delete();

    //return redirect()->route('admin.roles_permissions.index')->with('success', 'Role deleted successfully.');
    return view('home',);
}



    public function viewCreateRole()
    {
        $permissions = Permission::all();
        return view('createrole', compact('permissions'));
    }

    public function vieweditrole()
    {
       
        return view('editrole');
    }

    public function viewdeleterole()
    {
       
        return view('deleterole');
    }

    


    public function assignPermissionToRole(Request $request)
{
    $roleName = $request->input('name');
    $permissionNames = $request->input('permissions', []);

    // Find or create the role
   // $role = Role::where('name', $roleName)->first();
   $role = Role::where('name', $roleName)->where('guard_name', 'web')->first();
    if (!$role) {
        $role = Role::create(['name' => $roleName]);
    }

    // Find permissions by name
    $permissions = Permission::whereIn('name', $permissionNames)->get();

    // Sync selected permissions to the role
    $role->syncPermissions($permissions);

    // Redirect or return a view as needed
    return view('home');
}





   
    public function assignRoleToUser(Request $request)
{
    
    $roleName = $request->input('role');
    $useremail = $request->input('email');


    // Find the user by email
    $user = User::where('email', $useremail)->first();

    // Find the role by name
    $role = Role::where('name', $roleName)->where('guard_name', 'web')->first();

    $user->roles()->sync($role);

    // Redirect or return a view as needed
   // return redirect()->route('admin.roles_permissions.index')->with('success', 'Role assigned to user successfully.');
   return view('home');
}


    public function viewAssign_role_to_user()
    {
        return view('assign_role_user');
    }



    function redirectToAdminDashboard($userId)
{
    // Find the user by ID
    $user = User::find($userId);

    if (!$user) {
        // User not found, you can handle this case based on your application's requirements
        return redirect()->route('home'); // Redirect to the home page or another default route
    }

    // Check if the user has the 'admin' role
    if ($user->hasRole('customer')) {
        // User has the 'admin' role, redirect to the admin dashboard
        return view('dd'); // Replace 'admin.dashboard' with the actual route name
    }

    // User does not have the 'admin' role, handle this case based on your application's requirements
    return redirect()->route('home'); // Redirect to the home page or another default route
}


    
}



