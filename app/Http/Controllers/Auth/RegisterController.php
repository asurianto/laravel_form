<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;


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
    protected $redirectTo = '/login';

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
            'nip' => 'required|max:20|unique:users',
            'name' => 'required|string|max:255',
            'area' => 'required|max:65',
            'campus' => 'required|max:100',
            'dop' => 'required',
            'dob' => 'required',
            'address' => 'required|max:100',
            'post_code' => 'required',
            'phone_home' => 'required',
            'phone' => 'required',
            'rekening' => 'required',            
            'bank' => 'required|max:65',            
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            
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
        $user = User::create([      
            'nip' => $data['nip'],
            'name' => $data['name'],
            'area' => $data['area'],
            'campus' => $data['campus'],
            'dop' => $data['dop'],
            'dob' => date('Y-m-d',strtotime($data['dob'])),
            'address' => $data['address'],
            'post_code' => $data['post_code'],
            'phone_home' => $data['phone_home'],
            'phone' => $data['phone'],
            'rekening' => $data['rekening'],            
            'bank' => $data['bank'],
            'email' => $data['email'],
            'active' => 0,
            'password' => Hash::make($data['password']),
        ]);
        $user
            ->roles()
            ->attach(Role::where('name', 'user')->first());
            return $user;
    }

    // public function register(Request $request)
    // {
    //     $this->validator($request->all())->validate();

    //     event(new Registered($user = $this->create($request->all())));

    //     return redirect('/');
    // }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        return view('auth.login');
    }
}
