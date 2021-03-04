<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('backend.users.index', [
            'users' => $users
        ]);
    }

    public function edit($id)
    {
        $user = User::whereId($id)->firstOrFail();
        $roles = Role::all();
        $selectedRoles = $user->roles()->pluck('name')->toArray();
        return view('backend.users.edit', [
            'user' => $user,
            'roles' => $roles,
            'selectedRoles' => $selectedRoles
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::whereId($id)->firstOrFail();
        $user->syncRoles($request->get('roles'));
        return redirect()->action('admin\UserController@edit', $id)->with('status', 'Successfully Update User');
    }
}
