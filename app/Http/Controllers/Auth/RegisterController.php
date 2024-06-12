<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone_no' => 'required|numeric|digits:10',
            'address' => 'required|string',
            'country' => 'required|string',
            'gender' => 'required|string',
            'hobbies' =>  'required',
            'role_id' => 'required|exists:roles,id',
//            'profile' => 'required|image|max:1024|mimes:jpg,jpeg',
        ]);
    }

    /**
     * Create a new profile instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        dd($data['profile']);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone_no' => $data['phone_no'],
            'address' => $data['address'],
            'country' => $data['country'],
            'gender' => $data['gender'],
            'hobby' => implode(',', $data['hobbies']),
            'role_id' => $data['role_id'],
//            'profile' => $data['profile']
        ]);
    }


    // Show the application registration form.
    public function showRegistrationForm()
    {
        $roles = Role::all(); // Fetch all roles
        return view('auth.register', compact('roles'));
    }

}
