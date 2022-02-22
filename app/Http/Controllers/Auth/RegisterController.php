<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/thankyou';

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
        // dd($data);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if (isset($data['address'], $data['companyname'], $data['innbin']))
        {
            // return User::create([
            //     'name' => $data['name'],
            //     'email' => $data['email'],
            //     'phone' => $data['phone'],
            //     'address' => $data['address'],
            //     'companyname' => $data['companyname'],
            //     'innbin' => $data['innbin'],
            //     'password' => Hash::make($data['password']),
            // ]);

            $role_individual  = Role::where('name', 'individual')->first();

            $data = [
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'companyname' => $data['companyname'],
                'innbin' => $data['innbin'],
                'password' => Hash::make($data['password']),
            ];

            $person = User::create($data);
            $person->roles()->attach($role_individual);

            return $person;
        }
        else
        {
            // return User::create([
            //     'name' => $data['name'],
            //     'email' => $data['email'],
            //     'phone' => $data['phone'],
            //     'password' => Hash::make($data['password']),
            // ]);

            $role_individual  = Role::where('name', 'individual')->first();

            $data = [
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'password' => Hash::make($data['password']),
            ];

            $person = User::create($data);
            $person->roles()->attach($role_individual);

            return $person;
        }
    }
}
