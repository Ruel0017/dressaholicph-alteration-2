<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'fname' => ['required', 'string', 'max:255', 'unique:users'],
            'mname' => ['max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'sex' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'mobilenumber' => ['required', 'string', 'min:11', 'max:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'role' => 2,
    //         'fname' => $data['fname'],
    //         'mname' => $data['mname'],
    //         'lname' => $data['lname'],
    //         'sex' => $data['sex'],
    //         'dob' => $data['dob'],
    //         'address' => $data['address'],
    //         'mobilenumber' => $data['mobilenumber'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

    function register(Request $request)
    {
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'mname' => ['max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'sex' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'mobilenumber' => ['required', 'string', 'min:11', 'max:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User();
        $user->role = 2;
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->lname = $request->lname;
        $user->sex = $request->sex;
        $user->address = $request->address;
        $user->mobilenumber = $request->mobilenumber;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if ($user->save()) {
            return redirect()->back()->with('success', 'You are now successfully registered');
        } else {
            return redirect()->back()->with('error', 'Failed to register');
        }
    }
}
