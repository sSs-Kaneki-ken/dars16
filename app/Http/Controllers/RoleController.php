<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('users.index' , compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:roles,email',
            'password' => 'required|min:6',
            'role' => 'required',  // Add this line to validate the role field
        ]);
    
        Role::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,  // Save the role field in the database
        ]);
    
        return redirect('/users')->with('success', 'Role created successfully.');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('users.edit', compact('role'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:roles,email,'.$id,
            'password' => 'nullable|min:6',
            'role' => 'required'
        ]);
    
        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->email = $request->email;
        $role->role = $request->role;
    
        if ($request->password) {
            $role->password = bcrypt($request->password);
        }
    
        $role->save();
    
        return redirect('/')->with('success', 'Role updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Role::findOrFail($id);
        $user->delete();

        return redirect('/users');
    }
}
