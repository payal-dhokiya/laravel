<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    const Fields = ['name', 'email', 'address', 'phone_no', 'country', 'gender', 'hobby'];

    public function edit(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login'); // or handle the error as needed
        }

        $userHobbies = explode(',', $user->hobby ?? '');
        $roles = Role::all(); // Fetch all roles
        return view('profile.edit', compact('user', 'userHobbies', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'phone_no' => 'required|numeric|digits:10',
            'address' => 'required|string',
            'country' => 'required|string',
            'gender' => 'required|string',
//            'profile' => 'string',
            'role_id' => 'required|exists:roles,id'
        ]);

//        if($request->hasfile('image'))
//        {
//            $file = $request->file('image');
//            $extenstion = $file->getClientOriginalExtension();
//            $filename = time().'.'.$extenstion;
//            $file->move('uploads/students/', $filename);
//            $student->image = $filename;
//        }

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_no' => $request->input('phone_no'),
            'address' => $request->input('address'),
            'country' => $request->input('country'),
            'gender' => $request->input('gender'),
            'hobby' => implode(',', $request->input('hobbies')),
//            'profile' => $request->file('profile'),
            'role_id' => $request->input('role_id'),
        ]);

     return redirect()->route('home')->with('success', 'Profile updated successfully!');
    }
}
