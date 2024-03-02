<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::with('roles')->get();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all(); // Retrieve all roles from the roles table

        return view('users.create', compact('roles'));
    
    }

    public function changePasswordForm()
        {
            return view('auth.change-password');
        }

    public function changePassword(Request $request)
        {
            $user = Auth::user();

            $request->validate([
                'old_password' => 'required',
                'password' => 'required|confirmed|min:6',
            ]);

            if (!Hash::check($request->old_password, $user->password)) {
                return redirect()->back()->withErrors(['old_password' => 'Incorrect old password']);
            }

            $user->update([
                'password' => bcrypt($request->password),
            ]);

            return redirect()->route('home')->with('success', 'Password changed successfully.');
        }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // Validate the form data
        $validatedData = $request->validate([
            'name'           => 'required|string',
            'doctors_id'     => 'nullable|string',
            'username'       => 'required|string|unique:users',
            'password'       => 'required|string|min:6',
            'roles'          => 'required|array',
        ]);
        // Create a new user
        $user = new User;
        $user->name       = $validatedData['name'];
        $user->username   = $validatedData['username'];
        $user->doctors_id = $validatedData['doctors_id'];
        $user->password   = bcrypt($validatedData['password']);
        $user->save();

        // Attach the selected roles to the user
        $user->roles()->sync($validatedData['roles']);

        // Redirect to the user index page or any other desired page
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $roles = Role::all(); // Retrieve all roles from the roles table
        return view('users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name'       => 'required|string',
            'doctors_id' => 'nullable|string',
            'is_active' => 'nullable|string',
            'password'   => 'nullable|string|min:6', // Make password optional
            'roles'      => 'required|array',
        ]);
    
        // Update general user information
        $user->update([
            'name'       => $validatedData['name'],
            'is_active'  => $validatedData['is_active'],
            'doctors_id' => $validatedData['doctors_id'],
        ]);
    
        // Update password if provided
        if (isset($validatedData['password'])) {
            $user->password = bcrypt($validatedData['password']);
            $user->save();
        }
    
        // Sync roles
        $user->roles()->sync($validatedData['roles']);
    
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
