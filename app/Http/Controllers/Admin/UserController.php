<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{

    public function index()
    {
        // Display all users 
        $users = User::withTrashed()->get();
        return view('admin.users.index' , compact('users'));
    }

    public function edit(User $user)
    { 
        return view('admin.users.edit' , compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validate incoming request
        $request->validate([
            'is_admin'=> 'required',
        ]);
        // Update is_admin to value of the request 
        $user->update([
            'is_admin' => $request->is_admin,
        ]);
        return to_route('admin.users.index')->with('message' , 'Role Updated Successfully');
    }

    public function destroy(User $user)
    {
        // Soft delete a user - (not entirely removed from database)
        $user->delete();
        return to_route('admin.users.index')->with('message', 'User deactivated successfully');
    }

    public function restore($id)
    {
        // Fetch all users ,find the user with id, then restore
        User::withTrashed()->find($id)->restore();
        return to_route('admin.users.index')->with('message', 'User restored');
    }
}
