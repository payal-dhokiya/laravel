<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function user_list()
    {
        $users = User::with('role')->paginate(10);
        return view('admin.user-list', [
            'users' => $users
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.user-edit', compact('user', 'roles'));

    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.user-list')->with('success', 'User deleted successfully');
    }
}
