<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
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
        $message = array(
            'name.required' => 'Please enter your name.',
            'name.min' => 'Name minimum 3 characters.',
            'name.max' => 'Name maximum 40 characters.',
            'email.required' => 'Please enter email.',
            'email.unique' => 'This email is already registered.',
            'phone.required' => 'Please enter your phone number.',
            'password.required' => 'Harap masukkan password Anda.',
            'password.min' => 'Password minimum 6 characters.',
            'password.max' => 'Password maximum 12 characters.',
            'password.confirmed' => 'Password does not match.',
            'email.regex' => 'Please enter email with format "sample@gmail.com"',
            'phone.regex' => 'Please enter phone number beginning with"08"',
        );
        return Validator::make($data, [
            'name' => ['required', 'string', 'min:3', 'max:40'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users','regex:/[a-zA-Z0-9]+\@gmail.com/'],
            'phone' => ['required', 'regex:/08[0-9]+/'],
            'password' => ['required', 'string', 'min:6', 'max:12', 'confirmed'],
        ],$message);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'id_admin' => 0,
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
